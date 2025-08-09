  @extends('User.Main')
  @section('title', 'Project-Details')
  @section('Main')
      <div class="container">
          <h1 class="text-center fw-bold text-black-50 m-3">{{ $design->name }}</h1>
          <p class="text-center text-body-secondary m-2">{{ $design->Description }}</p>
           <div class="row">
              <div class="col-6" data-aos="zoom-in-up" data-aos-duration="2000">
                  <figure class="figure">
                      <img src="{{asset('storage/'.$design->image )}}" class="figure-img img-fluid rounded w-100" alt="...">
                      <figcaption class="figure-caption text-end">Exterior View</figcaption>
                  </figure>
              </div>
              <div class="col-6" data-aos="zoom-out-up" data-aos-duration="3000">
                  <figure class="figure">
                      <img src="{{asset('storage/'.$design->image2 )}}" class="figure-img img-fluid rounded w-100" alt="...">
                      <figcaption class="figure-caption text-end">Interior View</figcaption>
                  </figure>
              </div>
           </div>
      </div>
  @endsection
