@extends('User.Main')
@section('title', 'add to cart')
@section('Main')
<div id="cart">
 @include('User.cart')
</div>
@endsection
@section('Cart-scripts')
    <script>
        $(document).ready(function() {
            $('#cart').on('click', '.increment', function() {
                const itemdiv = $(this).closest('.cart-item');
                const input = itemdiv.find('.quantity_input');
                let quantity = parseInt(input.val()) || 0;
                quantity++;
                input.val(quantity);
                updateCart(itemdiv.data('id'), quantity);
            });

            $('#cart').on('click', '.decrement', function() {
                const itemdiv = $(this).closest('.cart-item');
                const input = itemdiv.find('.quantity_input');
                let quantity = parseInt(input.val()) || 0;
                if (quantity > 1) {
                    quantity--;
                    input.val(quantity);
                    updateCart(itemdiv.data('id'), quantity);
                }
            });

            function updateCart(id, quantity) {
                $.ajax({
                    url: "{{ route('updateCart') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        type: "update",
                        id: id,
                        quantity: quantity
                    },
                    success: function(response) {
                        console.log(response.success);
                        $("#cart").html(response.success);
                    }
                });
            }
            $(document).on("click", ".remove-from-cart", function() {
                const tr = $(this).closest('.cart-item');
                const cartId = tr.data("id");
                $.ajax({
                    url: "{{ route('updateCart') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        type: "delete",
                        id: cartId,
                    },
                    success: function(response) {
                        $("#cart").html(response.success);
                    }
                });
            });
        });
    </script>
@endsection
