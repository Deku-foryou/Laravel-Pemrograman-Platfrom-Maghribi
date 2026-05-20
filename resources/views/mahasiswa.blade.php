<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mahasiswa</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>

<body>
   <div class="container">
      <div class="mt-5">
         <h1 class="text-center">Mahasiswa List</h1>
         <div class="table-responsive mt-5">
            <a href="{{ url('/mahasiswa/add') }}" class="btn btn-primary mb-3">Add new <i
                  class="bi bi-plus-circle-fill"></i></a>
            @if (Session::has('message'))
               <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            <form method="GET">
               <div class="input-group mb-3">
                  <span class="input-group-text">
                     <i class="bi bi-search"></i>
                  </span>

                  <input type="text" name="title" value="{{ request('title') }}" class="form-control"
                     placeholder="Search mahasiswa..." aria-label="Search mahasiswa">

                  <button class="btn btn-primary" type="submit">
                     Search
                  </button>
               </div>
            </form>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                   <tr>
                      <th>No</th>
                      <th>NIM</th>
                      <th>Nama Mahasiswa</th>
                      <th>Fakultas</th>
                      <th>Dosen DPA</th>
                      <th>Action</th>
                   </tr>
                </thead>
                <tbody class="table-group-divider">
                   @if ($mahasiswas->count() == 0)
                      <tr>
                         <td colspan="6" class="text-center">No data found </td>
                      </tr>
                   @endif
                   @foreach ($mahasiswas as $mhs)
                      <tr>
                         <td>{{ $loop->iteration }}</td>
                         <td>{{ $mhs->nim }}</td>
                         <td>{{ $mhs->nama }}</td>
                         <td>{{ $mhs->jurusan }}</td>
                         <td>
                            <i class="bi bi-person-fill"></i> {{ $mhs->dosen_pembimbing->nama ?? 'Belum Ada DPA' }}
                         </td>
                         <td>
                            <a href="{{ url('/mahasiswa/' . $mhs->id . '/detail') }}" class="btn btn-sm btn-info">view</a>
                            <a href="{{ url('/mahasiswa/' . $mhs->id . '/edit') }}" class="btn btn-sm btn-warning">edit</a>
                            <a href="{{ url('/mahasiswa/' . $mhs->id . '/delete') }}"
                               class="btn btn-sm btn-danger">delete</a>
                         </td>
                      </tr>
                   @endforeach
                </tbody>
             </table>
         </div>
         <div class="d-flex justify-content-center mt-3">
            {{ $mahasiswas->onEachSide(1)->links() }}
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"></script>
</body>

</html>