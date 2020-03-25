@extends('layouts.index')

@section('content')
<div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="{{asset('admin/assets/img/stisla-fill.svg')}}" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Selamat datang di <span class="font-weight-bold">Pembayaran SPP</span></h4>
            <p class="text-muted">Sebelum memulai, Anda harus masuk atau mendaftar jika belum. Sebelum memulai, Anda harus masuk atau mendaftar jika belum memiliki akun..</p>
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
            @csrf
              <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus autocomplete="off">
                <div class="invalid-feedback">
                  Username
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required autocomplete="off">
                <div class="invalid-feedback">
                  Password
                </div>
              </div>

              <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>

              <div class="mt-5 text-center">
                Belum punya akun? <a href="{{route('register')}}">Daftar</a>
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy; SMK DARUSSALAM. XII RPL 💙 by Stisla
              <div class="mt-2">
                <a href="#">Privacy Policy</a>
                <div class="bullet"></div>
                <a href="#">Terms of Service</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="{{asset('admin/assets/img/unsplash/login-bg.jpg')}}">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Good Morning</h1>
                <h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
