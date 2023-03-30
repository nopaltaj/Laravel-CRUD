@extends('admin.parent')

@section('content')

    <div class="section-title mt-5">
        <h2>Tambah siswa</h2>
    </div>

    
<div class="px-5">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif
</div>
   

    <form action="{{ route('siswa.store') }}" method="post" class="px-5">
        @csrf
        @method('POST')

        <label for="" class="form-label">Nama Siswa</label>
        <input type="text" class="form-control " name="name">

        <label for="" class="form-label mt-3">NISN siswa</label>
        <input type="number" class="form-control" name="nim">

        <div class="row g-2">
            <div class="col-md ">
                <label for="" class="form-label mt-3">Nomer Siswa</label>
                <input type="number" class="form-control" name="phone">

            </div>

            <div class="col-md ">

                <label for="" class="form-label mt-3">kota Siswa</label>
                <input type="text" class="form-control" name="city">

            </div>
        </div>

        <a href="{{ route('siswa.index') }}" class="btn btn-warning mr-4 mt-5">Back</a>
        <button type="submit" class="btn btn-primary mt-5 mx-3">Add Siswa</button>
        
       
    </form>
@endsection
