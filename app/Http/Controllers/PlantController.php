<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\plant;
use App\Models\Category;
use App\Models\Project;

class PlantController extends Controller
{
    // plant form
    public function plantIndex(){
        $plant = plant::all();
        $category = Category::all();
        return view("Admin.plant",["plant"=>$plant,"category"=>$category]);
    }
    // category
    public function category()
    {
        $category = Category::all();
        return view("Admin.category",compact("category"));
    }
    // creating plant Catgeory
    public function createCategory(Request $req)
    {
        Category::updateOrCreate([
              "name"=>$req->category,
        ]);

        return redirect()->route('category_plant')->with(["success" => "Category Created successfully.."]);
    }

    public function categoryEdit($id){
         $category = Category::findOrFail($id);
         if($category) 
         {
            return response()->json([
                  "status"=>200,
                  "category"=>$category
            ]);
            
         }
    }

    public function updateCategory(Request $req){
        $categoryId = $req->input("category_id");
        $category = Category::findOrFail($categoryId);
               $category->name = $req->category;
               $category->save();
            return redirect()->back()->with(["success"=>"Category updated successfully"]);
    }

    public function deleteCategory($id){
         $category = category::findOrFail($id);
         $category->delete();
        return redirect()->back()->with(["success"=>"Category Deleted successfully"]);
    }
    //creating file to to create product
    public function create (Request $req) {
         $validation = $req->validate([
              "name" => 'required|string',
              "S_name"=>"required|string",
              "quantity"=> "required|numeric",
              "price"=> "required|numeric",
              'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
               "category"=>"required|string",
                "Stock"=>"required|boolean"
         ]);

         $image = $req->file('file')->store("plants","public");

         if ($validation) 
         {
            $plant = plant::updateOrCreate([
                "Name"=>$req->name,
                "scientificName"=>$req->S_name,
            ], //this will check and based on this update
            [
                "Category"=>$req->category,
                "price"=>$req->price,
                "quantity"=>$req->quantity,
                "Description"=>$req->description,
                "image"=>$image,
                "stock_Information"=>$req->Stock

            ]);
            return back()->with("success","plant added successfully...");
         }
    }
    // delete function perform here
    public function delete(Request $req , $id){
        $plantId = plant::findOrFail($id);
        $plantId->delete();
        return back()->with("success","Plant Deleted Successfully...");
    }

    public function edit($id){
        $plant = plant::find($id);
        return response()->json([
            "status"=>200,
            "plant"=>$plant
        ]);
     }
    // update product
    public function update(Request $req)
  {
    $id = $req->input("product_id");
    
    $plant = plant::findOrFail($id); 

    if ($req->filled('name')) {
        $plant->Name = $req->name;
    }

    if ($req->filled('S_name')) {
        $plant->scientificName = $req->S_name;
    }

    if ($req->filled('category')) {
        $plant->Category = $req->category;
    }

    if ($req->filled('price')) {
        $plant->price = $req->price;
    }

    if ($req->filled('quantity')) {
        $plant->quantity = $req->quantity;
    }

    if ($req->filled('description')) {
        $plant->Description = $req->description;
    }

    if($req->has("Stock")){
         $plant->stock_Information = $req->Stock;
    }

    if ($req->hasFile('file')) {
        $image = $req->file('file')->store('plants', 'public');
        $plant->image = $image;
    }

    $plant->save();

    return redirect()->route('plant-home')->with(["success"=> "Plant Updated Successfully"]);
    
}

}
