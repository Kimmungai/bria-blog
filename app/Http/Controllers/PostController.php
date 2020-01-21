<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Session;

class PostController extends Controller
{

    // check authentication
    public function _construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store blog posts in it (paginated view)
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        //return a veiw and pass in the variable
        return view('posts.index') -> withPosts($posts);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body' => 'required'
        ));


        //store data in db
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;

        $post->save();

        //flash message user on successfull request
        Session::flash('success', 'The post was made successfuly!');

        //redirect to another page
        return redirect()->route('posts.show', $post->id);        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost ($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the db and save as a variable
         $post = Post::find($id);

        //return the view and parse the content into the view for editing
         return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate the data before use
        $post = Post::find($id);

        if ($request->input('slug') == $post->slug){
         $this->validate($request, array(
            'title' => 'required|max:255',
            'body'  => 'required'
        ));
     } else {
            $this->validate($request, array(
            'title' => 'required|max:255',
            'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body'  => 'required'
        ));
     }

        //save the sata to db
        $post =Post::find($id);

        $post->title=$request->input('title');
        $post->slug = $request->input('slug');
        $post->body=$request->input('body');

        $post->save();
        // set flash data with success message
        Session::flash('success', 'Post successfuly updated.');
        //redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find item to delete
        $post=Post::find($id);

        $post->delete();

        Session::flash('success', 'Post successfuly Deleted.');

        return redirect()->route('posts.index');
    }
}
