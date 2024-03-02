<div class="container">

    <table class="table" id="data-menu">
        <thead class="thead-dark">
          <tr>
            <th scope="col" class="p-2">No</th>
            <th scope="col" class="p-2">Nama Menu</th>
            <th scope="col" class="p-2">Harga</th>
            <th scope="col" class="p-2">Deskripsi</th>
            <th scope="col" class="p-2">Type Id</th>
            <th scope="col" class="p-2">Tools</th>
          </tr>
        </thead>
        <tbody>
          
    
          @foreach ($menu as $m)
          <tr>
            <td>{{$i = !isset($i)?$i=1:++$i}}</td>
            <td>{{$m->nama_menu}}</td>
            <td>{{$m->harga}}</td>
            <td>{{$m->deskripsi}}</td>
            <td>{{$m->type->nama_type}}</td>
            <td>
            {{-- ########### edit ########## --}}
              <button class="btn bg-gradient-success"data-bs-toggle="modal" data-bs-target="#modalFormMenu" data-mode="edit" 
              data-id="{{ $m -> id }}"
              data-nama_menu="{{ $m->nama_menu }}"
              data-harga="{{ $m->harga }}"
              data-deskripsi="{{ $m->deskripsi }}"
              data-type_id="{{ $m->type_id }}"
              >
            <i class="fas fa-edit"></i>
            </button>
            {{-- ########### delete ########## --}}
              <form method="post"
              action="{{ route('menu.destroy', $m->id) }}" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="button" class="btn bg-gradient-danger delete-data"
            data-nama_menu="{{ $m->nama_menu }}">
            <i class="fas fa-trash"></i>
            </button>
            </form>
    
            </td>
          </tr>
          @endforeach 
        </tbody>
      </table>
    </div>
      