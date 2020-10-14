<?php

namespace App\Http\Controllers;


use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{      
  
    
    public function __construct()
    {
        
        $this->middleware('auth');
        // Auth::user();

        
     }
    

   

    //public function getPost(){
//         // return create post page !";
        
//         return view ('posts.create');
// }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


     $loggedInUser = Session::get('id');

    //dd($loggedInUser);
        // //create a variable & store all blog from database in it
              $posts=Post::where('userId', $loggedInUser)->paginate(5);
        
        //return a view 
            return view('posts.index', compact('posts'));
            //  return view('posts.index')->withPosts($posts);
             
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
     {
    
        return view ('posts.create');
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation of code
        $loggedInUser = Session::get('id');
        //  dd( $loggedInUser);
          $this->validate($request,array(
            'title'=>'required|max:255',
            'body'=>'required',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug'
            ));

        //store in the database
            $post=new Post;
            $post->title=$request->title;
            $post->body=$request->body;
            $post->slug=$request->slug;
            $post->userId=$loggedInUser;
            $post->save();

            Session::flash('Success','The blog post was successfully saved !');

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
     $post=Post::find($id);

     return view('posts.show')->withPost($post);
     
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in database & save it as variable

        $post=Post::find($id);

        //return the view & save in the variable we previosly created

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
        //validation of data
        $post = Post::find($id);
      if($request->input('slug') == $post->slug){

        $this->validate($request,array(
            'title'=>'required|max:255',
            'body'=>'required'
        ));
        }
        else{

        $this->validate($request,array(
            'title'=>'required|max:255',
            'body'=>'required',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug'
        ));
        }
    
            // Save the data the database
            
            $post= Post::find($id);
            $post->title=$request->input('title');
            $post->body=$request->input('body');
            $post->slug=$request->input('slug');
            $post->save();

         // set flash data with success message
         Session::flash('Success','The blog post was successfully Updated !');

            // Redirect the flash data to posts.show

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
        $post=Post::find($id);
        $post->delete();

        Session::flash('Success','The blog post was successfully Deleted !');


        return redirect()->route('posts.index');
    }
}

