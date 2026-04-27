<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit </title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
   <div class="container">
      <div class="mt-5">
            <h2>Edit Blog : {{ $blog->title }}</h2>

            @if ($errors->any())
            <div class="alert alert-danger col-md-6">
               <ul>
                  @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
         @endif
         
            <form action="{{ url('/blog/'.$blog->id.'/update') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="col-md-6">
               <label for="title" class="form-label">Title :</label>
               <input type="text" class="form-control" id="title" name="title" value="{{$blog->title}}">
            </div>
            <div class="col-md-6 mt-2">
               <label for="description" class="form-label">description :</label>
               <textarea name="description" class="form-control" id="desc-textarea"
                  rows="5">{{$blog->description}}</textarea>
            </div>
            <div class="col-md-6 mt-3">
               <button class="btn btn-success form-control">Save</button>
            </div>
         </form>
      </div>
   </div>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"></script>
</body>
</html>