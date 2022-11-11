@extends('layouts.loginpage')
@section('title')
    Loginpage - Investree
@endsection  
@section('login-content')   
    <section class="py-5"></section>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h4 class="fw-bold">Masuk</h4>
                    <p>Silakan masuk menggunakan akun Investree Anda</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center" style="margin-top: -49px;">
                <div class="col-md-6 col-xl-6">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="mb-3"><input class="border rounded" type="email" name="email" placeholder="Email" style="width: 350px;padding: 6px 2px;padding-left: 20px;"></div>
                            <div class="mb-3"><input class="border rounded" type="password" name="password" placeholder="Password" style="width: 350px;padding: 6px 2px;padding-left: 20px;"></div><a href="#" style="font-size: 14px;padding-left: 224px;margin: 0px;margin-top: -12px;margin-bottom: 22px;">Lupa Kata Sandi?</a><button class="btn btn-primary disabled border rounded d-block w-100" type="submit" disabled="" style="padding: 8.6px 32px;max-width: 350px;">Masuk</button>
                            <hr style="width: 350px;">
                            <p style="font-size: 14px;margin-bottom: 2px;margin-top: -13px;">Atau</p><button class="btn btn-primary border rounded d-block w-100" type="submit" style="max-width: 350px;">Daftar Sebagai Peminjam</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection