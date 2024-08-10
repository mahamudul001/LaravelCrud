<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view ('create');
    }

    public function ourfilestore(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' =>'nullable|mimes:png,jpg,jpeg',
        ]);

        //upload image
        $imageName = null;

        if(isset($request->image)){
            $imageName = time(). '.' .$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        
        //add new post
        $post = new post;

        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName;
        $post->save();

        
flash()->success('Your form has been created.');

        return redirect()->route('home');
    }

   public function editData($id){
    $post = post::findOrFail($id);
    return view('edit', ['ourPost' => $post]);
   }

   public function updateData($id ,Request $request){
   

    $validated = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' =>'nullable|mimes:png,jpg,jpeg',
    ]);

    //upload image

    

    //update post
    $post = post::findOrFail($id);
    $post->name = $request->name;
    $post->description = $request->description;

    if(isset($request->image)){
        $imageName = time(). '.' .$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $post->image = $imageName;
    }
    
    $post->save();

    
flash()->success('Your form has been updated!');

    return redirect()->route('home');

   }

   public function deleteData($id){
    $post = post::findOrFail($id);

    $post->delete();

    flash()->success('Your account has been deleted');

    return redirect()->route('home');
   }

}

