<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h2 class="text-center p-3 mb-2 bg-info text-white rounded-lg">Data Titipan</h2>
    <table class="table table-bordered border-info">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="p-2">No</th>
                <th scope="col" class="p-2">Nama Produk</th>
                <th scope="col" class="p-2">Nama Supplier</th>
                <th scope="col" class="p-2">Harga Beli</th>
                <th scope="col" class="p-2">Harga Jual</th>
                <th scope="col" class="p-2">Stok</th>
                <th scope="col" class="p-2">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($titipan as $t)
                <tr>
                    <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                    <td>{{ $t->nama_produk }}</td>
                    <td>{{ $t->nama_supplier }}</td>
                    <td>{{ $t->harga_beli }}</td>
                    <td>{{ $t->harga_jual }}</td>
                    <td>{{ $t->stok }}</td>
                    <td>{{ $t->keterangan }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

</body>

</html>
