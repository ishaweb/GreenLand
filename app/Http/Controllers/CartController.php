<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\plant;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    function checkout()
    {
         return view("User.addTocart");
    }
    function add_to_cart($id,Request $req)
    {
        $plant = plant::findOrFail($id);
        $cart = session('cart',[]); 
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] =  $cart[$id]['quantity'] + 1;
        }
        else{
                $cart[$id] = [
                        "Name"=>$plant->Name,
                        "scientificName"=>$plant->scientificName,
                        "Category"=>$plant->Category,
                        "price"=>$plant->price,
                        "quantity"=>1,
                        "Description"=>$plant->Description,
                        "image"=>$plant->image
                    ];
        }
   
        // create session
        session()->put("cart",$cart);
        
        return redirect()->back()->with(["success"=> "Plant Added to Cart Successfully"]);
        
    }

    // Update Cart
    public function updateCart(Request $req){

                $cart = session('cart');

                if ($req->type == "update") 
                {
                    $cart[$req->id]['quantity'] = $req->quantity;
                } 
                elseif($req->type == "delete") 
                {
                    unset($cart[$req->id]);
                }
                session()->put("cart",$cart);

                $view =  view('User.cart')->render();
                
                return response()->json(["success"=>$view]);
    }
    // order
     public function order(Request $req){
        $payment = $req->payment_method;
        $amount = 0;

        // Get Cart
        $cart = session('cart');
        if (!$cart || !is_array($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

 // Store customer info
    $customer = Customer::create([
        "name" => $req->first_name,
        "Email" => $req->email,
        "contact" => $req->phone_number,
        "address" => $req->address,
        "postalCode" => $req->postal_code,
        "Payment" => $payment
    ]);

    // Create Order
        $order = Order::create([
            'user_id' => Auth::id(),
            'payement_method' => $payment,
             "customer_id"=>$customer->id
        ]);

    // Add products to order and calculate total
    foreach ($cart as $key => $value) {
        $subtotal = $value['quantity'] * $value['price'];
        $order->products()->create([
            "product_id" => $key,
            "quantity" => $value['quantity'],
            "price" => $value["price"],
            "category" => $value["Category"],
            "Amount" => $subtotal
        ]);

        $amount += $subtotal;

        // Reduce Plant stock
        $plant = Plant::find($key);
        if ($plant && $plant->quantity >= $value['quantity']) {
            $plant->quantity -= $value['quantity'];
            $plant->save();
        }
    }

    $order->Amount = $amount;
    $order->save();

    // Payment Processing
    if ($payment === "stripe") {
        $stripe = new \Stripe\StripeClient('sk_test_51RWZ6FH4X4VdcOmK3S4BY8bxEHSI7zlQxHTWYiPvgQOvh0EQXhjya1KBqQYlibkpCn63N5GUkg66GwdVFbThuM0A00pwqTnsjt');
        $successUrl = route('Order-success') . '?session_id={CHECKOUT_SESSION_ID}&order_id=' . $order->id;

        $session = $stripe->checkout->sessions->create([
            'success_url' => $successUrl,
            'customer_email' => Auth::user()->email,
            'line_items' => [[
                'price_data' => [
                    'product_data' => [
                        'name' => 'Shopping'
                    ],
                    'unit_amount' => 100 * $amount,
                    'currency' => 'PKR'
                ],
                'quantity' => 1
            ]],
            'mode' => 'payment'
        ]);

        session()->forget('cart');
        return redirect()->to($session->url);
    }
    elseif ($payment === "cod") 
    {
        session()->forget('cart');

        return redirect()->route('home')->with(['success'=> 'Order placed with Cash on Delivery!']);
    }
    else {
         return redirect()->route('home')->with('Error', 'Something Cause issue to place your order');
    }
}
    public function orderSuccess(Request $req){
          $stripe = new \Stripe\StripeClient('sk_test_51RWZ6FH4X4VdcOmK3S4BY8bxEHSI7zlQxHTWYiPvgQOvh0EQXhjya1KBqQYlibkpCn63N5GUkg66GwdVFbThuM0A00pwqTnsjt');
          $session = $stripe->checkout->sessions->retrieve($req->session_id);
          if ($session->status == "complete") {
             $order = Order::find($req->order_id);

             $order->status = 1;
             $order->strip_id = $session->id;
             $order->save();
             return redirect()->route('home')->with(['success' => 'Thanks to Order in Green Heaven Landscape']);
          }   
            $order = Order::findOrFail($req->order_id);

             $order->status = 2;
             $order->save();  
             dd("FAILED");
    }
}