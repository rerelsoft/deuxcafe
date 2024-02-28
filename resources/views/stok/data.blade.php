<div class="container">

<table class="table" id="data-stok">
    <thead class="thead-dark">
      <tr>
        <th scope="col" class="p-2">No</th>
        <th scope="col" class="p-2">Menu Id</th>
        <th scope="col" class="p-2">Jumlah</th>
        <th scope="col" class="p-2">Tools</th>
      </tr>
    </thead>
    <tbody>
      

      @foreach ($stok as $s)
      <tr>
        <td>{{$i = !isset($i)?$i=1:++$i}}</td>
        <td>{{$s->menu_id}}</td>
        <td>{{$s->jumlah}}</td>
      
        <td>
        {{-- ########### edit ########## --}}
          <button class="btn bg-gradient-success"data-bs-toggle="modal" data-bs-target="#modalFormStok" data-mode="edit" 
          data-id="{{ $s -> id }}"
          data-menu_id="{{ $s->menu_id }}"
          data-jumlah="{{ $s->jumlah }}"
         
          >
        <i class="fas fa-edit"></i>
        </button>
        {{-- ########### delete ########## --}}
          <form method="post"
          action="{{ route('stok.destroy', $s->id) }}" style="display: inline">
        @csrf
        @method('DELETE')
        <button type="button" class="btn bg-gradient-danger delete-data"
        data-menu_id="{{ $s->menu_id }}">
        <i class="fas fa-trash"></i>
        </button>
        </form>

        </td>
      </tr>
      @endforeach 
    </tbody>
  </table>
</div>
  