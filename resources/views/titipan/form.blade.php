  <!-- Modal -->
  <div class="modal fade" id="modalFormTitipan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Titipan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                  <form method="post" action="titipan">
                      @csrf
                      <div id="method">

                      </div>
                      {{-- Nama --}}
                      <div class="form-group row">
                          <label for="staticEmail" class="col-sm-4 col-form-label">Nama Titipan</label>
                          <div class="col-sm-12">
                              <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                  placeholder="Nama Produk">
                          </div>
                      </div>
                      {{-- Email --}}
                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Nama Supplier</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier"
                                placeholder="Nama Supplier">
                        </div>
                    </div>
                     {{-- Nomor telepon --}}
                     <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Harga Beli</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="harga_beli" name="harga_beli"
                                placeholder="Harga Beli">
                        </div>
                    </div>
                     {{-- Alamat --}}
                     <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Harga Jual</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="harga_jual" name="harga_jual"
                                placeholder="Harga Jual">
                        </div>
                    </div>
                     {{-- Alamat --}}
                     <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Stok</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="stok" name="stok"
                                placeholder="Stok">
                        </div>
                    </div>
                    {{-- Alamat --}}
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                placeholder="Keterangan">
                        </div>
                    </div>



              </div>
              <div class="modal-footer">
                  <button type="button" class="btn bg-gradient-info" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn bg-gradient-warning">Save changes</button>
                </form>

              </div>
          </div>
      </div>
  </div>

    <!-- Modal Import -->
    <div class="modal fade" id="formImportTitipan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
  
                    <form method="post" action="{{ url('uploadtitipan') }}" enctype="multipart/form-data">
                        @csrf
                        <div id="method"></div>
                        <div class="card-body">
                            <div class="form-group col-sm-12">
                                <label for="nama">File Excel</label>
                                <input type="file" name="data_titipan" class="form-control">
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