<div class="container p-3">

<table class="table" id="myTable">
    <thead class="thead-dark">
      <tr>
        <th scope="col" class="p-2">No</th>
        <th scope="col" class="p-2">Nama Karyawan</th>
        <th scope="col" class="p-2">Tanggal Masuk</th>
        <th scope="col" class="p-2">Waktu Masuk</th>
        <th scope="col" class="p-2">Status</th>
        <th scope="col" class="p-2">Waktu Keluar</th>
        <th scope="col" class="p-2">Tools</th>
      </tr>
    </thead>
    <tbody>
      

      @foreach ($absensi as $a)
      <tr>
        <td>{{$i = !isset($i)?$i=1:++$i}}</td>
        <td>{{$a->nama_karyawan}}</td>
        <td>{{$a->tanggal_masuk}}</td>
        <td>{{$a->waktu_masuk}}</td>
        <td>{{$a->status}}</td>
        <td>{{$a->waktu_keluar}}</td>
        <td>
        {{-- ########### edit ########## --}}
          {{-- <button class="btn bg-gradient-success"data-bs-toggle="modal" data-bs-target="#modalFormKategori" data-mode="edit" 
          data-id="{{ $k -> id }}"
          data-nama="{{ $k->nama }}"
          >
        <i class="fas fa-edit"></i>
        </button> --}}
        {{-- ########### delete ########## --}}
          {{-- <form method="post"
          action="{{ route('kategori.destroy', $k->id) }}" style="display: inline">
        @csrf
        @method('DELETE')
        <button type="button" class="btn bg-gradient-danger delete-data"
        data-nama="{{ $k->nama }}">
        <i class="fas fa-trash"></i>
        </button>
        </form> --}}

        </td>
      </tr>
      @endforeach 
    </tbody>
  </table>
</div>
  