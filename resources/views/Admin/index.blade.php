@extends('Admin.partials.Main')
@section('title', 'Home')
@section('main')
    <div class="mb-3">
        <h3 class="fw-bold fs-4 mb-3">Admin Dashboard</h3>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card shadow">
                    <div class="card-body py-4">
                        <h6 class="mb-2 fw-bold">
                            Today Sale
                        </h6>
                        <p class="fw-bold mb-2">{{ $order }}</p>
                        <div class="mb-0">
                            <span class="bagde text-success me-2">50%</span>
                            <span class="fw-bold">Since Last Month</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card shadow">
                    <div class="card-body py-4">
                        <h6 class="mb-2 fw-bold">
                            Recieved Order
                        </h6>
                        <p class="fw-bold mb-2">{{ $recieveOrder }}</p>
                        <div class="mb-0">
                            <span class="bagde text-success me-2">20%</span>
                            <span class="fw-bold">Since Last Week</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card shadow">
                    <div class="card-body py-4">
                        <h6 class="mb-2 fw-bold">
                            Income
                        </h6>
                        <p class="fw-bold mb-2">{{ $income }}</p>
                        <div class="mb-0">
                            <span class="bagde text-success me-2">80%</span>
                            <span class="fw-bold">Since Last Year</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- table -->
        <div class="row">
            <div class="col-12 col-md-7">
                <h3 class="fw-bold fs-4 my-3">Low Stock Products</h3>
                <table class="table table-striped-columns" id="customerTable">
                    <thead>
                        <tr class="highlight">
                            <th scope="col">image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($plant as $p)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $p->image) }}" alt="{{ __('') }}" width="50"
                                        height="50">
                                </td>
                                <td>{{ $p->Name ?? 'N/A' }}</td>
                                <td>{{ $p->quantity ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- chart js -->
            <div class="col-12 col-md-5">
                <h3 class="fw-bold fs-4 my-3 ">Total Sale</h3>
                <canvas id="bar-chart-grouped" width="800" height="450"></canvas>
            </div>
        </div>
        {{--  out of stock  --}}
         <div class="row">
            <div class="col-12">
                <h3 class="fw-bold fs-4 my-3">Out of Stock Products</h3>
                <table class="table table-striped-columns" id="outofstock">
                    <thead>
                        <tr class="highlight">
                            <th scope="col">image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($outofStock as $out)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $out->image) }}" alt="{{ __('') }}" width="50"
                                        height="50">
                                </td>
                                <td>{{ $out->Name ?? 'N/A' }}</td>
                                 @if ($out->stock_Information == '0')
                                      <td><strong class="text-danger">Out of Stock</strong></td>
                                 @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('ChartJs')
  <script>
    const productLabels = @json($sale->map(fn($item) => optional($item->product)->Name ?? 'Unknown'));
    const productPrices = @json($sale->pluck('total_sales'));
    </script>
@endsection

