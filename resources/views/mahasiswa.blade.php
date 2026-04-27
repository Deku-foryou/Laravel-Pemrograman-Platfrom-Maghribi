<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>mahasiswa</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
   <div class="container">
      <div class="mt-5">
         <h1 class="text-center">Mahasiswa List</h1>
         <div class="table-responsive mt-5">
            <a href="{{ url('/mahasiswa/add') }}" class="btn btn-primary mb-3">Add new</a>
            @if (Session::has('message'))
               <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            <form method="GET">
               <div class="input-group mb-3">
                  <input type="text" name="title" value="{{ request('title') }}" class="form-control"
                     placeholder="search mahasiswa" aria-label="Recipient’s username" aria-describedby="button-addon2">
                  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
               </div>
            </form>
            <table class="table table-striped table-hover">
               <thead>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Jurusan</th>
                  <th>Angkatan</th>
                  <th>Action</th>
               </thead>
               <tbody class="table-group-divider">
                  @if ($mahasiswa->count() == 0)
                     <tr>
                        <td colspan="7" class="text-center">No data found </td>
                     </tr>
                  @endif
                  @foreach ($mahasiswa as $mhs)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->email }}</td>
                        <td>{{ $mhs->jurusan }}</td>
                        <td>{{ $mhs->angkatan }}</td>
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
            {{ $mahasiswa->onEachSide(1)->links() }}
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"></script>
</body>

</html>