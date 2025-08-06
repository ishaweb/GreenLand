   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta name="csrf-token" content="{{ csrf_token() }}">
       <link rel="icon" type="image/x-icon" href="{{ asset('assets/image/plantFavicons.ico') }}">
       <title>@yield('title', 'Default Title')</title>
       <!-- boxicons -->
       <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
       <!-- Boostrap -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
           integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
       {{--  boostrap icons  --}}
       <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
       <!-- swiper css -->
       <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
       {{--  AOS  --}}
       <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
       <!-- style link -->
       <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
   </head>

   <body>
       <nav class="navbar navbar-expand-lg bg-success navbar-dark d-none d-lg-flex">
           <div class="container-fluid">
               <a class="navbar-brand" href="#">Green Heaven landscape</a>
               <div class="collapse navbar-collapse">
                   <ul class="navbar-nav ms-auto">
                       <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                       <li class="nav-item"><a class="nav-link" href="{{ route('About') }}">About</a></li>
                       <li class="nav-item"><a class="nav-link" href="{{ route('project') }}">Projects</a></li>
                       <li class="nav-item"><a class="nav-link" href="{{ route('Contact') }}">Contact Us</a></li>
                       <li class="nav-item">
                           <a class="nav-link" href="{{ route('checkout') }}">
                               <i class='bx bx-shopping-bag' style='color:white'>
                                   <sup>{{ count(session('cart', [])) }}</sup>
                               </i>
                           </a>
                       </li>
                       @php use Illuminate\Support\Facades\Auth; @endphp
                       @if (Auth::user())
                           @if (Auth::user()->role == 'Admin')
                               <li class="nav-item dropdown">
                                   <a class="nav-link dropdown-toggle fw-bold text-white" href="#"
                                       id="adminDropdown" role="button" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                       Admin
                                   </a>
                                   <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
                                       <li>
                                           <a class="dropdown-item" href="{{ route('admin-home') }}">Dashboard</a>
                                       </li>
                                       <li>
                                           <form action="{{ route('logout') }}" method="POST"
                                               class="dropdown-item m-0 p-0">
                                               @csrf
                                               <button type="submit" class="btn btn-link dropdown-item">Logout</button>
                                           </form>
                                       </li>
                                   </ul>
                               </li>
                               @endif
                           @else
                               <li class="nav-item">
                                   <a class="btn btn-success" href="{{ route('show.login') }}">Sign in</a>
                               </li>
                           @endif
                   </ul>
               </div>
           </div>
       </nav>
       {{--  small screen  --}}
       <nav class="navbar bg-success navbar-dark d-lg-none">
           <div class="container-fluid">
               <a class="navbar-brand" href="#">Green Heaven landscape</a>
               <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas"
                   data-bs-target="#mobileMenu">
                   ☰
               </button>
           </div>
       </nav>
       {{--  <!-- Offcanvas Sidebar for small screens -->  --}}
       <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">
           <div class="offcanvas-header">
               <h5 class="offcanvas-title">Menu</h5>
               <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
           </div>
           <div class="offcanvas-body">
               <ul class="navbar-nav">
                   <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                   <li class="nav-item"><a class="nav-link" href="{{ route('About') }}">About</a></li>
                   <li class="nav-item"><a class="nav-link" href="{{ route('project') }}">Projects</a></li>
                   <li class="nav-item"><a class="nav-link" href="{{ route('Contact') }}">Contact Us</a></li>
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('checkout') }}">
                           <i class='bx bx-shopping-bag' style='color:black'>
                               <sup>{{ count(session('cart', [])) }}</sup>
                           </i>
                       </a>
                   </li>
                   @if (Auth::user())
                       @if (Auth::user()->role == 'Admin')
                           <li class="nav-item dropdown">
                               <a class="nav-link dropdown-toggle fw-bold text-black" href="#"
                                   id="adminDropdown" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                   Admin
                               </a>
                               <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
                                   <li>
                                       <a class="dropdown-item" href="{{ route('admin-home') }}">Dashboard</a>
                                   </li>
                                   <li>
                                       <form action="{{ route('logout') }}" method="POST"
                                           class="dropdown">
                                           @csrf
                                           <button type="submit" class="btn btn-link dropdown-item">Logout</button>
                                       </form>
                                   </li>
                               </ul>
                           </li>
                       @endif
                   @else
                       <li class="nav-item">
                           <a class="btn btn-success" href="{{ route('show.login') }}">Sign in</a>
                       </li>
                   @endif
               </ul>
           </div>
       </div>
       @session('success')
           <div aria-live="polite" aria-atomic="true" class="position-relative">
               <div class="toast-container top-0 end-0 p-3">
                   <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true"
                       data-bs-delay="5000">
                       <div class="toast-header">
                           <img src="{{ asset('assets\image\image2.jpg') }}" class="rounded me-2" alt="..."
                               width="20px" height="20px">
                           <strong class="me-auto">Hurry</strong>
                           <small class="text-body-secondary">just now</small>
                       </div>
                       <div class="toast-body">
                           <p class="text-success fw-bold me-2">{{ $value }}</p>
                       </div>
                   </div>
               </div>
           </div>
       @endsession
       @session('error')
           <div aria-live="polite" aria-atomic="true" class="position-relative">
               <div class="toast-container top-0 end-0 p-3">
                   <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true"
                       data-bs-delay="5000">
                       <div class="toast-header">
                           <img src="{{ asset('assets\image\image2.jpg') }}" class="rounded me-2" alt="..."
                               width="20px" height="20px">
                           <strong class="me-auto">Oops</strong>
                           <small class="text-body-secondary">just now</small>
                       </div>
                       <div class="toast-body">
                           <p class="text-danger fw-bold me-2">{{ $value }}</p>
                       </div>
                   </div>
               </div>
           </div>
       @endsession
