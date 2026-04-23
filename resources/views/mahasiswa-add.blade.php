<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
   <div class="container mt-5">
        <h2 >Add Mahasiswa</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger col-md-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/mahasiswa/create') }}" method="POST">
            @csrf
            <div class="col-md-6 mt-2">
                <label class="form-label">NIM :</label>
                <input type="text" class="form-control" name="nim" value="{{ old('nim') }}">
            </div>
            <div class="col-md-6 mt-2">
                <label class="form-label">Nama :</label>
                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
            </div>
            <div class="col-md-6 mt-2">
                <label class="form-label">Email :</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>
            <div class="col-md-6 mt-2">
                <label class="form-label">Jurusan :</label>
                <input type="text" class="form-control" name="jurusan" value="{{ old('jurusan') }}">
            </div>
            <div class="col-md-6 mt-2">
                <label class="form-label">Angkatan :</label>
                <input type="text" class="form-control" name="angkatan" value="{{ old('angkatan') }}">
            </div>
            <div class="col-md-6 mt-3">
                <button class="btn btn-success form-control">Save</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"></script>
</body>
</html>