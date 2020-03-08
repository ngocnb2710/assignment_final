<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function addForm() {
        $category = Category::all();
        return view('admin/post/post',['category'=>$category]);
    }

    public function updateForm(Request $request) {
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->noidung;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->save();
        return redirect()->back();
    }
    public function editForm($id){
        $post = Post::find($id);
        return view('admin/post/edit',['post'=>$post]);
    }
    public function edit( Request $request){
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->noidung;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->save();
        return redirect()->back();
    }
    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }
    //
}
