<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::get(); 
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        

         $request->validate([
        'title' => 'required|max:100',
        'description' => 'required'

        ]);

        if($request->hasFile('img')) {

            $filenameWithExt = $request->file('img')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension =$request->file('img')->getClientOriginalExtension();

            $filenameToStore = $filename.'.'.time().'.'.$extension;

            $path =  $request->file('img')->storeAs('public/img', $filenameToStore);

        } else {

            $filenameToStore ='';
        

        }

      // dd($request);
        $post = new Post();
        $post->fill($request->all());
        $post->img = $filenameToStore;
      
      
      
        if ($post->save()){
            return redirect('/posts')->with('status', "Successfully Save");
        }

        return redirect('/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
         
        return view('posts.show', compact('post'));
        // dd($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
       
        return view('posts.edit', compact('post'));
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
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required'
        ]);

        if($request->hasFile('img')) {

            $filenameWithExt = $request->file('img')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension =$request->file('img')->getClientOriginalExtension();

            $filenameToStore = $filename.'.'.time().'.'.$extension;

            $path =  $request->file('img')->storeAs('public/img', $filenameToStore);

        } else {

            $filenameToStore ='';
        

        }

     
        $post = Post::find($id);
        $post->fill($request->all());
        $post->img = $filenameToStore;
        $post->save();

        return redirect('/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $post = Post::find($id);
        $post->delete();

        return redirect('/posts');
    }
}