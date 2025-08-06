<div class="container py-5">
    <h1 class="mb-5 text-success">Your Shopping Cart</h1>
    <div class="row">
        <div class="col-lg-8">
            @if (session()->has('cart') && count(session('cart')) > 0)
                @php $total = 0; @endphp
                @foreach (session('cart') as $key => $item)
                    @php
                        $price = (int) ($item['price'] ?? 0);
                        $quantity = (int) ($item['quantity'] ?? 0);
                        $total = $total + $price * $quantity;
                    @endphp
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row cart-item mb-3" data-id="{{ $key }}">
                                <div class="col-md-3">
                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="Product Image"
                                        class="img-fluid rounded">
                                </div>
                                <div class="col-md-5">
                                    <h5 class="card-title">{{ $item['Name'] }}</h5>
                                    <p class="text-muted">Category: {{ $item['Category'] }}</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <button class="btn btn-outline-secondary btn-sm decrement"
                                            type="button">-</button>
                                        <input style="max-width:100px" name="quantity" type="text"
                                            class="form-control form-control-sm text-center quantity_input"
                                            value="{{ $item['quantity'] }}">
                                        <button class="btn btn-outline-secondary btn-sm increment"
                                            type="button">+</button>
                                    </div>
                                </div>
                                <div class="col-md-2 text-end">
                                    <p class="fw-bold">{{ $item['price'] * $item['quantity'] }}</p>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash remove-from-cart" data-id="{{ $key }}"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                    <!-- Continue Shopping Button -->
                    <div class="text-start mb-4">
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">
                            <i class="bi bi-arrow-left me-2"></i>Continue Shopping
                        </a>
                    </div>
        </div>
        <div class="col-lg-4">
            <!-- Cart Summary -->
            <div class="card cart-summary">
                <div class="card-body">
                    <h5 class="card-title mb-4">Order Summary</h5>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Subtotal</span>
                        <span>{{ $total }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Shipping</span>
                        <span>0.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Tax</span>
                        <span>0.00</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <strong>Total</strong>
                        <strong>{{ $total }}</strong>
                    </div>
                    <button class="btn btn-success w-100"><a href="{{ route('customer') }}"
                            style="color:white; text-decoration:none;">Proceed to Checkout</a></button>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
