  <!-- Modal -->
  <div class="modal fade" id="modalFormAbsensi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Absensi</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                  <form method="post" action="absensi">
                      @csrf
                      <div id="method">

                      </div>
                      {{-- Kategori --}}
                      <div class="form-group row">
                          <label for="staticEmail" class="col-sm-4 col-form-label">Nama Karyawan</label>
                          <div class="col-sm-12">
                              <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan"
                                  placeholder="Nama Karyawan">
                          </div>
                      </div>
                      {{-- Tanggal Masuk --}}
                      <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Masuk</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                                placeholder="Tanggal">
                        </div>
                    </div>
                    {{-- Waktu Masuk --}}
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Waktu Masuk</label>
                        <div class="col-sm-12">
                            <input type="time" class="form-control" id="waktu_masuk" name="waktu_masuk"
                                placeholder="">
                        </div>
                    </div>
                    {{-- Status --}}
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="status" id="status"
                                placeholder="Status">
                                <option value="">Pilih Type</option>
                                {{-- @foreach ($type as $t) --}}
                                <option value="hadir">hadir</option>
                                <option value="sakit">sakit</option>
                                <option value="cuti">cuti</option>
                                <option value="izin">izin</option>
                                    
                                {{-- @endforeach --}}
                            </select>
                        </div>
                    </div>
                    {{-- Waktu Keluar --}}
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Waktu Keluar</label>
                        <div class="col-sm-12">
                            <input type="time" class="form-control" id="waktu_keluar" name="waktu_keluar"
                                placeholder="">
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
  <div class="modal fade" id="formImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Import</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                  <form method="post" action="{{ url('uploadkategori') }}" enctype="multipart/form-data">
                      @csrf
                      <div id="method"></div>
                      <div class="card-body">
                          <div class="form-group col-sm-12">
                              <label for="nama">File Excel</label>
                              <input type="file" name="data_kategori" class="form-control">
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
