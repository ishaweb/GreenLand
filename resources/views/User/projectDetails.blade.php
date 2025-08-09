  @extends('User.Main')
  @section('title', 'Project-Details')
  @section('Main')
      <div class="container">
          <h1 class="text-center fw-bold text-black-50 m-3">{{ $projectInfo->project_name }}</h1>
          <p class="text-center text-body-secondary m-2">{{ $projectInfo->project_info }}</p>
          <div class="row">
              <div class="col-12" data-aos="fade-down-right">
                  <figure class="figure">
                      <img src="{{asset('storage/'.$projectInfo->project_image)}}" class="figure-img img-fluid rounded w-100" alt="...">
                      <figcaption class="figure-caption text-end">Image of the Project</figcaption>
                  </figure>
              </div>
          </div>
           <div class="row">
              <div class="col-6"  data-aos="flip-up"data-aos-duration="2000">
                  <figure class="figure">
                      <img src="{{asset('storage/'.$projectInfo->image_1 )}}" class="figure-img img-fluid rounded w-100" alt="...">
                      <figcaption class="figure-caption text-end">Main Lawn</figcaption>
                  </figure>
              </div>
              <div class="col-6" data-aos="flip-up">
                  <figure class="figure" data-aos="fade-down" data-aos-duration="3000">
                      <img src="{{asset('storage/'.$projectInfo->image_2 )}}" class="figure-img img-fluid rounded w-100" alt="...">
                      <figcaption class="figure-caption text-end">Basic View</figcaption>
                  </figure>
              </div>
           </div>
      </div>
  @endsection
