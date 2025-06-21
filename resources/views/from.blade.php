<x-app-layout>
    <x-slot name="title">สร้างบทความ</x-slot>
    <form method="post" action="{{ route('insert') }}" class="grid gap-4 w-1/2">
        @csrf
        <div>
            <label for="title" class="block mb-2">ชื่อบทความ</label>
            <input id="title" name="title" class="w-full rounded-md p-2 outline-1 outline-gray-300">
            @error('title')
                <span class="text-sm text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div>
            <label for="quill_editor" class="block mb-2">เนื้อหาบทความ</label>
            <div>
                <div id="quill_editor" class="bg-white"></div>
                <input type="hidden" id="quill_html" name="content"></input>
            </div>
            @error('content')
                <span class="text-sm text-red-400">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div>
            <label class="block mb-2">สถานะ</label>
            <div class="flex items-center gap-2">
                <input type="radio" name="status" id="s1" value="1" checked>
                <label for="s1" class="block">เผยแพร่</label>
            </div>
            <div class="flex items-center gap-2">
                <input type="radio" name="status" id="s2" value="0">
                <label for="s2" class="block">ฉบับร่าง</label>
            </div>
        </div>
        <div class="flex items-center justify-end gap-x-6">
            <a href="{{ route('blog') }}" class="">Cancel</a>
            <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 hover:bg-blue-500 text-white">Save</button>
        </div>
    </form>
    <script>
        var quill = new Quill('#quill_editor', {
                theme: 'snow'
        });
        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById("quill_html").value = quill.root.innerHTML;
        });
    </script>
</x-app-layout>