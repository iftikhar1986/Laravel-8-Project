<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Carbon\Carbon;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    public function AllCat(){

        //Eloquent ORM Read Data and add in last
        // $categories = Category::all();

         //Eloquent ORM Read Data and add at first
        // $categories = Category::latest()->get();

        //Using Pagniations Eloquent ORM
        $categories = Category::latest()->paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);


        //Query Builder Join Table
        // $categories = DB::table('categories')
        // ->join('users','categories.user_id','users.id')
        // ->select('categories.*','users.name')
        // ->latest()->paginate(5);



        //Query Builder Read Data and add at first
       // $categories = DB::table('categories')->latest()->get();

       //Using Pagniations
       // $categories = DB::table('categories')->latest()->paginate(5);

        return view('admin.category.index',compact('categories','trashCat'));
     }

    public function AddCat(Request $request){

            //Default Error Message
            $validated = $request->validate([
                'category_name' => 'required|unique:categories|max:255',
               // 'body' => 'required',
            ],

                //Customized Error Message
            [
                'category_name.required' => 'Please Enter Category Name!',
               // 'category_name.max' => 'Less than 255 char',
               // 'body' => 'required',
            ]);

            //Inserting data by using Eloquent ORM
            Category::insert([
                'category_name'  => $request->category_name,
                'user_id'  => Auth::user()->id,
                'created_at'  => Carbon::now()
            ]);


            // $category = new Category;
            // $category->category_name = $request->category_name;
            // $category->user_id = Auth::user()->id;
            // $category->save();


            //Inserting data by using Query Building

                // $data = array();
                // $data['category_name'] = $request->category_name;
                // $data['user_id'] = Auth::user()->id;
                // DB::table('categories')->insert($data);




            return Redirect()->back()->with('success','Category Inserted Successfully');



     }


     //Edit Method
     public function Edit($id){
         //Equlent ORM
         $categories = Category::find($id);

        /* //Query Builder Edit & Update Data
         $categories = Db::table('categories')->where('id',$id)->first();*/


         return view('admin.category.edit',compact('categories'));

     }


     //Update Method
     public function Update(Request $request, $id){

       //Equlent ORM
        $update = Category::find($id)->Update([

            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id

        ]);

       /* //Query Builder Edit & Update Data

        $data = array();
        $data['category_name'] =  $request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->where('id',$id)->update($data);*/




        return Redirect()->route('all.category')->with('success','Category Updated Successfully');

     }


     public function SoftDelete($id){
         $delete = Category::find($id)->delete();

         return Redirect()->back()->with('success','Category Deleted Successfully');
     }

     public function Restore($id){
         $delete = Category::withTrashed()->find($id)->restore();
         return Redirect()->back()->with('success','Category Restored Successfully');


     }

     public function Pdelete($id){
         $delete = Category::onlyTrashed()->find($id)->forceDelete();
         return Redirect()->back()->with('success','Category Parmenently Deleted');

     }
}
