@extends('user.layouts.utama')

@section('main-page')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $title }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
        </div>
        <div class="container d-flex align-items-center justify-content-center">
            <div class="container row gap-3">
                <div class="col rounded p-3 d-flex shadow bg-primary-subtle">
                    <div><img src="storage/avatar/Ln42gl4TUr3TRuKznFSJNPGZNCxMQhh8H3F8S8BV.png" width="80"></div>
                    <div class="d-flex flex-column justify-content-center px-4">
                        <span class="h2 mb-0">{{ $jumlahUser }}</span>
                        <small>Total Pengguna</small>
                    </div>
                </div>
                <div class="col p-3 d-flex rounded shadow bg-warning-subtle">
                    <div><img src="storage/avatar/Ln42gl4TUr3TRuKznFSJNPGZNCxMQhh8H3F8S8BV.png" width="80"></div>
                    <div class="d-flex flex-column justify-content-center px-4">
                        <span class="h2 mb-0">{{ $jumlahPengaju }} </span>
                        <small>Total Pengaju</small>
                    </div>
                </div>
            </div>
        </div>

        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    </main>
@endsection
