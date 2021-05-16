<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function homeAbout(){

        $homeAbout = HomeAbout::latest()->get();
        return view('admin.home_about.index',compact('homeAbout'));
    }

    public function addAbout(){

        return view('admin.home_about.create');
    }

    public function storeAbout( Request $request){

        $homeAbout = new HomeAbout();
        $homeAbout->title = $request->title;
        $homeAbout->short_desc = $request->short_desc;
        $homeAbout->long_desc = $request->long_desc;
        $homeAbout->save();

        return redirect(route('home.about'))->with('success', 'Data Inserted Successfully');

    }

    public function edit(HomeAbout $homeAbout){
        return view('admin.home_about.edit',compact('homeAbout'));
    }

    public function update( Request $request,HomeAbout $homeAbout){
        $homeAbout->title = $request->title;
        $homeAbout->short_desc = $request->short_desc;
        $homeAbout->long_desc = $request->long_desc;
        $homeAbout->save();

        return redirect(route('home.about'))->with('success', 'Data Inserted Successfully');

    }

    public function delete(HomeAbout $homeAbout){

            $homeAbout->delete();
            return redirect(route('home.about'))->with('success', 'About Deleted Successfully');
        }



}
