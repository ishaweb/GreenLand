<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Default-title')</title>
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <!-- Boxicons -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <!-- dataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('Admin/css/style.css') }}">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex justify-content-between p-4">
                <div class="sidebar-logo">
                    <a href="#">Green Heaven landscape</a>
                </div>
                <button class="toggle-btn border-0" type="button">
                    <i id="icons" class='bx  bx-chevrons-right'></i>
                </button>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-items">
                    <a href="{{ route('admin-home') }}" class="sidebar-links">
                        <i class='bx  bx-home-alt-2'></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="sidebar-items">
                    <a href="{{ route('project_home') }}" class="sidebar-links">
                        <i class='bx  bx-circle-dashed-half'></i>
                        <span>Project</span>
                    </a>
                </li>
                  <li class="sidebar-items">
                    <a href="{{route('design-home')}}" class="sidebar-links">
                       <i class='bx  bx-building-house'></i> 
                        <span>2d & 3d Design</span>
                    </a>
                </li>
                <li class="sidebar-items">
                    <a href="" class="sidebar-links collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#plant" aria-expanded="false" aria-controls="plant">
                        <i class='bx  bx-leaf-alt'></i>
                        <span>Plant</span>
                    </a>
                    <ul id="plant" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-items">
                            <a href="{{ route('category_plant') }}" class="sidebar-links">Add Category</a>
                        </li>
                        <li class="sidebar-items">
                            <a href="{{ route('plant-home') }}" class="sidebar-links">Add New Plant</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-items">
                    <a href="" class="sidebar-links collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#order" aria-expanded="false" aria-controls="order">
                        <i class='bx  bx-layers'></i>
                        <span>Order</span>
                    </a>
                    <ul id="order" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-items">
                            <a href="{{ route('customer-home') }}" class="sidebar-links">Customer Order</a>
                        </li>
                        <li class="sidebar-items">
                            <a href="{{ route('user_queries') }}" class="sidebar-links">Customer Queries</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-items">
                    <a href="" class="sidebar-links collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#report" aria-expanded="false" aria-controls="report">
                        <i class='bxr  bx-user'></i>
                        <span>User</span>
                    </a>
                    <ul id="report" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-items">
                            <a href="{{ route('user_index') }}" class="sidebar-links">Edit User</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-items">
                    <a href="" class="sidebar-links collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#Inventory" aria-expanded="false" aria-controls="Inventory">
                        <i class='bx  bx-warehouse'></i>
                        <span>Inventory</span>
                    </a>
                    <ul id="Inventory" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-items">
                            <a href="{{ route('inventory') }}" class="sidebar-links">Low Stock Product</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="sidebar-footer">
                <form action="{{ route('logout') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="sidebar-links"
                        style="background:transparent; color:white; border:none;">
                        <i class='bx  bx-horizontal-right'></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>
        <!-- end of sidebar -->
