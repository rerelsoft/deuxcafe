  <!-- Modal -->
  <div class="modal fade" id="modalFormKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                  <form method="post" action="kategori">
                      @csrf
                      <div id="method">

                      </div>
                      {{-- Kategori --}}
                      <div class="form-group row">
                          <label for="staticEmail" class="col-sm-4 col-form-label">Nama Kategori</label>
                          <div class="col-sm-12">
                              <input type="text" class="form-control" id="nama" name="nama"
                                  placeholder="Nama Kategori">
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
