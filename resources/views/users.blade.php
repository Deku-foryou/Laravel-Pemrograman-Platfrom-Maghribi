<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Users</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
   <div class="container">
      <div class="mt-5">
         <h1 class="text-center">Users List</h1>
         <div class="table-responsive mt-5">

            <table class="table table-striped table-hover">
               <thead class="table-dark">
                  <th>No</th>
                  <th>name</th>
                  <th>Email</th>
                  <th>Phone</th>


               </thead>
               <tbody class="table-group-divider">
                  @if ($users->count() == 0)
                     <tr>
                        <td colspan="3" class="text-center">No data found with <strong>{{ $title }}</strong> keyword</td>
                     </tr>
                  @endif
                  @foreach ($users as $user)
                     <tr>
                        <td> {{$loop->index + 1}}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone -> phone_number ?? '-' }}</td>

                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>

      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"></script>
</body>

</html>