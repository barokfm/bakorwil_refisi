@extends('layouts.main')

@section('main')
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#peminjaman">Peminjaman</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link active" href="/dashboard">Dashboard</a>
                            </li>
                        @endauth
                    </ul>
                    @auth
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="btn btn-danger px-4 mx-3" type="submit">Log out</button>
                        </form>
                    @else
                        <a href="/login" class="btn btn-primary px-4 mx-3" type="submit">Login</a>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/bakorwil.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/bakorwil-2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/bakorwil-3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/bakorwil-4.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container py-4">
        <div class="container-fluid d-flex align-items-center bg-light gap-3">
            <img src="/svg/hall.svg" alt="apartment-rent" width="60px">
            <h2>Sewa Gedung</h2>
        </div>
        <hr class="border-dark">
    </div>
    <section id="peminjaman">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach ($gedungs as $gedung)
                <div class="col">
                    <div class="card shadow w-75">
                        <img src="img/bakorwil-4.jpg " class="card-img-top" alt="aula-bakorwil">
                        <div class="card-body">
                            <h5 class="card-title">{{ $gedung->nama }}</h5>
                            <p class="card-text">Diharapkan membaca beberapa rincian terkait gedung ini beserta list <i>price</i>.
                            </p>
                        </div>
                    </div>
                    <section class="py-3 pb-5   ">
                        <button type="button" class="btn btn-success shadow" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            RINCIAN
                        </button>
                        <a href="/formulir/{{ $gedung->id }}" class="btn btn-primary px-4">SEWA</a>
                    </section>
                </div>
                @endforeach
            </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Rincian Aula</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
                </div>
            </div>
        </div>
    </div>
@endsection
