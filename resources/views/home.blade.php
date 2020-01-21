 {{-- home page --}}

@extends('main')
@section('title', '| HomePage')
@section('content')

    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron">
        <h1>Welcome To Your Dashboard</h1>
             <div class="row">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
        <p>This is a test blog. Thank you for visiting</p>
    <a class="btn btn-success btn block btn-lg" href="{{ route('posts.index') }}" role="button">Posts</a></p>
    <a class="btn btn-success btn block btn-lg" href="{{ route('posts.create') }}" role="button">Create New Post</a></p>
</div>
</div>
    </div><!-- end of row header-->
     
  <div class="row">
    <div class="col-md-8">
       <hr>
  </div>
      <div class="col-md-3 col-md-offset-1">
        <h2> Sidebar</h2>
      </div>
    </div>
@endsection