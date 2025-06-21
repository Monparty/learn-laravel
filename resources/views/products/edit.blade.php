<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create product</title>
</head>
<body>
    <a href="{{ route('products.index') }}">back</a>
    <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            Name :
            <input type="text" name="name" value="{{ $product->name }}">
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div>
            Detail : 
            <input type="text" name="detail" value="{{ $product->detail }}">
            @error('detail')
                {{ $message }}
            @enderror
        </div>
        <div>
            Image : 
            <input type="file" name="file">
            @error('file')
                {{ $message }}
            @enderror
        </div>
        <div>
            <img src="/images/{{ $product->image }}" alt="{{ $product->name }}" style="width: 80px; height: 80px; object-fit:cover;">
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>