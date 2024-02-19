<div class="container">

<table class="table" id="data-type">
    <thead class="thead-dark">
      <tr>
        <th scope="col" class="p-2">No</th>
        <th scope="col" class="p-2">Nama Type</th>
        <th scope="col" class="p-2">Kategori Id</th>
        <th scope="col" class="p-2">Tools</th>
      </tr>
    </thead>
    <tbody>
      

      @foreach ($type as $t)
      <tr>
        <td>{{$i = !isset($i)?$i=1:++$i}}</td>
        <td>{{$t->nama_type}}</td>
        <td>{{$t->kategori_id}}</td>
        <td>
        {{-- ########### edit ########## --}}
          <button class="btn bg-gradient-success"data-bs-toggle="modal" data-bs-target="#modalFormType" data-mode="edit" 
          data-id="{{ $t -> id }}"
          data-nama_type="{{ $t->nama_type }}"
          data-kategori_id="{{ $t->kategori_id }}"
          >
        <i class="fas fa-edit"></i>
        </button>
        {{-- ########### delete ########## --}}
          <form method="post"
          action="{{ route('type.destroy', $t->id) }}" style="display: inline">
        @csrf
        @method('DELETE')
        <button type="button" class="btn bg-gradient-danger delete-data"
        data-nama_type="{{ $t->nama_type }}">
        <i class="fas fa-trash"></i>
        </button>
        </form>

        </td>
      </tr>
      @endforeach 
    </tbody>
  </table>
</div>
  