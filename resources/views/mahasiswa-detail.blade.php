<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Detail Mahasiswa</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
   <div class="container mt-5 mb-5">
        <div class="mb-3">
            <a href="{{ url('/mahasiswa') }}" class="btn btn-secondary btn-sm">
                &larr; Kembali ke Daftar
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white font-weight-bold">
                <h5 class="mb-0">Profil Mahasiswa</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless table-sm">
                            <tr><td width="30%">NIM</td><td width="5%">:</td><td>{{ $mhs->nim }}</td></tr>
                            <tr><td>Nama Lengkap</td><td>:</td><td>{{ $mhs->nama }}</td></tr>
                            <tr><td>Email</td><td>:</td><td>{{ $mhs->email }}</td></tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless table-sm">
                            <tr><td width="30%">Fakultas</td><td width="5%">:</td><td>{{ $mhs->jurusan }}</td></tr>
                            <tr><td>Dosen DPA</td><td>:</td><td>{{ $mhs->dosen_pembimbing->nama ?? '-' }}</td></tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><span class="badge bg-success">AKTIF</span></td> 
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-dark text-white font-weight-bold">
                <h5 class="mb-0">Kartu Rencana Studi (KRS)</h5>
            </div>
            <div class="card-body p-0"> 
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode MK</th>
                            <th>Mata Kuliah</th>
                            <th class="text-center">SKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $totalSks = 0; @endphp
                        
                        @forelse($mhs->mata_kuliahs as $mk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mk->kode_matkul }}</td>
                            <td>{{ $mk->nama_matkul }}</td>
                            <td class="text-center">{{ $mk->sks }}</td>
                        </tr>
                        @php $totalSks += $mk->sks; @endphp
                        
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada Mata Kuliah yang diambil.</td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total SKS yang Diambil :</strong></td>
                            <td class="text-center"><strong>{{ $totalSks }} SKS</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"></script>
</body>
</html>