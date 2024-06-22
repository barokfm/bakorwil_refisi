@extends('layouts.main')

@section('main')
    <div class="container text-center text-align-center py-3 rounded my-4 shadow-sm bg-primary-subtle">
        <h1>Formulir Data Peminjam</h1>
    </div>
    <div class="container bg-white py-2 rounded shadow mb-3">
        <form action="{{ route('form_peminjam') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 border bg-body-tertiary rounded p-3 mt-3">
                <label for="gedung_id" class="form-label">Gedung<small class="text-danger">*</small></label>
                <input type="text" class="form-control" value="{{ $gedung->nama }}" disabled>
                <input type="number" class="form-control" name="gedung_id" value="{{ $gedung->id }}" hidden>
            </div>
            <div class="mb-3 border bg-body-tertiary rounded p-3 mt-3">
                <label for="nama_peminjam" class="form-label">Nama Peminjam<small class="text-danger">*</small></label>
                <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror"" placeholder="John Doe" name="nama_peminjam" id="nama_peminjam"
                    required>
                @error('nama_peminjam')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 border bg-body-tertiary rounded p-3 mt-3">
                <label for="alamat" class="form-label">Alamat<small class="text-danger">*</small></label>
                <input type="text" class="form-control" name="alamat" id="alamat" required>
            </div>
            <div class="mb-3 border bg-body-tertiary rounded p-3 mt-3">
                <label for="email" class="form-label">Email<small class="text-danger">*</small></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required autocomplete="on">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 border bg-body-tertiary rounded p-3 mt-3">
                <label for="no_hp" class="form-label">Nomor HP<small class="text-danger">*</small></label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" required>
                @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 border bg-body-tertiary rounded p-3 mt-3">
                <label for="no_ktp" class="form-label">No. KTP<small class="text-danger">*</small></label>
                <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" id="no_ktp" required>
                @error('no_ktp')
                    <div class="invalid-feedback">
                        Masukkan No. Ktp Valid!
                    </div>
                @enderror
            </div>
            <div class="container-fluid border bg-body-tertiary rounded d-flex flex-column justify-content-center">
                <label for="foto_ktp" class="form-label">Foto KTP<small class="text-danger">*</small></label>
                <img class="img-preview img-fluid mb-3 col-sm-3">
                <div class="my-2">
                    <input class="form-control @error('foto_ktp') is-invalid @enderror" id="foto_ktp" type="file"
                        name="foto_ktp" required onchange="previewImage()">
                    @error('foto_ktp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mt-3 border bg-body-tertiary rounded p-3">
                <label for="agenda" class="form-label">Agenda<small class="text-danger">*</small></label>
                <input type="text" class="form-control" name="agenda" id="agenda">
            </div>
            <div class="container-fluid border bg-body-tertiary mt-3 rounded d-flex flex-column justify-content-center">
                <label for="tgl_awal" class="form-label">Tanggal Acara<small class="text-danger">*</small></label>
                <input type="date" name="tgl_awal" class="from-control text-secondary border p-1 rounded" id="tgl_awal"
                    required>
                <small class="text-muted"><i><small class="text-danger">*</small>Tentukan tanggal acara anda</i></small>
            </div>
            <div class="container-fluid border bg-body-tertiary mt-3 rounded d-flex flex-column justify-content-center">
                <label for="tgl_akhir" class="form-label">Tanggal Berakhir<small class="text-danger">*</small></label>
                <input type="date" name="tgl_akhir" class="from-control text-secondary border p-1 rounded" id="tgl_akhir"
                    required>
                <small class="text-muted"><i><small class="text-danger">*</small>Tentukan tanggal berakhir acara
                        anda</i></small>
            </div>
            <div class="container-fluid mt-3 border bg-body-tertiary rounded d-flex flex-column justify-content-center">
                <label for="waktu" class="form-label">Waktu Acara<small class="text-danger">*</small></label>
                <input type="time" name="waktu" class="from-control text-secondary border p-1 rounded mb-2"
                    id="waktu" required>
                <small class="text-muted"><i><small class="text-danger">*</small>Tentukan waktu acara anda</i></small>
            </div>
            <div class="container-fluid mt-3 border bg-body-tertiary rounded d-flex flex-column justify-content-center">
                <label for="jam_operasional" class="form-label">Jam Operasional<small
                        class="text-danger">*</small></label>
                <input type="number" name="jam_operasional" onsubmit="validasi()"
                    class="from-control text-secondary border p-1 rounded @error('jam_operasional') is-invalid @enderror"
                    id="jam_operasional" required>
                <small class="text-muted"><i><small class="text-danger">*</small>Tentukan berapa jam operasional yang anda
                        inginkan!</i></small>
                @error('jam_operasional')
                    <div class="invalid-feedback">
                        <small class="text-danger">Minimal Jam Operasinal adalah 5 jam</small>
                    </div>
                @enderror
            </div>
            <div class="container d-flex justify-content-end gap-3 m-3">
                <a href="/" class="btn btn-danger pb-2 px-5">Cancel</a>
                <button class="btn btn-primary pb-2 px-5" type="submit" value="save">Next</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#foto_ktp');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
