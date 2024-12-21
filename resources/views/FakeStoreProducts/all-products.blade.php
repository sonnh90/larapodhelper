<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">All Fake Store Products List</h1>
        @if( !empty($products) && count($products) > 0 )
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Image</th>
                        {{--<th>Rating</th> --}}
                        <th>Rate</th>
                        <th>Count</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product['id'] }}</td>
                            <td>{{ $product['title'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td>{{ $product['description'] }}</td>
                            <td>{{ $product['category'] }}</td>
                            <td>
                                <img src="{{ $product['image'] }}" width="400" height="300" 
                                style="vertical-align:middle;object-fit:cover;">
                            </td>
                            {{-- <td>{{ $product['rating'] }}</td> --}}
                            <td>{{ $product['rating']['rate'] }}</td>
                            <td>{{ $product['rating']['count'] }}</td>                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No products available.</p>
        @endif
    </div>
</body>
</html>
