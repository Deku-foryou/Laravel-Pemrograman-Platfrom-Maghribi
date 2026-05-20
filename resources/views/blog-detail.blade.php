<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
   <div class="container">
      <div class="mt-5">
         <h2 class="text-center">{{ $blog ->title }}</h2>
         <div class="body-blog">
            <p>{{ $blog ->description }}</p>
            <div class="d-flex flex-column align-items-end">
               <div>{{ $blog->created_at }}</div>
               <div>by admin</div>
            </div>
         </div>
         </div>
         <div class="mt-5">
            @if ($errors->any())
            <div class="alert alert-danger col-md-6">
               <ul>
                  @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
         @endif
         @if (Session::has('message'))
               <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            <h5 >Comments: </h5>
               <form action="{{ url ('comment/'. $blog->id) }}" method="POST">
                  @csrf
                  <textarea name="comment_text" class="form-control"  style="resize:none" rows="5"></textarea>
                  <button class="btn btn-primary mt-3" type="submit">Submit</button>
               </form>
         </div>

         <hr class="mt-5">
         <div class="mt-5">
            {{ $blog->comments->count() == 0 ? 'no comment yet' : '' }}
            @foreach ($blog->comments as $comment )
            <div class="p-3 mb-3" style="background-color: aliceblue;">{{ $comment->comment_text }}</div>
            @endforeach
         </div>
         </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"></script>
</body>
</html>