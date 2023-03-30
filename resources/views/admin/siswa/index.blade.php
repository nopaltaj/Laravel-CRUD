@extends('admin.parent')

@section('content')

<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto">RPL</h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link  active" href="/">Home</a></li>
          <li><a class="getstarted text-dark " href="{{ route('siswa.create') }}">Tambah Siswa</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

<div class="section-title mt-5">
    <h2>Data Siswa</h2>
  </div>

<div class="container card">
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Absen</td>
                    <td>Name</td>
                    <td>NISN</td>
                    <td>Phone</td>
                    <td>City</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->nim }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>{{ $row->city }}</td>
                    <td>
                        <a href="{{ route('siswa.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('siswa.show', $row->id) }}" class="btn btn-primary">Show</a>
                        <form action="{{ route('siswa.destroy', $row->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger mt-1" type="submit">
                                Delete
                            </button>

                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection