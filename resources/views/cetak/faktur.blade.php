<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body mx-4">
                <div class="container">
                    <h2 class="text-center">DeuxCafe</h2>
                    <p class="text-center" style="font-size: 15px;">Jl. Diponegoro No. 32, Cilegon, KR 95129</p>
                    <p class="text-center mb-5" style="font-size: 12px;">rerel</p>
                    <div class="row">
                        <ul class="list-unstyled">
                            <li class="text-muted mt-1"><span class="text-black">Invoice</span> #{{ $transaksi->id }}
                            </li>

                            <li class="text-black">Kakang</li>
                            <li class="text-black mt-1">Tanggal : {{ $transaksi->tanggal }}</li>

                            <hr class="border border-success">
                            @foreach ($transaksi->detailTransaksi as $item)
                        </ul>
                        <hr>
                    </div>

                    <div class="row">
                        <div class="col-xl-10">
                            <div class="">
                                <p>{{ $item->menu->nama_menu }}
                                    <hr>
                                    <li class="text-black">Qty :{{ $item->jumlah }} </li>
                                    <li class="text-black">Sub Total :{{ number_format($item->subtotal, 0, ',', '.') }}
                                    </li>
                                </p>

                            </div>
                        </div>
                        <div class="col-xl-2">
                            <p class="float-end">Rp. {{ number_format($item->menu->harga, 0, ',', '.') }}
                            </p>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                
                    <hr class="border border-dark">

                    <div class="row">
                        <div class="col-xl-10">
                        </div>
                        <div class="col-xl-2">
                            <p class="float-end">Total: Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                            </p>
                        </div>
                        <hr class="border">
                    </div>

                    <div class="text-center" style="margin-top: 90px;">
                        {{-- <a><u class="text-info">View in browser</u></a> --}}
                        <p>We appreciate your business and hope you're delighted with your purchase.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>





</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

</html>
