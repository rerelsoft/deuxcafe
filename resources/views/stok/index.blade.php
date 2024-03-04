@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'stok'])
    <div class="container-fluid py-4">

        <div class="row mt-4">
            <div class="container">
                <div class="card">
                    <h5 class="card-header">Stok Crud</h5>
                    <div class="p-3 py-2">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn bg-gradient-warning" data-bs-toggle="modal" data-bs-target="#modalFormStok">
                            Tambah Stok
                        </button>

                        <!-- Button Export -->
                        <a href="{{ route('export-stok') }}" class="btn bg-success text-white">
                            <i class="fa fa-file-excel"></i>  Export
                        </a>

                         <!-- Button Import -->
                        <button type="button" class="btn bg-gradient-info" data-bs-toggle="modal"
                        data-bs-target="#formImport">
                        <i class="fa fa-file-excel"></i> Import
                        </button>

                    </div>

                    @include('stok.data')


                </div>
            </div>

        </div>

    </div>
    @include('stok.form')

    @include('layouts.footers.auth.footer')
    </div>

@endsection

@push('js')
    <script>
        $('#modalFormStok').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const menu_id = btn.data('menu_id')
            const jumlah = btn.data('jumlah')
           

            const id = btn.data('id')
            const modal = $(this)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Stok')
                modal.find('#menu_id').val(menu_id)
                modal.find('#jumlah').val(jumlah)
               

                modal.find('.modal-body form').attr('action', '{{ url("stok") }}/' + id)
                modal.find('#method').html('@method('PATCH')')
            } else {
                modal.find('.modal-title').text('Input Stok')
                modal.find('#menu_id').val('')
                modal.find('#jumlah').val('')
              
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url("stok") }}')
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
    </script>

    <script>
        $('#data-stok').DataTable();
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
