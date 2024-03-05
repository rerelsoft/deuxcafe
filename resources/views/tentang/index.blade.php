@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'tentang'])
    <div class="container-fluid py-4">

        <div class="row mt-4">
            <div class="container">
                <div class="card">
                    <h5 class="card-header">Tentang Aplikasi</h5>
                    <div class="p-3 py-2">
                        <p>
                        Aplikasi digital marketing telah menjadi alat penting dalam dunia bisnis online, memungkinkan pelaku bisnis untuk menjangkau audiens secara lebih luas dan memperkuat brand equity mereka. Dengan berbagai fitur yang disediakan, seperti pelacakan deal, tiket, dan tugas, serta optimasi fitur WhatsApp Business dan Instagram API, aplikasi ini menawarkan solusi komprehensif untuk meningkatkan efisiensi bisnis. Selain itu, layanan pelanggan dan chatbot AI menyediakan dukungan real-time untuk memenuhi kebutuhan pelanggan, meningkatkan kepuasan dan loyalitas mereka. Aplikasi Omnichannel CRM berbasis cloud, seperti Mekari Qontak, menjadi pilihan utama di Indonesia untuk memacu pertumbuhan bisnis, dengan fitur yang mendukung pengelolaan layanan pesan, sales CRM, dan customer service, serta integrasi dengan berbagai platform seperti WhatsApp Business dan Instagram. Dengan kemampuan untuk otomatisasi penjualan dan layanan pelanggan, aplikasi ini membantu bisnis dalam mencapai tujuan pemasaran mereka dengan lebih efisien dan efektif. Mekari Qontak, sebagai salah satu penyedia aplikasi marketing terbaik di Indonesia, menawarkan solusi yang dipercaya oleh lebih dari 3000+ perusahaan, memastikan keamanan informasi data pelanggan melalui sertifikasi ISO 27001. Dengan fitur canggih dan integrasi yang kuat, aplikasi digital marketing seperti Mekari Qontak menawarkan solusi yang dapat diandalkan untuk meningkatkan pertumbuhan bisnis online

                    </p>
                </div>
            </div>

        </div>

    </div>
  

    @include('layouts.footers.auth.footer')
    </div>

@endsection

{{-- @push('js')
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
@endpush --}}
