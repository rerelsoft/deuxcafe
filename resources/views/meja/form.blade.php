  <!-- Modal -->
  <div class="modal fade" id="modalFormMeja" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Meja</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                  <form method="post" action="meja">
                      @csrf
                      <div id="method">

                      </div>
                      {{-- Nomor Meja --}}
                      <div class="form-group row">
                          <label for="staticEmail" class="col-sm-4 col-form-label">Nomor Meja</label>
                          <div class="col-sm-12">
                              <input type="number" class="form-control" id="nomor_meja" name="nomor_meja"
                                  placeholder="Nomor Meja">
                          </div>
                      </div>
                      {{-- Kapasitas --}}
                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Kapasitas</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="kapasitas" name="kapasitas"
                                placeholder="Kapasitas">
                        </div>
                    </div>
                     {{-- Status --}}
                     <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="status" name="status"
                                placeholder="Status">
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
