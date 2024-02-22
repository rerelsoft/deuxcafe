  <!-- Modal -->
  <div class="modal fade" id="modalFormMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Type</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                  <form method="post" action="menu">
                      @csrf
                      <div id="method">

                      </div>
                      {{-- Nama Menu --}}
                      <div class="form-group row">
                          <label for="staticEmail" class="col-sm-4 col-form-label">Nama Menu</label>
                          <div class="col-sm-12">
                              <input type="text" class="form-control" id="nama_menu" name="nama_menu"
                                  placeholder="Nama Menu">
                          </div>
                      </div>
                      {{-- Harga --}}
                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Harga</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="harga" name="harga"
                                placeholder="Harga">
                        </div>
                    </div>
                     {{-- Deskripsi --}}
                     <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                placeholder="Deskripsi">
                        </div>
                    </div>
                     {{-- Jenis Id --}}
                     {{-- <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Type Id</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="type_id" name="type_id"
                                placeholder="Type Id">
                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Type Id</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="type_id" id="type_id"
                                placeholder="Kategori Id">
                                <option value="">Pilih Type</option>
                                @foreach ($type as $t)
                                <option value="{{$t->id}}">{{$t->nama_type}}</option>
                                    
                                @endforeach
                            </select>
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
