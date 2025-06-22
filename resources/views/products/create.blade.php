<x-app-layout>
    <x-slot name="title">Create product</x-slot>
    <a href="{{ route('products.index') }}">back</a>
    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            Name :
            <input type="text" name="name">
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div>
            Detail : 
            <input type="text" name="detail">
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
        <button type="submit">Submit</button>
    </form>
</x-app-layout>