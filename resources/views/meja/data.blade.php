<div class="container">

    <table class="table" id="data-menu">
        <thead class="thead-dark">
          <tr>
            <th scope="col" class="p-2">No</th>
            <th scope="col" class="p-2">Nomor Meja</th>
            <th scope="col" class="p-2">Kapasitas</th>
            <th scope="col" class="p-2">Status</th>
            <th scope="col" class="p-2">Tools</th>
          </tr>
        </thead>
        <tbody>
          
    
          @foreach ($meja as $m)
          <tr>
            <td>{{$i = !isset($i)?$i=1:++$i}}</td>
            <td>{{$m->nomor_meja}}</td>
            <td>{{$m->kapasitas}}</td>
            <td>{{$m->status}}</td>
            <td>
            {{-- ########### edit ########## --}}
              <button class="btn bg-gradient-success"data-bs-toggle="modal" data-bs-target="#modalFormMeja" data-mode="edit" 
              data-id="{{ $m -> id }}"
              data-nomor_meja="{{ $m->nomor_meja }}"
              data-kapasitas="{{ $m->kapasitas }}"
              data-status="{{ $m->status }}"
              >
            <i class="fas fa-edit"></i>
            </button>
            {{-- ########### delete ########## --}}
              <form method="post"
              action="{{ route('meja.destroy', $m->id) }}" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="button" class="btn bg-gradient-danger delete-data"
            data-nomor_meja="{{ $m->nomor_meja }}">
            <i class="fas fa-trash"></i>
            </button>
            </form>
    
            </td>
          </tr>
          @endforeach 
        </tbody>
      </table>
    </div>
      