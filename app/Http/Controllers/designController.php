<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Design;



class designController extends Controller
{
    //
    public function index(){
        return view("Admin.design");
    }
    public function post(Request $req) {
        $image1 = $req->file("file1")->store("Design","public");
        $image2 = $req->file("file2")->store("Design","public");
        Design::updateOrCreate([
             "design"=>$req->design,
             "name"=>$req->name,
             "image"=>$image1,
              "image2"=>$image2,
               "Description"=>$req->description
        ]);    
        return redirect()->back()->with(["success"=>"Design Created Successfully"]);
    
    }
    public function getDesign(Request $req,$id){
         $design = Design::findOrFail($id);
         if($design){
            return view("User.Design_Overview",compact("design"));
         }
         else {
             
            return view("User.index");
         }
    }
}