   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta name="csrf-token" content="{{ csrf_token() }}">
       <link rel="icon" type="image/x-icon" href="{{ asset('assets/image/plantFavicons.ico') }}">
       <title>test page</title>
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
           <h1 class="text-center text-2xl">When You send my Money</h1>
           <iframe src="https://lottie.host/embed/9689ec20-a405-40e2-9535-1276c0f0b626/HtsuyPpuTk.lottie" width="100%"
               height="100%">
           </iframe>
           <div class="text-center inline-block">
               <a href="{{ route('home') }}"><button type="button" class="btn btn-danger fw-bold">Okay,BJHTA 😢😟</button></a>
               <a href="{{ route('/') }}"><button type="button" class="btn btn-secondary fw-bold">Nahi Bjhnay 😒</button></a>
           </div>

       </section>
       <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
           crossorigin="anonymous"></script>
       <script src="{{ asset('assets/JS/swiper-bundle.min.js') }}"></script>
       <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
           integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
       </script>
       <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
       <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
