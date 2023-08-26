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
            <th>Price</th>
        </tr>
        @forelse($products as $product)
        <tr>
            <td>{{ $product->id}}</td>
            <td>{{ $product->name}}</td>
            <td>{{ $product->price}}</td>
        </tr>
        @empty
        <tr>
            No Product Found..
        </tr>
        @endforelse
    </table>
</body>

</html>