<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>product list</title>
</head>
<body>
    <a href="{{ route('products.create') }}">create</a>
    @session('success')
        <div>
            {{ $value }}
        </div>
    @endsession
    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Detail</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td><img src="/images/{{ $product->image }}" alt="{{ $product->name }}" style="width: 80px; height: 80px; object-fit:cover;"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->detail }}</td>
                        <td><a href="{{ route('products.edit', $product->id) }}">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>