@extends('layouts.index')

@section('content')
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="{{asset('admin/assets/img/stisla-fill.svg')}}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Daftar Akun</h4></div>

              <div class="card-body">
                <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
                @csrf
                      <label hidden for="id">ID Petugas</label>
                      <input hidden id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="<?php 
                        $idp=DB::table("users")->select(DB::raw("MAX(RIGHT(id,3)) as kd_max"));
                        if($idp->count()>0){
                            foreach($idp->get() as $kode){
                                $tmp=((int)$kode->kd_max)+1;
                                $finalkode=sprintf('%1s',$tmp);
                            }
                        }else{
                            $finalkode="1";
                        }
                        echo $finalkode;
                    ?>" required="" oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="off">
                    <div class="form-group">
                      <label for="nama_petugas">Nama Petugas</label>
                      <input id="nama_petugas" type="text" class="form-control @error('nama_petugas') is-invalid @enderror" name="nama_petugas" required="" oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="off">
                    </div>

                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" required="" oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="off">
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" data-indicator="pwindicator" name="password" required="" oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="off">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password_confirmation" class="d-block">Konfirmasi Password</label>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="" oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                      <label>Level Akun</label>
                      <select name="level" class="form-control" required="" oninvalid="this.setCustomValidity('Pilih Level Akun')" oninput="setCustomValidity('')">
                        <option value="">-- Level Akun --</option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                      </select>
                    </div>
                  <br>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Daftar
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
