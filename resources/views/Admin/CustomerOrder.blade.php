@extends('Admin.partials.Main')
@section('title', 'Plant')
@section('main')
    <div class="row">
        <div class="col-12">
            <h3 class="fw-bold fs-4 my-3">Customer Order</h3>
            <table class="table table-striped-columns" id="customerTable">
                <thead>
                    <tr class="highlight">
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Products</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Payement</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1 @endphp
                    @foreach ($orderProducts as $OP)
                        @php
                            $rowClass = '';
                            if ($OP->order->order_status == 'cancelled') {
                                $rowClass = 'table-danger'; // Bootstrap red
                            } elseif ($OP->order->order_status == 'packed') {
                                $rowClass = 'table-warning'; // Bootstrap yellow
                            } elseif ($OP->order->order_status == 'delivered') {
                                $rowClass = 'table-success'; // Bootstrap green
                            }
                        @endphp

                        <tr class="{{ $rowClass }}">
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $OP->order->customer->name ?? 'N/A' }}</td>
                            <td>{{ $OP->order->customer->Email ?? 'N/A' }}</td>
                            <td>{{ $OP->order->customer->contact ?? 'N/A' }}</td>
                            <td>{{$OP->product->Name}}</td>
                            <td>{{ $OP->quantity ?? 'N/A' }}</td>
                            <td>{{ $OP->Amount ?? 'N/A' }}</td>
                            @if ($OP->status == '1' ?? false)
                                <td>Stripe Payment</td>
                            @else
                                <td>Cash On Delivery</td>
                            @endif
                            <td>
                                <form action="{{ route('customer_order_update', $OP->id) }}" method="POST"
                                    enctype="multipart/form-data" class="d-inline">
                                    @csrf
                                    <select class="form-select mb-2" name="status">
                                        <option selected>{{ $OP->order->order_status }}</option>
                                        <option value="packed" {{ $OP->order->order_status == 'packed' ? 'selected' : '' }}>
                                            Packed</option>
                                        <option value="delivered"
                                            {{ $OP->order->order_status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                        <option value="cancelled"
                                            {{ $OP->order->order_status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-success mt-2">Update</button>
                                    {{--  transcript btn  --}}
                                </form>
                                <form action="{{ route('generate_transcript', $OP->id) }}" method="GET"
                                    enctype="multipart/form-data" class="d-inline ms-2">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-secondary mt-2">
                                        Transcript</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
