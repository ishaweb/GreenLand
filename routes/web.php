<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PlantController;
use  App\Http\Controllers\CustomerController;
use  App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\designController;

Route::get('/register', [AuthController::class,'showRegister'])->name("show.register");

Route::get('/login', [AuthController::class,'showLogin'])->name("show.login");

Route::post('/register', [AuthController::class,'register'])->name("register");

Route::post('/login', [AuthController::class,'login'])->name("login");

Route::post('/logout',[AuthController::class,'logout'])->name("logout");

// HOME CONTROLLER

Route::get('/',[HomeController::class,'index'])->name("home");

Route::get('/about',[HomeController::class,'About'])->name("About");

Route::get('/contact',[HomeController::class,'contact'])->name("Contact");

Route::get("/Home/project",[HomeController::class,'project'])->name("project");

// Admin CONTROLLER
Route::get('/admin/home',[AdminController::class,'index'])->name("admin-home")->middleware(["auth","admin"]);

Route::get("/Query",[AdminController::class,"Query"])->name("user_queries")->middleware(["auth","admin"]);

Route::get("/project",[AdminController::class,"projectHome"])->name("project_home")->middleware(["auth","admin"]);

Route::post("/addProject",[AdminController::class,'addProject'])->name("add_project")->middleware(["auth","admin"]);

Route::delete("/removeProject",[AdminController::class,'removeProject'])->name("remove_project")->middleware(["auth","admin"]);

Route::get("/project/detail/{id}",[AdminController::class,'projectDetail'])->name("project_details");

// PLANT CONTROLLER

Route::get('/plant',[PlantController::class,"plantIndex"])->name("plant-home")->middleware(["auth","admin"]);

Route::get("/category",[PlantController::class,'category'])->name("category_plant")->middleware(["auth","admin"]);

Route::post("/add/category",[PlantController::class,'createCategory'])->name("category")->middleware(["auth","admin"]);

Route::get("/edit/category/{id}",[PlantController::class,'categoryEdit'])->name("category_edit")->middleware(["auth","admin"]);

Route::put("/editCategory",[PlantController::class,'updateCategory'])->name("update_category")->middleware(["auth","admin"]);

Route::delete("/delete/category/{id}",[PlantController::class,'deleteCategory'])->name("category_delete")->middleware(["auth","admin"]);

Route::post("/add",[PlantController::class,'create'])->name("create_product")->middleware(["auth","admin"]);

Route::get("/Edit/{id}",[PlantController::class,'edit'])->name("edit_plant")->middleware(["auth","admin"]);

Route::put("/update",[PlantController::class,'update'])->name("update_product")->middleware(["auth","admin"]);

Route::delete("/delete/{id}",[PlantController::class,'delete'])->name("delete_product")->middleware(["auth","admin"]);


// Design Controller
Route::get("/design",[designController::class,'index'])->name("design-home");

Route::post("/design",[designController::class,'post'])->name("design-post");

Route::delete("/delete/design/{id}",[designController::class,'delete'])->name("design-delete");

Route::get("/design/overview/{id}",[designController::class,'getDesign'])->name("design-overview");

// CUSTOMER Controller

Route::get("/user",[CustomerController::class,'UserIndex'])->name('user_index')->middleware(["auth","admin"]);

Route::get("/User/{id}",[CustomerController::class,'updateUser'])->name("update_user")->middleware(["auth","admin"]);

Route::get('/customer',[CustomerController::class,"index"])->name("customer-home")->middleware(["auth","admin"]);

Route::get("/checkout/proceed",[CustomerController::class,'customer'])->name("customer")->middleware(["auth"]);

Route::put("/Role",[CustomerController::class,'Role'])->name("edit_role")->middleware(["auth","admin"]);

Route::get('/inventory',[CustomerController::class,"inventory"])->name("inventory")->middleware(["auth","admin"]);

Route::get('/Report',[CustomerController::class,"report"])->name("report")->middleware(["auth","admin"]);

Route::post("/Customer/order/update/{id}",[CustomerController::class,'updateStatus'])->name("customer_order_update")->middleware(["auth","admin"]);

Route::get("/transcript/{id}",[CustomerController::class,'transcript'])->name("generate_transcript")->middleware(["auth","admin"]);

Route::post("/contact",[CustomerController::class,'userQuery'])->name("user_query")->middleware(["auth"]);



// CART CONTROLLER
Route::get('/addtocart/{id}',[CartController::class,"add_to_cart"])->name("add_to_cart")->middleware(["auth"]);

Route::get("/order-Success",[CartController::class,"orderSuccess"])->name("Order-success")->middleware(["auth"]);

Route::get('/checkout',[CartController::class,"checkout"])->name("checkout")->middleware(["auth"]);

Route::post('/updateCart',[CartController::class,"updateCart"])->name("updateCart")->middleware(["auth"]);

Route::post("/order",[CartController::class,"order"])->name("Order")->middleware(["auth"]);




