@extends('layouts.main')

@section('main')
    <div class="container text-center text-align-center py-3 rounded my-4 shadow-sm bg-primary-subtle">
        <h1>Formulir Data Inventaris</h1>
    </div>
    <div class="container bg-body-tertiary py-2 rounded shadow mb-3">
        <div class="mb-3">
            <label for="sound_system" class="form-label">Sound System<small class="text-danger">*</small></label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sound_system" id="sound_system" value="ya">
                <label class="form-check-label" for="sound_system">
                    Ya
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sound_system" id="sound_system" value="tidak">
                <label class="form-check-label" for="sound_system">
                    Tidak
                </label>
            </div>
        </div>
        <div class="mb-3">
            <label for="sound_system" class="form-label">Kursi Vernekel<small class="text-danger">*</small></label>
            <input type="number" class="form-control" name="kursi" placeholder="Persediaan Kursi 150 Buah" required max="150">
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">Area Kantor Dan Halaman<small class="text-danger">*</small></label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="area" id="area" value="ya">
                <label class="form-check-label" for="area">
                    Ya
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="area" id="area" value="tidak">
                <label class="form-check-label" for="area">
                    Tidak
                </label>
            </div>
        </div>
        <div class="mb-3">
            <label for="ac" class="form-label">Air Conditioner (AC)<small class="text-danger">*</small></label>
            <input type="number" class="form-control" name="ac" placeholder="Persediaan AC 8 Unit" required>
        </div>
        <div class="container d-flex justify-content-end gap-3">
            <a href="#" class="btn btn-primary pb-2 px-5">Submit</a>
            <a href="#" class="btn btn-danger pb-2 px-5">Cancel</a>
        </div>
    </div>
@endsection
