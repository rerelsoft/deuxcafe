  <!-- Modal -->
  <div class="modal fade" id="modalFormPelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Type</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                  <form method="post" action="pelanggan">
                      @csrf
                      <div id="method">

                      </div>
                      {{-- Nama --}}
                      <div class="form-group row">
                          <label for="staticEmail" class="col-sm-4 col-form-label">Nama</label>
                          <div class="col-sm-12">
                              <input type="text" class="form-control" id="nama" name="nama"
                                  placeholder="Nama">
                          </div>
                      </div>
                      {{-- Email --}}
                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email">
                        </div>
                    </div>
                     {{-- Nomor telepon --}}
                     <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon"
                                placeholder="Nomor telepon">
                        </div>
                    </div>
                     {{-- Alamat --}}
                     <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Alamat">
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
