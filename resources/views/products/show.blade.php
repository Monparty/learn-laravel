<x-app-layout>
    <x-slot name="title">Product show</x-slot>
    <div>
        <div>
            Name: {{ $product->name }}
        </div>
        <div>
            Detail: {{ $product->detail }}
        </div>
        <div>
            Image: 
        </div>
        <div>
            <img src="/images/{{ $product->image }}" alt="{{ $product->name }}" style="width: 80px; height: 80px; object-fit:cover;">
        </div>
    </div>
</x-app-layout>