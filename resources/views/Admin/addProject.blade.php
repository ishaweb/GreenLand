@extends('Admin.partials.Main')
@section('title', 'Plant')
@section('main')

    <h2 class="text-secondary fw-bold m-2 p-2">Add New Projects</h2>
    <form action="{{ route('add_project') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Project Name</label>
            <input type="text" class="form-control" name="project_name">
            @error('project_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text" class="form-control" name="description">
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Choose file</label>
            <input type="file" class="form-control" name="project_file">
            @error('project_file')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Main Lawn </label>
            <input type="file" class="form-control" name="image1">
            @error('image1')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Basic View</label>
            <input type="file" class="form-control" name="image2">
            @error('image2')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark btn-md">Add New Project</button>
    </form>

    <hr>
    {{--  table  --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">project Name</th>
                <th scope="col">Description</th>
                <th scope="col">Main Image</th>
                <th scope="col">Lawn View</th>
                <th scope="col">Basic View</th>
                <th scope="col">Remove</th>
            </tr>
        </thead>
        @php $i = 1; @endphp
        <tbody class="table-group-divider">
            @foreach ($projects as $pro)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{ $pro->project_name ?? '' }}</td>
                    <td class="w-50">{{ $pro->project_info ?? '' }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $pro->project_image) }}" class="rounded w-100" alt="...">
                    </td>
                    <td>
                        <img src="{{ asset('storage/' . $pro->image_1) }}" class="rounded w-100" alt="...">
                    </td>
                    <td>
                        <img src="{{ asset('storage/' . $pro->image_2) }}" class="rounded w-100" alt="...">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger deleteProject" data-id="{{ $pro->id }}"><i
                                class='bx  bx-trash'></i> </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{--  DeleteModel SHOW  --}}
     <form action="{{ route('remove_project') }}" method="post" enctype="multipart/form-data">
         @csrf
          @method('DELETE')
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal fade" id="projectDeleteModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                  aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <input type="hidden" class="form-control" name="project_id" id="project_id">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Are You Sure to Remove this ? </h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                            
                              <div class="modal-body">
                                  <h2 class="fs-5">Project information deleted and never Recover again</h2>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-danger">Remove</button>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
     </form>
@endsection
