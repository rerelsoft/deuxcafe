@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'titipan'])
    <div class="container-fluid py-4">

        <div class="row mt-4">
            <div class="container">
                <div class="card">
                    <h5 class="card-header">Titipan Crud</h5>
                    <div class="p-3 py-2">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn bg-gradient-warning" data-bs-toggle="modal"
                            data-bs-target="#modalFormTitipan">
                            Tambah Titipan
                        </button>

                        <!-- Button Export -->
                        <a href="{{ route('export-titipan') }}" class="btn bg-success text-white">
                            <i class="fa fa-file-excel"></i> Export
                        </a>

                        {{-- pdf --}}
                        <a href="{{ route('exportPdf_titipan') }}" class="btn btn-danger">
                            <i class="fa fa-file-pdf"></i>
                            Export PDF
                        </a>

                        <!-- Button Import -->
                        <button type="button" class="btn bg-gradient-info" data-bs-toggle="modal"
                            data-bs-target="#formImportTitipan">
                            <i class="fa fa-file-excel"></i> Import
                        </button>

                    </div>

                    @include('titipan.data')


                </div>
            </div>

        </div>

    </div>
    @include('titipan.form')

    @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('js')
    <script>
        $('#modalFormTitipan').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const nama_produk = btn.data('nama_produk')
            const nama_supplier = btn.data('nama_supplier')
            const harga_beli = btn.data('harga_beli')
            const harga_jual = btn.data('harga_jual')
            const stok = btn.data('stok')
            const keterangan = btn.data('keterangan')

            const id = btn.data('id')
            const modal = $(this)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Titipan')
                modal.find('#nama_produk').val(nama_produk)
                modal.find('#nama_supplier').val(nama_supplier)
                modal.find('#harga_beli').val(harga_beli)
                modal.find('#harga_jual').val(harga_jual)
                modal.find('#stok').val(stok)
                modal.find('#keterangan').val(keterangan)

                modal.find('.modal-body form').attr('action', '{{ url('titipan') }}/' + id)
                modal.find('#method').html('@method('PATCH')')
            } else {
                modal.find('.modal-title').text('Input Titipan')
                modal.find('#nama_produk').val('')
                modal.find('#nama_supplier').val('')
                modal.find('#harga_beli').val('')
                modal.find('#harga_jual').val('')
                modal.find('#stok').val('')
                modal.find('#keterangan ').val('')
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url('titipan') }}')
            }
        })

        $('.delete-data').on('click', function(e) {
            e.preventDefault()
            const data = $(this).closest('tr').find('td:eq(1)').text()
            Swal.fire({
                title: `Apakah data <span style="color:#3085d6">${data}</span> akan dihapus?`,
                icon: "question",
                iconHtml: "؟",
                confirmButtonColor: '#3085d6',
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                showCancelButton: true,
                showCloseButton: true
            }).then((result) => {
                if (result.isConfirmed)
                    $(e.target).closest('form').submit()
                else swal.close()
            })
        })



        document.getElementById('harga_beli').addEventListener('input', function() {
            let hargaBeli = parseFloat(this.value);
            let hargaJual = Math.ceil((hargaBeli * 1.7) / 500) * 500;
            document.getElementById('harga_jual').value = hargaJual.toFixed(2);
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Add event listener for double-clicking
            document.querySelectorAll('.stok-input').forEach(function(input) {
                input.addEventListener('dblclick', function() {
                    this.type = 'text'; // Change to text field for editing
                    this.focus(); // Focus on the input for immediate editing
                });
            });

            // Add event listener for pressing Enter
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    let activeElement = document.activeElement;
                    if (activeElement.classList.contains('stok-input')) {
                        event.preventDefault(); // Prevent form submission if inside a form
                        activeElement.blur(); // Remove focus to trigger update
                        // Here you would typically send the updated value to the server
                        console.log('Update stok to:', activeElement.value);
                    }
                }
            });
        });

        // Inside the 'keydown' event listener where you check for Enter
        if (event.key === 'Enter') {
            // Your existing code...
            fetch('/update-stok', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        // Include CSRF token if using Laravel's CSRF protection
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        stok: activeElement.value,
                        id: activeElement.id.split('-')[1]
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Stok updated successfully:', data);
                    // Optionally, update the UI to reflect the change
                })
                .catch(error => {
                    console.error('Error updating stok:', error);
                });
        }
    </script>

    <script>
        $('#data-pelanggan').DataTable();
    </script>
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
