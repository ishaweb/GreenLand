@extends('Admin.partials.Main')
@section('title', 'Plant')
@section('main')
    <div class="mb-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                 <form action="{{ route('design-post') }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <input type="hidden" class="form-control" name="design"
                            value="2d&3d">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Design Name</label>
                        <input type="text" class="form-control" name="name"
                            placeholder="House Design">
                    </div>
                     <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Design image</label>
                        <input type="file" class="form-control" name="file1">
                    </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Design image 2</label>
                        <input type="file" class="form-control" name="file2">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description of Design</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-secondary w-100">Added New Design</button>
                    </form>
                </div>
                <div class="col-6">
                    <img src="{{ asset('assets/image/2d&3d.jpg') }}">
                </div>
            </div>
        </div>
    </div>
@endsection
