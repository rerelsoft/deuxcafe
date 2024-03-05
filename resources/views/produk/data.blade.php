<div class="container">

    <table class="table" id="data-produkTitipan">
        <thead class="thead-dark">
          <tr>
            <th scope="col" class="p-2">No</th>
            <th scope="col" class="p-2">Nama Produk</th>
            <th scope="col" class="p-2">Nama Supplier</th>
            <th scope="col" class="p-2">Harga Beli</th>
            <th scope="col" class="p-2">Harga Jual</th>
            <th scope="col" class="p-2">Stok</th>
            <th scope="col" class="p-2">Keterangan</th>
            <th scope="col" class="p-2">Tools</th>
          </tr>
        </thead>
        <tbody>
          
    
          @foreach ($produkTitipan as $p)
          <tr>
            <td>{{$i = !isset($i)?$i=1:++$i}}</td>
            <td>{{$p->nama_produk}}</td>
            <td>{{$p->nama_supplier}}</td>
            <td>{{$p->harga_beli}}</td>
            <td>{{$p->harga_jual}}</td>
            <td>{{$p->stok}}</td>
            <td>{{$p->keterangan}}</td>
            <td>
            {{-- ########### edit ########## --}}
              <button class="btn bg-gradient-success"data-bs-toggle="modal" data-bs-target="#modalFormProduk" data-mode="edit" 
              data-id="{{ $p -> id }}"
              data-nama_produk="{{ $p->nama_produk }}"
              data-nama_supplier="{{ $p->nama_supplier }}"
              data-harga_beli="{{ $p->harga_beli }}"
              data-harga_jual="{{ $p->harga_jual }}"
              data-stok="{{ $p->stok }}"
              data-keterangan="{{ $p->keterangan }}"
              >
            <i class="fas fa-edit"></i>
            </button>   
            {{-- ########### delete ########## --}}
              <form method="post"
              action="{{ route('produk.destroy', $p->id) }}" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="button" class="btn bg-gradient-danger delete-data"
            data-nama_produk="{{ $p->nama_produk }}">
            <i class="fas fa-trash"></i>
            </button>
            </form>
            </td>
          </tr>
          @endforeach 
        </tbody>
      </table>
    </div>
      
      {{-- <!-- Modal Import -->
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
    </div> --}}