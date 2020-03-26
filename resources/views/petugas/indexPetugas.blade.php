@extends('index')
@section('active2')
    active
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('admin/assets/js/plugins/loading.css')}}">
@endsection
@section('content')
    <div class="main-content">
        <div class="section">
            <div class="card loading-div" id="tabelnya">
                <div class="card-header">
                    <h4>Daftar Petugas</h4>
                </div>
                <div class="card-body">
                    <button class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;" id="tambah"><i class="fa fa-pencil-alt"></i> Tambah Petugas</button>
                    <br><br>
                    <div class="table-responsive" id="listdata">
                        @include('petugas.petugas')
                    </div>
                </div>
            </div>
            <div class="card loading-div" style="display: none;" id="halinput">
               <div class="card-header">
                    <h4>Tambah Petugas</h4>
               </div>
                <div class="card-body">
                    <form method="POST" class="needs-validation" novalidate="" id="forminput">
                        @csrf
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <label hidden for="id">ID Petugas</label>
                                    <input  id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="<?php 
                                        $idp=DB::table("users")->select(DB::raw("MAX(RIGHT(id,1)) as kd_max"));
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
                                        <button type="submit" class="btn btn-primary btn-lg" id="simpan">Simpan</button>
                                        <button type="button" class="btn btn-danger btn-lg" id="kembali">Kembali</button>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                    </form>
                </div>
            </div>
            <div class="card loading-div" style="display: none;" id="haledit">
                <div class="card-header">
                    <h4>Edit Data</h4>
                </div>
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
                            <button type="submit" class="btn btn-primary btn-lg btn-block" id="btnedit">Simpan</button>
                            <button type="submit" class="btn btn-primary btn-lg btn-block" id="kembaliedit">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('admin/assets/js/plugins/loading.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/sweetalert.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/petugas.js')}}"></script>
@endsection