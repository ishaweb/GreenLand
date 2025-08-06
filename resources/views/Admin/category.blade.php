@extends('Admin.partials.Main')
@section('title', 'Category')
@section('main')
    <h1 class="fw-bold mb-4" style="color:#293b5f;">Add New Catgeory</h1>
    <div class="row m-auto">
        <div class="col-12">
            <form action="{{ route('category') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col mb-4">
                    <label for="" class="form-label fw-bold">Category</label>
                    <input type="text" class="form-control" name="category" placeholder="Category">
                </div>
                <button type="submit" class="btn" style="background-color:#293b5f;color:white;">Add Catgeory</button>
        </div>
        </form>
    </div>
    <hr style="color:black;width:100%; font-weight:bold;">
    {{--  table  --}}
    <table class="table m-auto" id="category">
        <thead>
            <tr class="text-left">
                <th scope="col">No.</th>
                <th scope="col">Catgeory</th>
                <th scope="col">Operation</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach ($category as $c)
                <tr class="text-center">
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $c->name ?? 'Not Found' }}</td>
                    <td>
                        <button type="button" class="btn btn-danger deleteCategory" data-id="{{ $c->id }}"
                            data-bs-toggle="modal" data-bs-target="#deleteModel">
                            <i class='bx  bx-trash'></i>
                        </button>
                        <button type="button"class="btn btn-success updateCategory" data-bs-toggle="modal"
                            data-bs-target="#categoryMODEL" value="{{ $c->id }}">
                            <i class='bx  bx-edit'></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{--  edit Model  --}}

    @if (!$category->isEmpty())
        <div class="modal fade" id="categoryMODEL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Catgeory</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('update_category') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" class="form-control" name="category_id" id="category_id">
                            <div class="col-12 mb-4">
                                <label for="" class="form-label fw-bold">Plant Name</label>
                                <input type="text" class="form-control" id="plant_name" name="plant_name"
                                    placeholder="Name">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="" class="form-label fw-bold">Scientfic Name</label>
                                <input type="text" class="form-control" id="scientific_name" name="scientific_name"
                                    placeholder="Scientific Name">
                            </div>
                            <hr>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{--  delete  --}}
        <!-- Modal -->
        <form action="{{ route('category_delete', $c->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <div class="modal fade" id="deleteModel" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Confirmation Block</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="deleteName">
                            Are you sure you want to delete
                            <input type="hidden" name="id" id="delete_category_id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal"
                                style="color:#fff;">Close</button>
                            <button type="submit" class="btn btn-danger" style="color:#fff;">Yes
                                Delete</button></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection
