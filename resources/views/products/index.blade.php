<x-app-layout>
    <x-slot name="title">Products list</x-slot>
    <a href="{{ route('products.create') }}">create</a>
    @session('success')
        <div>
            {{ $value }}
        </div>
    @endsession
    <div>
        <table class="table-auto w-full">
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
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('products.show', $product->id) }}">View</a>
                                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                                <button>Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>