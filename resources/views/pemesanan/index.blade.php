@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'type'])
    <div class="row mt-4 p-3">
        <div class="container col-md-8">
            <div class="card item menu">
                <h5 class="card-header">Menu</h5>
                {{-- nama pelanggan --}}
                <div class="p-4 form-group row">
                    <h3 >Nama Pelanggan</h3>
                    <div class="col-sm-5 ">
                        <select class="form-control " name="nama" id="nama"
                            placeholder="Pelanggan">
                            <option value="">Pilih Pelanggan</option>
                            @foreach ($pelanggan as $p)
                            <option value="{{$p->id}}">{{$p->nama}}</option>
                                
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- menu --}}
                <div class="p-4">
                    @foreach ($type as $t)
                        <h3>{{ $t->nama_type }}</h3>
                        <ul class="menu-item">
                            @foreach ($t->menu as $menu)
                                <li class="btn bg-gradient-warning" data-harga="{{ $menu->harga }}"
                                    data-id="{{ $menu->id }}">{{ $menu->nama_menu }}</li>
                            @endforeach
                        </ul>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="container col-md-4">
            <div class="card item content">
                <h5 class="card-header">Order</h5>
                <div class="p-4">
                    <ul class="ordered-list">

                    </ul>
                    <div>
                        Total Bayar : <h2 id="total">0</h2>
                    </div>
                    <div>
                        <button id="btn-bayar" class="btn bg-gradient-info">Bayar</button>
                    </div>
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
        $(function() {
            // Inisialisasi
            const orderedList = []
            let total = 0

            const sum = () => {
                return orderedList.reduce((accumulator, object) => {
                    return accumulator + (object.harga * object.qty);
                }, 0)
            };

            const changeQty = (el, inc) => {
                // Ubah di array
                const id = $(el).closest('li')[0].dataset.id;
                const index = orderedList.findIndex(list => list.id == id)
                orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc

                // Ubah qty dan ubah subtotal
                const txt_subtotal = $(el).closest('li').find('.subtotal')[0];
                const txt_qty = $(el).closest('li').find('.qty-item')[0]
                txt_qty.value = parseInt(txt_qty.value) == 1 && inc == -1 ? 1 : parseInt(txt_qty.value) + inc
                txt_subtotal.innerHTML = orderedList[index].harga * orderedList[index].qty;

                // Ubah jumlah total
                $('#total').html(sum());
            };


            // Events
            $('.ordered-list').on('click', '.btn-dec', function() {
                changeQty(this, -1)
            });

            $('.ordered-list').on('click', '.btn-inc', function() {
                changeQty(this, 1)
            });

            $('.ordered-list').on('click', '.remove-item', function() {
                const item = $(this).closest('li')[0];
                let index = orderedList.findIndex(list => list.id == parseInt(item.dataset.id))
                orderedList.splice(index, 1)
                $(item).remove();
                $('#total').html(sum());
            });

            $('#btn-bayar').on('click', function() {
                $.ajax({
                    url: "{{ route('transaksi.store') }}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        orderedList: orderedList,
                        total: total
                    },
                    success: function(data) {
                        console.log(data);
                    }
                });
            });


            $(".menu-item li").click(function() {
                // mengambil data
                const menu_clicked = $(this).text();
                const data = $(this)[0].dataset;
                const harga = parseFloat(data.harga);
                const id = parseInt(data.id);

                if (orderedList.every(list => list.id !== id)) {
                    let dataN = {
                        'id': id,
                        'menu': menu_clicked,
                        'harga': harga,
                        'qty': 1
                    }
                    orderedList.push(dataN);

                    let listOrder = `<li data-id="${id}"><h3> ${menu_clicked} </h3>`
                    listOrder += `<div>Sub Total : Rp.  ${harga}</div>`
                    listOrder +=
                        `<button class="px-2 py-1 rounded text-white  bg-gradient-danger remove-item" style="font-size: 12px; outline: none; border: none"> Hapus </button>
                                <button class="px-2 py-1 rounded text-white bg-warning btn-dec" style="font-size: 12px; outline: none; border: none"> kurang </button>`
                    listOrder += `<input class="qty-item" 
                                type="number"   
                                value="1"               
                                style="width:30px; font-size: 14px; outline: none; border: none;" 
                                readonly>
                               
                        <button class="px-2 py-1 rounded text-white bg-default btn-inc" style="font-size: 12px; outline: none; border: none"> Tambah </button><h2>
                        <span class="subtotal">${harga * 1}</span>
                        </li>`
                    $('.ordered-list').append(listOrder)
                }
                $('total').html(sum())
            })
        });
    </script>

    {{-- <script>
        $('#data-type').DataTable();
    </script> --}}
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
