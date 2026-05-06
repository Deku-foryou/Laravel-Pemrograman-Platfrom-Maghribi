<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosen List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="mt-5">
            <h1 class="text-center">Dosen List</h1>
            <div class="table-responsive mt-5">
                <a href="{{ url('/dosen/add') }}" class="btn btn-primary mb-3">Add new</a>
                @if (Session::has('message'))
               <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
                <form method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Cari Nama dosen">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </form>

                <table class="table table-striped table-hover">
                    <thead class="">
                        <tr>
                            <th>No</th>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @if ($dosen->count() == 0)
                            <tr>
                                <td colspan="6" class="text-center">No data found</td>
                            </tr>
                        @endif
                        @foreach ($dosen as $dsn)
                            <tr>
                                <td>{{ ($dosen->currentPage() - 1) * $dosen->perPage() + $loop->iteration }}</td>
                                <td>{{ $dsn->nidn }}</td>
                                <td>{{ $dsn->nama }}</td>
                                <td>{{ $dsn->email }}</td>
                                <td>
                                    <a href="{{ url('/dosen/' . $dsn->id . '/detail') }}"
                                        class="btn btn-sm btn-info">view</a>
                                    <a href="{{ url('/dosen/' . $dsn->id . '/edit') }}"
                                        class="btn btn-sm btn-warning">edit</a>
                                    <a href="{{ url('/dosen/' . $dsn->id . '/delete') }}"
                                        class="btn btn-sm btn-danger">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{ $dosen->appends(['search' => request('search')])->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</body>

</html>