<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>

<body>
    <h1>Products</h1>
    <hr>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price in INR</th>
            <th>Price in USD</th>
        </tr>
        @forelse($products as $product)
        <tr>
            <td>{{ $product->id}}</td>
            <td>{{ $product->name}}</td>
            <td>{{ number_format($product->price,2)}}</td>
            <td>{{ $product->price_usd}}</td>
        </tr>
        @empty
        <tr>
            No Product Found..
        </tr>
        @endforelse
        {{ $products->links() }}
    </table>
</body>

</html>