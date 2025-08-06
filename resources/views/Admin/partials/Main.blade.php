@include('Admin.partials.header')
<div class="main">
    <!-- dashboard navbar -->
    @include('Admin.partials.navbar')
    <!-- end -->
       @session('success')
                <div aria-live="polite" aria-atomic="true" class="position-relative">
                    <div class="toast-container top-0 end-0 p-3">
                        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true"
                            data-bs-delay="5000">
                            <div class="toast-header">
                                <img src="{{ asset('assets\image\image2.jpg') }}" class="rounded me-2" alt="..."
                                    width="20px" height="20px">
                                <strong class="me-auto">Great</strong>
                                <small class="text-body-secondary">just now</small>
                            </div>
                            <div class="toast-body">
                                <p class="text-success fw-bold me-2">{{ $value }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endsession
    <main class="content px-3 py-4">
        <div class="container-fluid">
            <div class="loader">
                <img src="{{ asset('Admin/image/circles.svg') }}">
            </div>
            @yield('main')
        </div>
    </main>
    @include('Admin.partials.footer')
