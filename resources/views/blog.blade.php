<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>blog</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
   <div class="container">
      <div class="mt-5">
         <h1 class="text-center">Blog List</h1>
         <div class="table-responsive mt-5">
            <a href="{{ url('/blog/add') }}" class="btn btn-primary mb-3">Add new</a>
            @if (Session::has('message'))
               <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            <form method="GET">
               <div class="input-group mb-3">
                  <input type="text" name="title" value="{{ $title }}" class="form-control" placeholder="search title"
                     aria-label="Recipient’s username" aria-describedby="button-addon2">
                  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
               </div>

            </form>
            <table class="table table-striped table-hover">
               <thead>
                  <th>No</th>
                  <th>Title</th>
                  <th>Action</th>
               </thead>
               <tbody class="table-group-divider">
                  @if ($blogs->count() == 0)
                     <tr>
                        <td colspan="3" class="text-center">No data found with <strong>{{ $title }}</strong> keyword</td>
                     </tr>
                  @endif
                  @foreach ($blogs as $blogslist)
                     <tr>
                        <td>{{($blogs->currentpage() - 1) * $blogs->perpage() + $loop->index + 1}}</td>
                        <td>{{ $blogslist->title }}</td>
                        <td><a href="{{ url('blog/' . $blogslist->id . '/detail') }}">view</a> |<a href="{{ url('blog/' . $blogslist->id . '/edit') }}">edit</a> |<a href="{{ url('blog/' . $blogslist->id . '/delete') }}">Delete</a></td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
         {{ $blogs->links() }}
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"></script>
</body>

</html>