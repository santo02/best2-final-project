<section class="py-5 mt-5">
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto" style="width: 1001px;">
                <h4 class="fw-bold" style="margin-bottom: 20px;">Pelajari dan danai berbagai pinjaman sesuai preferensi Anda</h4>
                <button class="btn btn-primary text-capitalize border rounded" type="button" data-bs-toggle="modal" data-bs-target="#modal-1" style="background: #7ed321;">tambah data</button>
            </div>
        </div>
    </div>

    <div class="modal fade" role="dialog" id="modal-1" tabindex="-1" aria-labelledby="ModalUtama" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #7ed321;">
                <h4 class="modal-title text-light">Tambah Data</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ url('/marketplace/create') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Tingkat Keberhasilan</label>
                        <select class="form-select" name="keberhasilan" id="keberhasilan" style="margin-bottom: 10px;" required>
                        @foreach($risk as $risks)
                            <option value="{{$risks->risk_id}}" selected="">{{$risks->value}}%</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nama Perusahaan</label>
                        <input class="form-control" type="text" name="perusahaan" id="perusahaan" style="margin-top: 0px;margin-bottom: 10px;" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jenis Industri</label>
                        <input class="form-control" type="text" name="industri" id="industri" style="margin-top: 0px;margin-bottom: 10px;" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jumlah Pinjaman</label>
                        <input class="form-control" type="number" placeholder="Nominal minjam" name="pinjaman" id="pinjaman" style="margin-top: 0px;margin-bottom: 10px;" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Metode Pengembalian</label>
                        <select class="form-select" name="mtd_pengembalian" id="mtd_pengembalian" style="margin-bottom: 10px;" required>
                            <option value="Cicilan perbulan" selected="">Cicilan perbulan</option>
                            <option value="Cicilan pertahun">Cicilan pertahun</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jangka Waktu</label>
                        <input class="form-control" type="number" placeholder="Jumlah hari" name="waktu" id="waktu" style="margin-top: 0px;margin-bottom: 10px;" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jatuh Tempo</label>
                        <input class="form-control" type="date" name="jatuh_tempo" id="jatuh_tempo" style="margin-top: 0px;margin-bottom: 10px;" required>
                    </div>
                </div>
                <div class="modal-footer" style="background: #7ed321;">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary link-light" name="submit_modal" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</section>