<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Image;
use File;

class CategoriesController extends Controller
{
    public function index(){
    	$categories = Category::orderBy('id', 'desc')->get();
    	return view('backend.pages.categories.index', compact('categories'));
    }
    public function create(){
    $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();

    	return view('backend.pages.categories.create', compact('main_categories'));
    }
    public function store(Request $request){
    	$this->validate($request,
		[
		'name' => 'required',
		'image' => 'nullable|image',
		],
    	[
    		'name.required' => 'Please provide a Category Name',
    		'image.image' => 'Please provide a Valid Image with .jpg, .png, .gif, .jpeg extention',
    	]
    );
    	$category = new Category();
    	$category->name = $request->name;
    	$category->description = $request->description;
    	$category->parent_id = $request->parent_id;
    	// Insert Images Also
    	if (count($request->image) > 0) 
    	{
    		$image = $request->file('image');
    	    $img = time(). '.' . $image->getClientOriginalExtension();
    	    $location = public_path('images/categories/' . $img);
    	    Image::make($image)->save($location);
    	    $category->image = $img;    	   
    	}
    	$category->save();
    	session()->flash('success','A new category has added Successfully!!');
    	return redirect()->route('admin.categories');

    }
    public function edit($id){
    $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
	$category = Category::find($id);
	if (!is_null($category)) {
		return view('backend.pages.categories.edit', compact('category', 'main_categories'));
	}else{
		return redirect()->route('admin.categories');
	}
    }
    public function update(Request $request, $id){
    	$this->validate($request,
		[
		'name' => 'required',
		'image' => 'nullable|image',
		],
    	[
    		'name.required' => 'Please provide a Category Name',
    		'image.image' => 'Please provide a Valid Image with .jpg, .png, .gif, .jpeg extention',
    	]
    );
    	$category = Category::find($id);
    	$category->name = $request->name;
    	$category->description = $request->description;
    	$category->parent_id = $request->parent_id;
    	// Insert Images Also
    	if (count($request->image) > 0) 
    	{
    		// Delete the old image from folder
    		if (File::exists('images/categories/'.$category->image)) {
    			File::delete('images/categories/'.$category->image);
    		}

    		$image = $request->file('image');
    	    $img = time(). '.' . $image->getClientOriginalExtension();
    	    $location = public_path('images/categories/' . $img);
    	    Image::make($image)->save($location);
    	    $category->image = $img;    	   
    	}
    	$category->save();
    	session()->flash('success','Category has Updated Successfully!!');
    	return redirect()->route('admin.categories');

    }
    public function delete($id)
    {
      $category = Category::find($id);
      if (!is_null($category)) {
      	// If it is parent category, then delete all its sub category
      	if ($category->parent_id == NULL) {
     	// Delete sub category
    	$sub_categories = Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();
    	foreach ($sub_categories as $sub) {
    		  	// Delete Sub Category Image
    		  	if (File::exists('images/categories/'.$sub->image)) {
    					File::delete('images/categories/'.$sub->image);
    				}
    		$sub->delete();
    	}


      	}
      	// Delete Category Image
      	if (File::exists('images/categories/'.$category->image)) {
    			File::delete('images/categories/'.$category->image);
    		}


        $category->delete();
      }
      session()->flash('success', 'Category has been deleted Successfully');
      return back();
    }
}
