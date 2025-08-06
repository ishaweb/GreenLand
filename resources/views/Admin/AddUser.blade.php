@extends('Admin.partials.Main')
@section('title', 'Plant')
@section('main')
    <button type="button" class="btn btn-dark">Edit User Role</button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">UserName</th>
                <th scope="col">Role</th>
                <th scope="col">Operation</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1; @endphp
            @foreach ($user as $users)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $users->name ?? 'N/A' }}</td>
                    <td>{{ $users->role ?? 'N/A' }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-dark btn-light updateRole" data-bs-toggle="modal"
                            data-bs-target="#updateRole" value="{{ $users->id }}">Update</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{--  role model  --}}
    <div class="modal fade" id="updateRole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('edit_role') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="user_id" id="user_id">
                            <label for="name" class="form-label">User Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <input type="Role" name="role" class="form-control" id="role">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
