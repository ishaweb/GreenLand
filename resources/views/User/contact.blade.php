@extends("User.Main")
@section('title', 'contact')
@section('Main')
    <!-- contact -->
    <div class="contact-form" id="contact">
        <h1>Contact Us</h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Contact Us</h2>
                    <form action="{{route('user_query')}}" method="post"  enctype="multipart/form-data">
                       @csrf
                        <input type="text" name="name" placeholder="Enter Your Name">
                        <input type="email" name="email" placeholder="Enter Your Email">
                        <textarea name="message" id="" placeholder="Message"></textarea>
                        <button type="submit" class="contactBtn">Send <i class='bx bx-send'></i></button>
                    </form>
                </div>
                <div class="form-image">
                    <img src="{{asset('assets\image/image2.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
