<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Plant;
use App\Models\Customer;
use App\Models\User;
use App\Models\Contact;
use App\Mail\OrderStatusUpdated;


class CustomerController extends Controller
{
    //view
    public function index()
    {
        $orderProducts = OrderProduct::with('order.customer')->get();
        return view("Admin.CustomerOrder",compact("orderProducts"));
    }

    public function customer()
       {
        return view("user.checkout");
       }
    // inventory
     function inventory()
     {
        $threshold = 10;
        $plant = plant::where("quantity" , "<=" , $threshold)->get();  
        return view('Admin.inventory', compact("plant"));
        
     }
    // Report
    public function report()
    {
        return view("Admin.Report");
    }

    // customer Edit role
    public function UserIndex() {
          $user = User::all();
          return view("Admin.AddUser",compact("user"));
    }

    public function updateUser($id)
    {
        $userID = User::findOrFail($id);
        return response()->json([
             "user"=>$userID,
             "status"=>200
        ]);
        
    }

    public function Role(Request $req){
        $id = $req->input("user_id");

        $user = User::findOrFail($id);

        $user->role = $req->role;
        $user->save();
        return redirect()->back()->with(["message"=>"Role Updated Successfully"]);
        
        
    }

    // send email and update the status of user order 
    public function updateStatus(Request $req , $orderId)
    {
        $req->validate([
            'status'=>'required|in:placed,packed,delivered,cancelled'
        ]);
        $order  = Order::findOrFail($orderId);
        $order->order_status = $req->status;
        $order->save();

        // send Email

        Mail::to($order->customer->Email)->send(new OrderStatusUpdated($order));

        return redirect()->route('customer-home')->with(["success"=>"Email Send to User and Status Updated"]);        
    }

    // generating Transcript
    public function transcript($id){
        $order = Order::with(["customer"])->find($id);
        $orders = OrderProduct::with("product") ->where("order_id", $id)
                ->get();
        return view("Admin.transcript",compact("order","orders"));
    }

        // CUSTOMER QUERY CONTROLLER
         public function userQuery(Request $req) {
               $query = Contact::create([
                 "user_id"=>auth()->user()->id,
                  "name"=>$req->name,
                  "email"=>$req->email,
                   "Query"=>$req->message
               ]);
               
               return redirect()->back()->with(["success"=>"Dear User Your Query Successfully Submitted"]);
               
         }

}
