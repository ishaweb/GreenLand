    @include('User.partials.header')
    <div class="main-content">
      @yield('Main')
    <div>
    <div class="loader">
      <img src="{{asset('assets/image/circles.svg')}}">
     </div>
    @include('User.partials.footer')
