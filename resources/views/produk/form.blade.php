  <!-- Modal -->
  <div class="modal fade" id="modalFormProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Produk Titipan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                  <form method="post" action="produkTitipan">
                      @csrf
                      <div id="method">

                      </div>
                      {{-- Nama --}}
                      <div class="form-group row">
                          <label for="staticEmail" class="col-sm-4 col-form-label">Nama Produk</label>
                          <div class="col-sm-12">
                              <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                  placeholder="Nama Produk">
                          </div>
                      </div>
                      {{-- Nama Supplier --}}
                      <div class="form-group row">
                          <label for="staticEmail" class="col-sm-4 col-form-label">Nama Supplier</label>
                          <div class="col-sm-12">
                              <input type="text" class="form-control" id="nama_supplier" name="nama_supplier"
                                  placeholder="Nama Supplier">
                          </div>
                      </div>
                      {{-- Harga Beli --}}
                      <div class="form-group row">
                          <label for="staticEmail" class="col-sm-4 col-form-label">Harga Beli</label>
                          <div class="col-sm-12">
                              <input type="number" class="form-control" id="harga_beli" name="harga_beli"
                                  placeholder="Harga Beli">
                          </div>
                      </div>
                      {{-- Harga Jual --}}
                      <div class="form-group row">
                          <label for="staticEmail" class="col-sm-4 col-form-label">Harga Jual</label>
                          <div class="col-sm-12">
                              <input type="number" class="form-control" id="harga_jual" name="harga_jual"
                                  placeholder="Harga Jual">
                          </div>
                      </div>
                      {{-- Stok --}}
                      <div class="form-group row">
                          <label for="staticEmail" class="col-sm-4 col-form-label">Stok</label>
                          <div class="col-sm-12">
                              <input type="number" class="form-control" id="stok" name="stok"
                                  placeholder="Stok">
                          </div>
                      </div>
                      {{-- Keterangan --}}
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
