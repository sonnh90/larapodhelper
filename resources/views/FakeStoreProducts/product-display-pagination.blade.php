<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fake-stores/product-display.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Fake stores Product List</h1>
        <p>This page will display product at 6 items per page</p>
        <!-- Product display -->
        <div class="row g-4">
            @if(!empty($products) && count($products) > 0)
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ $product['image'] ?? 'https://via.placeholder.com/150' }}" class="card-img-top" alt="{{ $product['title'] }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product['title'] }}</h5>
                                <h6 class="card-text">Category: {{ $product['category'] }}</h6>
                                <p class="card-text text-muted">{{ $product['description'] }}</p>
                                <h6 class="text-primary">${{ number_format($product['price'], 2) }}</h6>
                                <button class="buy-item btn btn-primary mt-3">Buy Now</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No products available.</p>
            @endif
        </div>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $paginator->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/fake-stores/product-display.js') }}"></script>
</body>
</html>