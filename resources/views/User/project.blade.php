  @extends('User.Main')
  @section('title', 'Project')
  @section('Main')
      <div class="container">
          <div class="row">
              @foreach ($project as $p)
                  <div class="col-md-4 col-12 p-2" id="project-col">
                      <div class="card" id="project-card">
                          <img src="{{ asset('storage/' . $p->project_image) }}" class="card-img-top" alt="...">
                      </div>
                     <div class="card-body" id="textContainer">
                                 <a href="{{route('project_details',$p->id)}}">
                                  <button type="button" class="btn btn-success m-2">Explore More</button>
                                 </a>
                          </div>
                  </div>
              @endforeach
          </div>
      </div>
      </div>
  @endsection
