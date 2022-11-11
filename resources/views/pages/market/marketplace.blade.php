@extends('layouts.marketplace')
@section('title')
    Marketpage - Investree
@endsection  
@section('market-content')  
<section class="py-5">
        <div class="container">
            <div class="row" style="--bs-success: #7ed321;--bs-success-rgb: 126,211,33;">
            @foreach($posts as $post)
                <div class="col-md-4" style="margin-bottom: 27px;">
                    <div class="card">
                        <div class="card-body border rounded">
                            <div class="row">
                                <div class="col-md-12 d-block"><img class="img-fluid" src="assets/img/loan_card_background%20(1).webp" width="100%" height="auto"></div>
                            </div>
                            @if($post->score == 'A' || $post->score == 'A+')
                                <div class="card bg-success" style="position: absolute;margin-top: -145px;width: 254px;height: 60.6px;margin-left: 64px;">
                                    <div class="card-body">
                                        <h4 class="fw-bold text-center text-light card-title text-uppercase">{{$post->score}} | {{$post->value}}% p.a</h4>
                                    </div>
                                </div>
                            @elseif($post->score == 'B')
                                <div class="card bg-warning" style="position: absolute;margin-top: -145px;width: 254px;height: 60.6px;margin-left: 64px;">
                                    <div class="card-body">
                                        <h4 class="fw-bold text-center text-light card-title text-uppercase">{{$post->score}} | {{$post->value}}% p.a</h4>
                                    </div>
                                </div>
                            @else
                                <div class="card bg-danger" style="position: absolute;margin-top: -145px;width: 254px;height: 60.6px;margin-left: 64px;">
                                    <div class="card-body">
                                        <h4 class="fw-bold text-center text-light card-title text-uppercase">{{$post->score}} | {{$post->value}}% p.a</h4>
                                    </div>
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="fw-semibold card-title">Sisa pendanaan</h6>
                                    <div class="progress" style="margin-bottom: 10px;">
                                        <div class="progress-bar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="fw-semibold text-muted mb-2" style="font-size: 14px;">Terkumpul Rp. {{$post->pinjaman_terkumpul}} jt</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="text-end text-muted mb-2" style="font-size: 14px;">{{$post->jangka_waktu}} hari lagi</h6>
                                        </div>
                                    </div>
                                    <hr style="width: 350px;">
                                    <div class="row" style="margin-bottom: 10px;width: 377.987px;">
                                        <div class="col-md-6">
                                            <h6 class="fw-bolder text-muted mb-2" style="font-size: 14px;">Nama Perusahaan</h6>
                                            <h6 class="fw-semibold text-muted mb-2 text-uppercase" style="font-size: 16px;">{{ $post->nama_perusahaan }}</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-bolder text-muted mb-2" style="font-size: 14px;">Industri</h6>
                                            <h6 class="fw-semibold text-muted mb-2 text-capitalize" style="font-size: 16px;">{{ $post->industri }}</h6>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 10px;width: 377.987px;">
                                        <div class="col-md-6">
                                            <h6 class="fw-bolder text-muted mb-2" style="font-size: 14px;">Jumlah Pinjaman</h6>
                                            <h6 class="fw-semibold text-muted mb-2" style="font-size: 16px;">Rp. {{number_format($post->jumlah_pinjaman, 0, ',', '.')}}</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-bolder text-muted mb-2" style="font-size: 14px;">Metode Pengembalian</h6>
                                            <h6 class="fw-semibold text-muted mb-2 text-capitalize" style="font-size: 16px;">{{$post->metode_pengembalian}}</h6>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 10px;width: 377.987px;">
                                        <div class="col-md-6">
                                            <h6 class="fw-bolder text-muted mb-2" style="font-size: 14px;">Jatuh Tempo</h6>
                                            <h6 class="fw-semibold text-muted mb-2" style="font-size: 16px;">{{$post->jatuh_tempo}}</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-bolder text-muted mb-2" style="font-size: 14px;">Jangka Waktu</h6>
                                            <h6 class="fw-semibold text-muted mb-2" style="font-size: 16px;">{{$post->jangka_waktu}} hari</h6>
                                        </div>
                                    </div>
                                    <hr style="width: 350px;">
                                    <div class="text-center" style="--bs-success: #7ed321;--bs-success-rgb: 126,211,33;">
                                        <button class="btn btn-success text-capitalize border rounded" type="button" style="width: 233.387px;--bs-success-rgb: 126,211,33;--bs-secondary-rgb: 126,211,33;background: #7ed321; margin-bottom: 10px;">danai</button>
                                        <button class="btn btn-warning text-capitalize border rounded" id="edit-data" data-id="{{$post->id}}" type="button" style="width: 233.387px; margin-bottom: 10px;">edit</button>
                                        <form method="post" action="{{ route('marketpage.destroy', $post->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger text-capitalize border rounded" type="submit" style="width: 233.387px;" >delete</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>

        <div class="modal fade" role="dialog" id="modal-2" tabindex="-1" aria-labelledby="ModalUtama" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background: #7ed321;">
                        <h4 class="modal-title text-light">Edit Data</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ url('/marketplace/update') }}">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control" type="text" name="post_id" id="post_id" style="margin-top: 0px;margin-bottom: 10px;" hidden>
                            </div>
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
                            <button class="btn btn-primary link-light" name="submit_modal" type="submit">Edit Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection