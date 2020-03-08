<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function category() {
        return view('admin/category/add-category');
    }
        //xu ly them category
    public function add(Request $request) {
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->created_at = now();
        $category->save();
        return redirect()->back();
    }
    //
}
