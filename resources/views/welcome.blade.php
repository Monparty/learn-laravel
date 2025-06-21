<x-app-layout>
    <x-slot name="title">หน้าแรก</x-slot>
    <a href="https://www.youtube.com/watch?v=64aycSVCvWA&t=21715s" target="_blank" class="p-2 hover:bg-blue-500">
        Link : เรียนถึง 06:00
    </a>
    <h2 class="text-xl p-2 border-b mb-4">บทความล่าสุด</h2>
    <div class="grid gap-2">
        @foreach ($blogs as $blog)
            <div class="border p-2 rounded-md">
                <h2 class="text-xl">
                    {{ $blog->title }}
                </h2>
                <p>
                    {!! Str::limit($blog->content, 20) !!}
                </p>
                <a href="{{ route('detail', $blog->id) }}" class="hover:underline">อ่านเพิ่มเติม</a>
            </div>
        @endforeach
    </div>
</x-app-layout>