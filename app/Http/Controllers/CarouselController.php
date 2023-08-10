<?php

namespace App\Http\Controllers;
use App\Rules\UpperCaseRule;

use App\Models\Carousel;
use App\Models\Feedback;
use Illuminate\Http\Request;

class CarouselController extends Controller
{

    // List Carousel 

    public function index()
    {
      
        $posts = Carousel::all();
        
        return view('carousel.carousel',['posts'=>$posts]);
    }

    public function dashboard()
    {
      
        $carousels = Carousel::all();
        
        return view('carousel.dashboard',['carousels'=>$carousels]);
    }


    // Create Carousel 

    public function create()
    {
       return view('carousel.create');
    }
    
    public function show($id)
    {
        $carousel = Carousel::find($id);
       return view('carousel.show',compact('carousel'));
    }


    // Save Carousel 

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|image|mimes:jpg,png,jpeg',
        ]);

        $file = $request->file('image');
        $image = "";
        if(!empty($file)){
            $image = md5(time()).'.'.$file->getClientOriginalExtension();
            $file->move('carousel/images',$image);
        }
        Carousel::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$image
        ]);
        return redirect('/');
    }

    // Show Carousel 
    // Edit Carousel 

    public function edit($id)
    {
        return view('carousel.update',['post'=>Carousel::find($id)]);
    }

    // Update Carousel 
    public function update(Request $request, $id)
    {   
        $post = Carousel::find($id);
        $file = $request->file('image');
        $image = "";
        $data = $request->validate([
            'title'=>'required',
            'description'=> 'required',
        ]);

        if(!empty($file)){
            if(file_exists('carousel/images/'.$post->image)){
                unlink('carousel/images/'.$post->image);
            }
            $image = md5(time()).'.'.$file->getClientOriginalExtension();
            $file->move('carousel/images',$image);
        }
        if(empty($file)){          
            $image = Carousel::find($id)->image;     
        }
        Carousel::findOrFail($id)->update([
            'title'=>$request->title,
            'description' =>$request->description,
            'image' =>$image,
        ]);
        session()->flash('update',' پست آپدیت  شد');

        return redirect('/');
    }



    public function destroy($id)
    {
        $post = Carousel::find($id);
        if(file_exists('carousel/images/'.$post->image)){
            unlink('carousel/images/'.$post->image);
        }
        Carousel::destroy($id);
        session()->flash('delete',' پست حذف شد');

        return redirect('/');
    }
}
