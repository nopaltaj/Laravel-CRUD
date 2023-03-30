@extends('admin.parent')

@section('content')
    <div class="section-title mt-5">
        <h2>Show siswa</h2>
    </div>


    
    <label for="" class="form-label mx-5">Nama Siswa</label>
    <input type="text" class="form-control mx-5" name="name" value="{{ $siswa->name }}" readonly>

    <label for="" class="form-label mt-3 mx-5">NISN siswa</label>
    <input type="number" class="form-control mx-5" name="nim" value="{{ $siswa->nim }}" readonly>

    <div class="row g-2 mx-5">
        <div class="col-md ">
            <label for="" class="form-label mt-3">Nomer Siswa</label>
            <input type="number" class="form-control" name="phone" value="{{ $siswa->phone }}" readonly>

        </div>

        <div class="col-md ">
            <label for="" class="form-label mt-3">kota Siswa</label>
            <input type="text" class="form-control" name="city" value="{{ $siswa->city }}" readonly>

        </div>
    </div>

    <a href="{{ route('siswa.index') }}" class="btn btn-primary mr-4 mt-4 mx-5">Back</a>
    
    
   
@endsection
