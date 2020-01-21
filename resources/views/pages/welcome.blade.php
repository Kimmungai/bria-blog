 {{-- Welcome page --}}
@extends('main')
@section('title', '| HomePage')
   @section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron">
  <h1>Welcome to Bria-blog</h1>
  <p>This is a test blog. Thank you for visiting</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular post</a></p>
</div>
</div>
    </div><!-- end of row header-->
     
  <div class="row">
    <div class="col-md-8">
       
    <hr>
@foreach($posts as $post)
 <div class="post">
    <h3>{{ $post->title }}</h3> 
    <p>{{ substr($post->body, 0, 300) }} {{ strlen($post->body) > 300 ? "..." : "" }}</p>
    <a href="{{ url('blog/'.$post->slug)}}" class="btn btn-primary"> Read more</a>
    </div>
@endforeach
  </div>
      <div class="col-md-3 col-md-offset-1">
        <h2> Sidebar</h2>
      </div>
    </div>
@endsection