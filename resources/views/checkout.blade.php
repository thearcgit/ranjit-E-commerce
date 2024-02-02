
@if (!is_null($productsInCart) && count($productsInCart) > 0)
        <!-- Loop through $productsInCart and display product details -->
        <table class="table">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <!-- Add other columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($productsInCart as $product)
                    <tr>
                        <td>{{ $product['product_id'] }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['price'] }}</td>
                        <!-- Add other cells as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No products in the cart.</p>
    @endif