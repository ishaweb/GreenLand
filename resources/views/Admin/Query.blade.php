@extends('Admin.partials.Main')
@section('title', 'Customer Queries')
@section('main')
    <div class="row">
        <div class="col-12 ">
            <table class="table table-striped-columns" id="queryTable">
                <thead>
                    <tr class="highlight">
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($query as $q)
                        <tr>
                            <td>{{ $q->name }}</td>
                            <td>{{ $q->email }}</td>
                            <td>{{ $q->Query }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
