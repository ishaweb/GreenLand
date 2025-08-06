   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta name="csrf-token" content="{{ csrf_token() }}">
       <link rel="icon" type="image/x-icon" href="{{ asset('assets/image/plantFavicons.ico') }}">
       <title>@yield('title', 'Transcript')</title>
       <!-- boxicons -->
       <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
       <!-- Boostrap -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
           integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
   </head>

   <body>
       <div class="container">
           <div class="row">
               <div class="col-6">
                   <h2>Order Transcript</h2>
                   <hr>
                   <h4>User Info:</h4>
                   <p>Name: {{ $order->customer->name ?? "N/A" }}</p>
                   <p>Email: {{ $order->customer->Email ?? "N/A"  }}</p>
                   <p>Payment Method: {{ $order->payement_method  ?? "N/A" }}</p>
               </div>
               <div class="col-6">
                   <h2>Company</h2>
                   <hr>
                   <h4>company Info:</h4>
                   <p>Name:Green Heaven landscape</p>
                   <p>Email:hamzagill353@gmail.com</p>
                   <p>Address:Islamabad</p>
               </div>
           </div>
           <h4>Product Details:</h4>
           <table class="table table-bordered">
               <thead>
                   <tr>
                       <th>#</th>
                       <th>Product</th>
                       <th>Quantity</th>
                       <th>Price</th>
                       <th>Subtotal</th>
                   </tr>
               </thead>
               <tbody>
                   @php $total = 0 @endphp
                   @foreach ($orders as $i => $item)
                       <tr>
                           <td>{{ $i + 1 }}</td>
                           <td>{{ $item->product->Name ?? 'N/A' }}</td>
                           <td>{{ $item->quantity }}</td>
                           <td>{{ $item->price }}</td>
                           <td>{{ $item->price * $item->quantity }}</td>
                       </tr>
                   @endforeach
               </tbody>
           </table>

           <h4>Total: PKR {{ $order->Amount ?? "N/A" }}</h4>
       </div>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
           integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
       </script>
   </body>

   </html>
