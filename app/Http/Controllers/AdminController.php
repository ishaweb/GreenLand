<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use App\Models\Plant;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    //
    function index() {

        $threshold = 10;

        $order = Order::whereDate("created_at",Carbon::today())->count();

        $income = Order::sum('Amount');

        $recieveOrder = OrderProduct::whereDate("created_at",Carbon::today())->count();

        $newCustomer = User::whereDate("created_at",Carbon::today());

        $plant = plant::where("quantity" , "<=" , $threshold)->get();  

        $outofStock = plant::where("stock_information", "=" , "0")->get();


        // showing the data in the chart js 
        $sale = OrderProduct::with('product')->select("product_id")
        ->selectRaw('SUM(quantity * price) as total_sales')
        ->groupBy('product_id')->get();
        return view("Admin.index",compact("order","income","recieveOrder","newCustomer","plant","sale","outofStock"));
    }
    // user query page
    public function Query() 
    {
          $query = Contact::all();
          return view("Admin.Query",compact("query"));
    }

    // Project
    public function projectHome()
    {
        $projects = project::all();
        return view("Admin.addProject",compact("projects"));
    }
    public function addProject(Request $req) 
    {
        $validate = $req->validate([
             "project_name"=>"required|string",
              "description"=>"required|string",
              "project_file"=>"required|image|mimes:jpeg,png,jpg",
               "image1"=>"required|image|mimes:jpeg,png,jpg",
               "image2"=>"required|image|mimes:jpeg,png,jpg"
                
        ]);
        if(!$validate)
        { 
            return redirect()->back()->withErrors($validate)->withInput(); 
        }
        else {
             $image = $req->file('project_file')->store("project","public");
             $mainLawnImage = $req->file('image1')->store("project","public");
             $basicViewImage =  $req->file('image2')->store("project","public");
            $project = Project::create([
                 "project_name"=>$req->project_name,
                  "project_info"=>$req->description,
                   "project_image"=>$image,
                    "image_1"=>$mainLawnImage,
                     "image_2"=>$basicViewImage
            ]);
            
            return redirect()->back()->with(["success"=>"Project added successfully"]);
            
        }
    }

    // project Details Shows
    public function projectDetail(Request $req,$id)
    {
        $projectInfo = Project::findOrFail($id);

        if(!$projectInfo){

              return redirect()->back()->with(['error'=>"Not FOUND"]);
            
        }
        else {
            return view('User.projectDetails',compact("projectInfo"));
            
        }
    }

    // REMOVE PROJECTS
    public function removeProject(Request $req){
        $projectId = $req->input("project_id");
        $project = Project::findOrFail($projectId); 
        $project->delete();
       return redirect()->back()->with(['success'=>"Project Information Deleted"]);
    }
}
