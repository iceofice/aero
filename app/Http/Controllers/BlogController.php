<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;
use Storage;

use Illuminate\Routing\Controller as BaseController;

class BlogController extends BaseController
{
    function dashboard(){
    	return view('blog.dashboard');
    }

    function newPost(){
    	return view('blog.new-post');
    }

    function list(){
        $posts = Post::all();
        return view('blog.list',compact('posts'));
    }

    function grid(){
        return view('blog.grid');
    }

    function detail(){
    	return view('blog.detail');
    }
    function details($id){
        $post = Post::find($id);
    	return view('blog.detail',compact('post'));
    }

    public function post(Request $request){
        if ($request->hasFile('image')){
            $request->image=$request->image->getClientOriginalName();
            // $upload = $request->image->storeAs('images',$request->image);
            $request->file('image')->storeAs('images',$request->image,'public');
        }
        Post::create([
            'title'=>$request->title,
            'category'=>$request->category,
            'content'=>$request->content,
            'image'=>$request->image,
            'author'=>Auth::user()->name
        ]);
        return redirect('blog/list')->with('message','Post Created!');
    }

    public function edit($id){
        $post = Post::find($id);
        return view('blog.edit-post',compact('post'));
    }

    public function update(Request $request,$id){
        $post = Post::find($id);
        if ($request->hasFile('image')){
            $request->image=$request->image->getClientOriginalName();
            Storage::delete('/public/images/'.$post->image);
            $request->file('image')->storeAs('images',$request->image,'public');
        }else{
            $request->image= $post->image;
        }
        Post::where('id',$post->id)
            ->update([
            'title'=>$request->title,
            'category'=>$request->category,
            'content'=>$request->content,
            'image'=>$request->image
        ]);
        return redirect('blog/detail/'.$post->id)->with('message','Post Updated!');
    }

    public function delete($id){
        Post::destroy($id);
        return redirect('blog/list')->with('message','Post Deleted!');
    }

    
}