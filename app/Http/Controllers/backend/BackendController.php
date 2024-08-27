<?php

namespace App\Http\Controllers\backend;

use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    function addCategory(){
        return view('dashboard.add_category');
    }
    function storeCategory(Request $request){
       $validation = $request->validate([
        'category' => 'required'
       ]);
      $category = new Categorie();
      $category->category = $request->category;
      $count = Categorie::where('slug','Like','%'.Str::slug($request->category).'%')->count();

      if($count > 0){
        $count++;
        $category->slug = Str::slug($request->category)."-".$count;

      }else{
        $category->slug = Str::slug($request->category);
      }
      $category->save();
      return back()->with('success','Category Add Success');
    }
}
