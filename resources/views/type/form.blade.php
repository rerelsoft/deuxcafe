  <!-- Modal -->
  <div class="modal fade" id="modalFormType" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Type</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                  <form method="post" action="type">
                      @csrf
                      <div id="method">

                      </div>
                      {{-- Nama Type --}}
                      <div class="form-group row">
                          <label for="staticEmail" class="col-sm-4 col-form-label">Nama Type</label>
                          <div class="col-sm-12">
                              <input type="text" class="form-control" id="nama_type" name="nama_type"
                                  placeholder="Nama Type">
                          </div>
                      </div>
                      {{-- Kategori Id --}}
                      {{-- <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Kategori Id</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="kategori_id" name="kategori_id"
                                placeholder="Kategori Id">
                        </div>
                    </div> --}}

                     {{-- Kategori Id --}}
                     <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Kategori Id</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="kategori_id" id="kategori_id"
                                placeholder="Kategori Id">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $k)
                                <option value="{{$k->id}}">{{$k->nama}}</option>
                                    
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
