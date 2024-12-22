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
        <h1 class="text-center mb-4">Fake Store Product List</h1>
        <p>This page will display Fake Store products using AJAX display</p>
        <!-- 1. Placeholder for Products -->
        <div id="product-list" class="row g-4"> 
            <!-- Initial products list loaded here -->
        </div><!--#product-list -->


        <!-- 2. Spinner (Hidden Initially) -->
        <div id="loading-spinner" class="text-center mt-4" style="display: none;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <!-- 3. Load more button-->
        <div class="text-center mt-4">
            <button id="load-more" class="btn btn-primary">Load More</button>
        </div><!-- Load more button container --> 
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/fake-stores/product-display.js') }}"></script>
    <script src="{{ asset('assets/js/fake-stores/product-display-ajax.js') }}"></script>
</body>
<footer>
    
</footer>
</html>