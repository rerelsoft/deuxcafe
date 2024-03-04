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
  
  <!-- Modal Import -->
  <div class="modal fade" id="formImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ url('uploadpelanggan') }}" enctype="multipart/form-data">
                    @csrf
                    <div id="method"></div>
                    <div class="card-body">
                        <div class="form-group col-sm-12">
                            <label for="nama">File Excel</label>
                            <input type="file" name="data_pelanggan" class="form-control">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-info" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-warning">Upload</button>
                </form>

            </div>
        </div>
    </div>
</div>