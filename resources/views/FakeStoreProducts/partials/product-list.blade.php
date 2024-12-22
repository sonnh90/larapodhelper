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
                        <button class="btn btn-primary mt-3">Buy Now</button>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No products available.</p>
    @endif
</div>
<div class="mt-4">
    {{ $paginator->links('pagination::bootstrap-4') }}
</div>