<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\plant;
use App\Models\Project;
use App\Models\Design;

class HomeController extends Controller
{
    public function index()
    {    
        $plant = plant::all();
        $project = Project::all(); 
        $design = Design::all();
        return view("User.index",["plant"=>$plant,"project"=>$project,"design"=>$design]);
    }
    // about page
    public function About(){
        return view("User.about");
    }
    // contact page
    public function Contact(){
        return view("User.contact");
    }
    // project
    public function project(Request $req){
        $project = Project::all();
        return view("User.project",compact("project"));
    }
}
