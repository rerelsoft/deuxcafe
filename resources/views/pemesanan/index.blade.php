@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'type'])


        <div class="row mt-4 p-3">
            <div class="container col-md-8">
                <div class="card ">
                    <h5 class="card-header">Type Crud</h5>
                    <div class="p-3 py-2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate sed at esse ut provident deserunt ipsa sunt mollitia unde nemo quidem culpa, tempore nam maxime voluptate repudiandae hic. Asperiores doloremque illo enim unde quae aspernatur praesentium quia dignissimos iste. Est earum, quod itaque odio iste omnis ipsam dolorum. Officiis, sequi illum, sit unde ullam illo quaerat repellat neque, pariatur placeat officia possimus voluptate expedita amet nam! Ea beatae obcaecati placeat quaerat natus necessitatibus ex porro impedit ducimus quae aliquid quia harum facere a architecto ab, non voluptas, explicabo nesciunt iure et, dicta distinctio? Laudantium temporibus, aperiam accusamus debitis excepturi provident.
                    </div>

                    {{-- @include('type.data') --}}

                </div>
            </div>
            <div class="container col-md-4">
                <div class="card ">
                    <h5 class="card-header">Type Crud</h5>
                    <div class="p-3 py-2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate sed at esse ut provident deserunt ipsa sunt mollitia unde nemo quidem culpa, tempore nam maxime voluptate repudiandae hic. Asperiores doloremque illo enim unde quae aspernatur praesentium quia dignissimos iste. Est earum, quod itaque odio iste omnis ipsam dolorum. Officiis, sequi illum, sit unde ullam illo quaerat repellat neque, pariatur placeat officia possimus voluptate expedita amet nam! Ea beatae obcaecati placeat quaerat natus necessitatibus ex porro impedit ducimus quae aliquid quia harum facere a architecto ab, non voluptas, explicabo nesciunt iure et, dicta distinctio? Laudantium temporibus, aperiam accusamus debitis excepturi provident.
                    </div>

                    {{-- @include('type.data') --}}

                </div>
            </div>

        </div>

       
            
        

    </div>

    @include('layouts.footers.auth.footer')
    </div>
@endsection
{{-- @include('type.form') --}}

@push('js')
    <script>
        $('#modalFormType').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const nama_type = btn.data('nama_type')
            const kategori_id = btn.data('kategori_id')

            const id = btn.data('id')
            const modal = $(this)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Type')
                modal.find('#nama_type').val(nama_type)
                modal.find('#kategori_id').val(kategori_id)
                modal.find('.modal-body form').attr('action', '{{ url('type') }}/' + id)
                modal.find('#method').html('@method('PATCH')')
            } else {
                modal.find('.modal-title').text('Input Type')
                modal.find('#nama_type').val('')
                modal.find('#kategori_id').val('')
                modal.find('#method').html('')
                modal.find('.modal-body form').attr('action', '{{ url('type') }}')
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
        $('#data-type').DataTable();
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