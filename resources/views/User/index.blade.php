  @extends('User.Main')
  @section('title', 'Home')
  @section('Main')
      @guest
          <div aria-live="polite" aria-atomic="true" class="position-relative">
              <div class="toast-container top-0 end-0 p-3">
                  <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true"
                      data-bs-delay="5000">
                      <div class="toast-header">
                          <img src="{{ asset('assets\image\image2.jpg') }}" class="rounded me-2" alt="..." width="20px"
                              height="20px">
                          <strong class="me-auto">Alert Message</strong>
                          <small class="text-body-secondary">just now</small>
                      </div>
                      <div class="toast-body">
                          <p class="text-success fw-bold me-2">Add to cart option appear only when user Sign in</p>
                      </div>
                  </div>
              </div>
          </div>
      @endguest
      <!-- carousel -->
      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                  aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                  aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                  aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3"
                  aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4"
                  aria-label="Slide 5"></button>
          </div>
          <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="1000">
                  <img src="{{ asset('assets/image/GroundCover.jpeg') }}" class="d-block w-100" height="500px"
                      alt="...">
                  <div class="carousel-caption d-none d-md-block"style="color:white">
                      <h5>Ground cover</h5>
                      <p>Ground cover plants are low-growing, spreading plants that cover the ground and suppress weeds.</p>
                  </div>
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                  <img src="{{ asset('assets/image/housePlant.jpeg') }}" class="d-block w-100" height="500px"
                      alt="...">
                  <div class="carousel-caption d-none d-md-block" style="color:white">
                      <h5>House plant</h5>
                      <p>An ornamental plant cultivated for aesthetic or practical purposes within homes, offices, or other
                          indoor spaces.</p>
                  </div>
              </div>
              <div class="carousel-item" data-bs-interval="5000">
                  <img src="{{ asset('assets/image/Shrub.jpg') }}" class="d-block w-100"height="500px" alt="...">
                  <div class="carousel-caption d-none d-md-block"style="color:white">
                      <h5>Shrub</h5>
                      <p>A small to medium-sized perennial woody plant distinguished from trees by its multiple stems or
                          branches arising from or near the base and its shorter height</p>
                  </div>
              </div>
              <div class="carousel-item" data-bs-interval="5000">
                  <img src="{{ asset('assets/image/2d&3d.jpg') }}" class="d-block w-100"height="500px" alt="...">
                  <div class="carousel-caption d-none d-md-block"style="color:white">
                      <h5>2d & 3d</h5>
                  </div>
              </div>
              <div class="carousel-item" data-bs-interval="5000">
                  <img src="{{ asset('assets/image/Project1.jpeg') }}" class="d-block w-100"height="500px" alt="...">
                  <div class="carousel-caption d-none d-md-block"style="color:white">
                      <h5>7th Avenue interchange , Islamabad</h5>
                  </div>
              </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </button>
      </div>
      <!-- Product -->
      <div class="product">
          <div class="product-section">
              {{--  <div class="product-filter">
                  <img src="{{ asset('assets\image\all.jpg') }}" alt="">
                  <p class="filter-item active"  data-filter="all">All</p>
              </div>  --}}
               <div class="product-filter">
                  <img src="{{ asset('assets/image/indoor&outdoor.avif') }}" alt="">
                  <select class="filter-select filter-item"id="categorySelect">
                      <option value="Palm">Palm</option>
                      <option value="indoor-plant">indoor</option>
                      <option value="outdoor-plant">outdoor</option>
                  </select>
              </div>
              <div class="product-filter">
                  <img src="{{ asset('assets\image\Gfloor1.jpg') }}" alt="">
                  <p class="filter-item" data-filter="ground-floor">Ground Cover</p>
              </div>
              <div class="product-filter" data-filter="shrub">
                  <img src="{{ asset('assets\image\Shrub.jpg') }}" alt="">
                  <p class="filter-item">Shrub</p>
              </div>
              <div class="product-filter">
                  <img src="{{ asset('assets\image\tree3.jpg') }}" alt="">
                  <select class="filter-select filter-item"  id="categorySelect">
                      <option value="tree">Tree</option>
                      <option value="shade-tree">shade tree</option>
                      <option value="flower-tree">Flower Tree</option>
                      <option value="fruit-tree">Fruit Tree</option>
                  </select>
              </div>
              <div class="product-filter">
                  <img src="{{ asset('assets\image\homePlant2.jpg') }}" alt="">
                  <p class="filter-item" data-filter="house-plant">House Plant</p>
              </div>
              <div class="product-filter">
                  <img src="{{ asset('assets\image\irrigation.jpg') }}" alt="">
                  <p class="filter-item" data-filter="irrigation">Irrigation</p>
              </div>
              <div class="product-filter">
                  <img src="{{ asset('assets\image\grass.jpg') }}" alt="">
                  <p class="filter-item" data-filter="grass">Grass</p>
              </div>
              <div class="product-filter">
                  <img src="{{ asset('assets\image\2d&3d.jpg') }}" alt="">
                  <p class="filter-item" data-filter="2d-3d">2d&3D</p>
              </div>
              <div class="product-filter">
                  <img src="{{ asset('assets\image\pesticide&Fertilizer.jpg') }}" alt="">
                  <p class="filter-item" data-filter="pesticide-fertilizer">Pesticide & Fertilizers</p>
              </div>
              <div class="product-filter">
                  <img src="{{ asset('assets\image\pots.jpg') }}" alt="">
                  <select class="filter-select filter-item"  id="portSelect">
                      <option value="pots">Pots</option>
                      <option value="gujrati-pot">Gujrati</option>
                      <option value="Ceramic-pot">Ceramic</option>
                      <option value="Concerte-pot">Concerte</option>
                  </select>
              </div>
          </div>
      </div>
      {{--  product  --}}
      @php use Illuminate\Support\Str; @endphp
      <div class="product_container">
          <div class="card__container">
              @foreach ($plant as $p)
                  <article class="card__article {{ Str::slug($p->Category) }}" data-aos="fade-up">
                      <img  class="card__img" src="{{ asset('storage/' . $p->image) }}" alt="image">
                      <div class="card__data">
                          <h2 class="card__title">{{ $p->Name }}</h2>
                          <span class="card__description">RS {{ $p->price }}</span>
                          @auth
                          <a href="{{ route('add_to_cart', $p->id) }}" class="card__button">Add to Cart</a>
                          @endauth
                      </div>
                  </article>
              @endforeach
            @foreach ($design as $d)
                  <article class="card__article 2d-3d" data-aos="zoom-in-up">
                      <img class="card__img" src="{{ asset('storage/' . $d->image) }}" alt="image" >
                      <div class="card__data">
                          <h2 class="card__title">{{ $d->name }}</h2>
                          <a href="{{route('design-overview',$d->id)}}" class="card__button">Explore More</a>
                      </div>
                  </article>
              @endforeach
          </div>
      </div>
  @endsection
