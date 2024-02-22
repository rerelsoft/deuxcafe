<div class="container">

<table class="table" id="data-pelanggan">
    <thead class="thead-dark">
      <tr>
        <th scope="col" class="p-2">No</th>
        <th scope="col" class="p-2">Nama</th>
        <th scope="col" class="p-2">Email</th>
        <th scope="col" class="p-2">Nomor Telepon</th>
        <th scope="col" class="p-2">Alamat</th>
        <th scope="col" class="p-2">Tools</th>
      </tr>
    </thead>
    <tbody>
      

      @foreach ($pelanggan as $p)
      <tr>
        <td>{{$i = !isset($i)?$i=1:++$i}}</td>
        <td>{{$p->nama}}</td>
        <td>{{$p->email}}</td>
        <td>{{$p->nomor_telepon}}</td>
        <td>{{$p->alamat}}</td>
        <td>
        {{-- ########### edit ########## --}}
          <button class="btn bg-gradient-success"data-bs-toggle="modal" data-bs-target="#modalFormPelanggan" data-mode="edit" 
          data-id="{{ $p -> id }}"
          data-nama="{{ $p->nama }}"
          data-email="{{ $p->email }}"
          data-nomor_telepon="{{ $p->nomor_telepon }}"
          data-alamat="{{ $p->alamat }}"
          >
        <i class="fas fa-edit"></i>
        </button>
        {{-- ########### delete ########## --}}
          <form method="post"
          action="{{ route('pelanggan.destroy', $p->id) }}" style="display: inline">
        @csrf
        @method('DELETE')
        <button type="button" class="btn bg-gradient-danger delete-data"
        data-nama="{{ $p->nama }}">
        <i class="fas fa-trash"></i>
        </button>
        </form>

        </td>
      </tr>
      @endforeach 
    </tbody>
  </table>
</div>
  