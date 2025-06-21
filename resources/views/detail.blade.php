<x-app-layout>
    <x-slot name="title">{{ $blog->title }}</x-slot>
    <h2 class="text-xl p-2 border-b mb-4"> {{ $blog->title }}</h2>
    <div class="grid gap-2">
        <div class="border p-2 rounded-md">
            <h2 class="text-xl">
                {{ $blog->title }}
            </h2>
            <p>
                {!! $blog->content !!}
            </p>
        </div>
    </div>
</x-app-layout>