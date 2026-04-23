<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dosen Detail</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
   <div class="container mt-5">
        <div class="card col-md-8 mx-auto">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Detail Dosen</h4>
            </div>
            <div class="card-body">
                <p><strong>NIDN:</strong> {{ $dsn->nidn }}</p>
                <p><strong>Nama:</strong> {{ $dsn->nama }}</p>
                <p><strong>Email:</strong> {{ $dsn->email }}</p>
                
                <div class="d-flex flex-column align-items-end text-muted mt-4">
                    <div>Terdaftar pada: {{ $dsn->created_at }}</div>
                </div>
                
                <a href="{{ route('dosen') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"></script>
</body>
</html>