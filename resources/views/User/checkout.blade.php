   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta name="csrf-token" content="{{ csrf_token() }}">
       <link rel="icon" type="image/x-icon" href="{{ asset('assets/image/plantFavicons.ico') }}">
       <title>Confirm Order</title>
       <!-- boxicons -->
       <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
       <!-- Boostrap -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
           integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
       {{--  boostrap icons  --}}
       <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
       <!-- swiper css -->
       <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
       <!-- style link -->
       <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
   </head>

   <body>
       <section class="vh-100 gradient-custom">
           <div class="container py-5 h-100">
               <div class="row justify-content-center align-items-center h-100">
                   <div class="col-12 col-lg-9 col-xl-7">
                       <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                           <div class="card-body p-4 p-md-5">
                               <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Shipping Address</h3>
                               <form action="{{ route('Order') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                   <div class="row">
                                       <div class="col-md-6 mb-4">

                                           <div class="form-outline">
                                               <label class="form-label" for="firstName">First Name</label>
                                               <input type="text" id="firstName" name="first_name"
                                                   class="form-control form-control-lg" />
                                           </div>

                                       </div>
                                       <div class="col-md-6 mb-4">

                                           <div class="form-outline">
                                               <label class="form-label" for="email">Email</label>
                                               <input type="email" id="email" name="email"
                                                   class="form-control form-control-lg" />

                                           </div>

                                       </div>
                                   </div>

                                   <div class="row">
                                       <div class="col-md-12 mb-4 d-flex align-items-center">

                                           <div class="form-outline w-100">
                                               <label for="contact_no" class="form-label">Contact No</label>
                                               <input type="text" class="form-control form-control-lg"
                                                   name="phone_number" id="contact_no" />
                                           </div>

                                       </div>
                                   </div>

                                   <div class="row">
                                       <div class="col-md-6 mb-4 pb-2">

                                           <div class="form-outline">
                                               <label class="form-label" for="City">City</label>
                                               <input type="text" id="city" name="city"
                                                   class="form-control form-control-lg" />

                                           </div>

                                       </div>
                                       <div class="col-md-6 mb-4 pb-2">
                                           <div class="form-outline">
                                               <label class="form-label" for="postal_code">Postal Code</label>
                                               <input type="tel" id="postal_code"" name="postal_code""
                                                   class="form-control form-control-lg" />
                                           </div>
                                       </div>
                                   </div>

                                   <div class="col-md-12 mb-4 pb-2">

                                       <div class="form-outline">
                                           <label class="form-label" for="phoneNumber">Address</label>
                                           <input type="text" name="address" class="form-control form-control-lg" />
                                       </div>

                                   </div>

                                   <div class="col-md-6 mb-4">

                                       <h6 class="mb-2 pb-1">Payement Method: </h6>

                                       <div class="form-check form-check-inline">
                                           <input class="form-check-input" type="radio" name="payment_method"
                                               id="stripe" value="stripe" checked />
                                           <label class="form-check-label" for="stripe">Stripe</label>
                                       </div>

                                       <div class="form-check form-check-inline">
                                           <input class="form-check-input" type="radio" name="payment_method"
                                               id="cod" value="cod" />
                                           <label class="form-check-label" for="cod">Cash on Delivery</label>
                                       </div>
                                   </div>
                                   <div class="mt-4 pt-2">
                                       <input  class="btn btn-success w-100" type="submit"
                                           value="Confirm Order" />
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
           crossorigin="anonymous"></script>
       <script src="{{ asset('assets/JS/swiper-bundle.min.js') }}"></script>
       <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
           integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
       </script>
       <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
