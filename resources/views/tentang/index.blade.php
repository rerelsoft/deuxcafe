@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'tentang'])
    <div class="container-fluid py-4">

        <div class="row mt-4">
            <div class="container">
                <div class="card">
                    <h5 class="card-header">Tentang Aplikasi</h5>
                    <div class="p-3 py-2">

                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis fugiat aut perferendis delectus aliquam laborum quas eligendi ducimus molestiae, consequuntur dolor error animi enim expedita, ad velit soluta temporibus quisquam, assumenda voluptates accusantium quibusdam sit? Possimus nesciunt facere amet soluta minus, itaque assumenda! Unde doloribus eos exercitationem in dolores est voluptatibus cumque tempora doloremque voluptates ratione adipisci, amet sint. Molestias error corrupti labore maxime reiciendis accusantium, sequi laboriosam aperiam? Officia deserunt itaque unde voluptatibus sequi! Dolores officiis quam aspernatur ullam atque quidem id eaque dicta incidunt commodi ducimus accusantium officia totam in fuga at, nisi quasi placeat eum quos voluptas sed repudiandae recusandae! Odio animi quis voluptates beatae minus nesciunt rerum cumque quasi accusantium, aspernatur iusto voluptatem eaque? Quibusdam pariatur, at nulla debitis eveniet accusantium, doloribus hic repellat distinctio quasi laboriosam qui nihil optio tempora, fugit voluptas soluta quo nisi? Excepturi, atque repellat quod consequatur suscipit iste voluptate qui eius, alias illo perferendis deserunt doloremque. Porro repudiandae sint incidunt vel beatae nam a, debitis reiciendis fuga perspiciatis exercitationem vero laborum necessitatibus, ratione maiores enim id excepturi. Minima illum nulla placeat iure similique blanditiis recusandae accusamus non incidunt quaerat ad impedit quia tempora quos, eveniet sapiente fuga facere fugiat magni voluptate, nostrum natus maiores necessitatibus aliquid. Atque mollitia alias amet iure praesentium? Error dicta amet repellat eum atque ratione consectetur provident reiciendis molestias, tempora hic necessitatibus vel, eveniet distinctio temporibus. Dignissimos nam animi esse fuga consectetur rem voluptate fugit, itaque inventore eligendi dolor sit nostrum, facilis, incidunt nemo soluta ipsa doloremque excepturi ut natus. Doloribus accusantium, repellat eaque laborum expedita temporibus ex itaque ab ipsa, cum voluptate odit sunt assumenda adipisci explicabo rerum molestiae vero. Voluptatibus, perferendis unde possimus fugiat nesciunt recusandae nisi in reiciendis aperiam aliquid maiores ad doloribus porro. Commodi voluptatum, optio repudiandae omnis amet delectus, numquam expedita quasi sunt voluptate eum ex officiis consequuntur porro laudantium accusantium quo repellendus! Tenetur tempora, necessitatibus, veniam placeat cupiditate qui cum illo sequi aliquid voluptates nam dolorum autem dolor, praesentium distinctio provident est eligendi error numquam officia! Ea eveniet eligendi fuga officiis harum, corrupti hic quaerat provident eos impedit nisi, esse aut unde at suscipit atque dolores qui. Quod, id eaque nisi placeat amet blanditiis! Eveniet asperiores ratione voluptatum. Nihil ratione sed dolorem eaque repellendus molestiae culpa perferendis dolor vitae consectetur commodi explicabo nobis, ipsa laudantium aperiam autem minima iusto, facere sapiente harum ab corporis eos debitis? Provident eligendi eaque facilis tenetur rem dolorum cupiditate sapiente. Dolor tempore quasi porro dolorem. Sunt quos qui optio et ducimus facere, reprehenderit temporibus debitis, praesentium beatae repudiandae dolorum cumque obcaecati labore incidunt, eaque quas sapiente. Nostrum mollitia doloremque, omnis asperiores nulla ratione. Mollitia qui a deserunt delectus rem saepe nam sed animi perferendis, repellat libero sint reiciendis iure magnam voluptatem eligendi! Obcaecati, magnam qui architecto atque ea totam repudiandae nisi nihil non ducimus quidem optio esse ipsa excepturi. Quasi non voluptatibus, voluptatem quos veniam at excepturi officiis esse quidem. Praesentium aperiam officiis et tempore, soluta vero suscipit. Vel, et deleniti facere qui necessitatibus beatae provident?    


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
