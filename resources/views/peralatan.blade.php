@extends('layouts.main')

@section('main')
    <div class="container text-center text-align-center py-3 rounded my-4 shadow-sm bg-primary-subtle">
        <h1>Formulir Peralatan</h1>
    </div>
    <div class="container bg-white py-2 rounded shadow mb-3">
        <form action="{{ route('form_peralatan') }}" method="POST">
            @csrf
            <div class="mb-3 border bg-body-tertiary rounded p-3 mt-3">
                <label for="gedung" class="form-label">Kursi Vernekel<small class="text-danger">*</small></label>
                <input type="text" class="form-control @error('jumlah_kursi') is-invalid @enderror" name="jumlah_kursi"
                    required>
                <small class="text-muted"><i><small class="text-danger">*</small>Ada 150 kursi vernekel yang tersedia!</i></small>
                @error('jumlah_kursi')
                    <div class="invalid-feedback">
                        <small class="text-danger">Maksimal kursi vernekel yang dapat disewa 150 buah</small>
                    </div>
                @enderror
            </div>
            <div class="mb-3 border bg-body-tertiary rounded p-3 mt-3">
                <label for="gedung" class="form-label">AC<small class="text-danger">*</small></label>
                <input type="text" class="form-control @error('jumlah_ac') is-invalid @enderror" name="jumlah_ac"
                    required>
                <small class="text-muted"><i><small class="text-danger">*</small>Ada 8 AC yang tersedia!</i></small>
                @error('jumlah_ac')
                    <div class="invalid-feedback">
                        <small class="text-danger">Maksimal AC yang dapat disewa adalah 8 buah</small>
                    </div>
                @enderror
            </div>

            <div class="mb-3 border bg-body-tertiary rounded p-3 mt-3">
                <label for="radioSound_system" class="form-label">Sound System<small class="text-danger">*</small></label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sound_system" value="ya">
                    <label class="form-check-label" for="sound_system">Ya</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sound_system" value="tidak">
                    <label class="form-check-label" for="sound_system">Tidak</label>
                </div>
            </div>

            <div class="mb-3 border bg-body-tertiary rounded p-3 mt-3">
                <label for="space_promotion" class="form-label">Space Promotion<small class="text-danger">*</small></label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="radioSYa" name="space_promotion" value="ya">
                    <label class="form-check-label" for="space_promotion">Ya</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="radioSTidak" name="space_promotion" value="tidak">
                    <label class="form-check-label" for="space_promotion">Tidak</label>
                </div>
                <input type="text" class="form-control" style="display: none" id="inputTambahanS" name="input_space">
                <small class="text-muted" id="infoS"><i><small class="text-danger">*</small>Spase dihitung setiap m<sup>2</sup></i></small>
            </div>

            <div class="mb-3 border bg-body-tertiary rounded p-3 mt-3">
                <label for="area_kantor" class="form-label">Area Kantor dan Halaman<small
                        class="text-danger">*</small></label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="radioAYa" name="area_kantor" value="ya">
                    <label class="form-check-label" for="area_kantor">Ya</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="radioATidak" name="area_kantor" value="tidak">
                    <label class="form-check-label" for="area_kantor">Tidak</label>
                </div>
                <input type="text" class="form-control" style="display: none" id="inputTambahanA" name="input_area">
                <small class="text-muted" id="infoA"><i><small class="text-danger">*</small>Area dihitung setiap m<sup>2</sup></i></small>
            </div>


            <div class="container d-flex justify-content-end gap-3 m-3">
                <a href="/" class="btn btn-danger pb-2 px-5">Cancel</a>
                <button class="btn btn-primary pb-2 px-5" type="submit" value="save">Next</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        const yaSRadio = document.getElementById('radioSYa');
        const tidakSRadio = document.getElementById('radioSTidak');
        const yaARadio = document.getElementById('radioAYa');
        const tidakARadio = document.getElementById('radioATidak');
        const inputTambahanS = document.getElementById('inputTambahanS');
        const inputTambahanA = document.getElementById('inputTambahanA');

        yaSRadio.addEventListener('change', function() {
            if (this.checked) {
                inputTambahanS.style.display = 'block';
            }
        });
        tidakSRadio.addEventListener('change', function() {
            if (this.checked) {
                inputTambahanS.style.display = 'none';
            }
        });
        yaARadio.addEventListener('change', function() {
            if (this.checked) {
                inputTambahanA.style.display = 'block';
            }
        });
        tidakARadio.addEventListener('change', function() {
            if (this.checked) {
                inputTambahanA.style.display = 'none';
            }
        });
    </script>
@endsection
