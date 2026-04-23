<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyawan List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="mt-5">
            <h1 class="text-center">Karyawan List</h1>
            <div class="table-responsive mt-5">
                <a href="{{ url('/karyawan/add') }}" class="btn btn-primary mb-3">Add new</a>
                <form method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari Nama karyawan">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </form>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIk</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @if ($karyawan->count() == 0)
                            <tr>
                                <td colspan="6" class="text-center">No data found</td>
                            </tr>
                        @endif
                        @foreach ($karyawan as $krw)
                        <tr>
                            <td>{{ ($karyawan->currentPage() - 1) * $karyawan->perPage() + $loop->iteration }}</td>
                            <td>{{ $krw->nik }}</td>
                            <td>{{ $krw->nama }}</td>
                            <td>{{ $krw->email }}</td>
                            <td>{{ $krw->jabatan }}</td>
                            <td>
                                <a href="{{ url('/karyawan/' . $krw->id . '/detail') }}" class="btn btn-sm btn-info">view</a>
                                <a href="#" class="btn btn-sm btn-warning">edit</a>
                                <a href="#" class="btn btn-sm btn-danger">delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $karyawan->appends(['search' => request('search')])->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</body>
</html>