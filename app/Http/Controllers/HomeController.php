<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Image;


class HomeController extends Controller
{
    public function homeSlider()
    {

        $sliders = Slider::latest()->get();

        return view('admin.slider.index', compact('sliders'));
    }


    public function addSlider()
    {

        return view('admin.slider.create');
    }


    public function storeSlider(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|file',
        ]);
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = $request->image->store('admin/sliders', 'public');
        $slider->save();
//
//        $slider_image = $request->file('image');
//
//        //generta uniqu ID
//        $name_gen = hexdec(uniqid());
//        $img_ext = strtolower($slider_image->getClientOriginalExtension());
//        $img_name = $name_gen.'.'.$img_ext;
//        $up_location = 'image/slider/';
//        $last_img =  $up_location.$img_name;
//        $slider_image->move($up_location,$last_img);
//
//
//
//
//
//
//        Slider::insert([
//            'title' => $request->title,
//            'description' => $request->description,
//
//            'image' => $last_img,
//            'created_at' => Carbon::now()
//        ]);

        return redirect(route('home.slider'))->with('success', 'Slider Inserted Successfully');


    }


    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));

    }

    public function update(Request $request, Slider $slider)
    {
//        $update = Slider::find($id)->update([
//            'title'=>$request->title,
//            'description'=>$request->description,
//            'image'=>$request->image,
//
//            'id' =>Auth::user()->id
//        ]);
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = $request->image->store('admin/sliders', 'public');
        $slider->save();

        return redirect(route('home.slider'))->with('success', 'Slider Updated Successfully');


    }

    public function delete(Slider $slider)
    {
        $slider->delete();
        return redirect(route('home.slider'))->with('success', 'Slider Deleted Successfully');
    }
}
