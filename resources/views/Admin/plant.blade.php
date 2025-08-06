@extends('Admin.partials.Main')
@section('title', 'Plant')
@section('main')
    <div class="mb-3">
        <div class="row">
            <div class="col-12 col-md-2">
                <div class="mb-2">
                    <button type="button" class="btn" style="background-color:#293b5f;color:white;" data-bs-toggle="modal"
                        data-bs-target="#addProductModal">
                        Create New Plant
                    </button>
                </div>
            </div>
        </div>
        <!-- create Modal -->
        <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Plant</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {{--  show and Update  --}}
                    @php
                        $categoryOptions = [];
                        $plantOptions = [];
                        $scientificOptions = [];
                        foreach ($category as $c) {
                            $categoryOptions[] = "<option value='{$c->name}'>{$c->name}</option>";
                            $plantOptions[] = "<option value='{$c->Plant_name}'>{$c->Plant_name}</option>";
                            $scientificOptions[] = "<option value='{$c->Scientific_name}'>{$c->Scientific_name}</option>";
                        }
                    @endphp

                    <div class="modal-body">
                        <form action="{{ route('create_product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="" class="form-label fw-bold">Catgeory</label>
                                    <select class="form-select" name="category" aria-label="Floating label select example">
                                        <option value="" {{ old('Category') ? '' : 'selected' }} selected>Select
                                            Catgeory</option>
                                        {!! implode('', $categoryOptions) !!}
                                    </select>
                                    @error('category')
                                        <span class="text-danger fw-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col mb-3">
                                    <label for="exampleInputEmail1" class="form-label  fw-bold">Plant Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                    @error('name')
                                        <span class="text-danger fw-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col mb-3">
                                    <label for="exampleInputEmail1" class="form-label  fw-bold">Scientific Name</label>
                                    <input type="text" name="S_name" class="form-control" required>
                                    @error('S_name')
                                        <span class="text-danger fw-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="file" name="file" class="form-control">
                                    @error('file')
                                        <span class="text-danger fw-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col mb-3">
                                    <label for="" class="form-label  fw-bold">Price</label>
                                    <input type="text" name="price" class="form-control" value="{{ old('price') }}"
                                        placeholder="price">
                                    @error('price')
                                        <span class="text-danger fw-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col mb-3">
                                    <label for="" class="form-label  fw-bold">Quantity</label>
                                    <input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control"
                                        placeholder="Quantity">
                                    @error('quantity')
                                        <span class="text-danger fw-bold">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label  fw-bold">Description</label>
                                    <textarea class="form-control" name="description" placeholder="Description..."></textarea>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Stock" value="1">
                                        <label class="form-check-label" for="inlineRadio1">In Stock</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Stock" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Out of Stock</label>
                                    </div>
                                    @error('Stock')
                                        <span class="text-danger fw-bold">Stock</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info" style="color:#fff;">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- table -->
        <table class="table m-auto" id="plantTable">
            <thead>
                <tr class="highlight text-center">
                    <th scope="col">Image</th>
                    <th scope="col">Catgeory</th>
                    <th scope="col">plant</th>
                    <th scope="col">Scientfic</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($plant as $p)
                    <tr>
                        <td>
                            <img class="rounded-3" src="{{ asset('storage/' . $p->image) }}" width="70">
                        </td>
                        <td>{{ $p->Category }}</td>
                        <td>{{ $p->Name }}</td>
                        <td>{{$p->scientificName}}</td>
                        <td>{{ $p->quantity }}</td>
                        <td>{{ $p->price }}</td>
                        <td width="500">{{ $p->Description }}</td>
                        <td>{{ $p->stock_Information == '1' ? 'in stock' : 'out stock' }}</td>
                        <td>
                            <button type="button" data-id="{{ $p->id }}" data-name="{{ $p->Name }}"
                                class="btn btn-danger fw-bold delete">
                                <i class='bx  bx-trash-alt'></i></button>
                            <button type="button" value="{{ $p->id }}" class="btn btn-info fw-bold update"><i
                                    class='bx  bx-edit' style="color:#fff;"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (!$plant->isEmpty())
            <!-- update model -->
            <div class="modal fade" id="updateModel" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Plant</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('update_product') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <input type="hidden" name ="product_id" id="product_id" class="form-control">
                                    <label for="" class="form-label  fw-bold">Category</label>
                                    <div class=" form-floating col-12 mb-3">
                                        <select class="form-select" name="category" id="category">
                                            <option value=""selected>Select Catgeory</option>
                                            @foreach ($category as $c)
                                                <option
                                                    value="{{ $c->name }}"{{ $p->Category == "$c->name" ? 'selected' : '' }}>
                                                    {{ $c->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="" class="form-label  fw-bold">plant Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $p->Name }}">
                                        @error('name')
                                            <span class="text-danger fw-bold">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col mb-3">
                                        <label for="" class="form-label  fw-bold">Scientific Name</label>
                                        <input type="text" name="S_name" class="form-control"
                                            value="{{ $p->scientificName }}">
                                        @error('S_name')
                                            <span class="text-danger fw-bold">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="file" name="file" class="form-control" id="image">
                                        <span>
                                            <img id="plantImagePreview" src="" width="100" height="100"
                                                style ="margin:12px 5px;" class="img-thumbnail mb-2">
                                        </span>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="" class="form-label fw-bold">price</label>
                                        <input type="text" name="price" class="form-control" placeholder="price"
                                            value="{{ $p->price }}" id="product_price">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="" class="form-label fw-bold">Quantity</label>
                                        <input type="text" name="quantity" id="product_quantity" class="form-control"
                                            placeholder="Quantity" value="{{ $p->quantity }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Description</label>
                                        <textarea class="form-control" id="product_description" name="description" placeholder="Description..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="stock" type="radio" name="Stock"
                                                value="1">
                                            <label class="form-check-label" for="inlineRadio1">In Stock</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="stock" type="radio" name="Stock"
                                                value="0">
                                            <label class="form-check-label" for="inlineRadio2">Out of Stock</label>
                                        </div>
                                    </div>
                                    @error('Stock')
                                        <span class="text-danger fw-bold">Stock</span>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info " style="color:#fff;">update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- delete Model -->
            <form action="{{ route('delete_product', $p->id) }}" method="post" enctype="multipart/form-data">
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
                                Are you sure you want to delete <strong id="deletePlantName"></strong>?
                                <input type="hidden" name="id" id="deleteId">
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
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if ($errors->any())
                    var myModal = new bootstrap.Modal(document.getElementById('addProductModal'));
                    myModal.show();
                @endif
            });
        </script>
    @endsection
