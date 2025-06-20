<x-app-layout>
    <x-slot name="title">บทความ</x-slot>
    <table class="table-auto w-full">
        <thead>
            <tr class="bg-blue-200">
                <th class="w-[5%] py-2">ลำดับ</th>
                <th class="w-[20%]">บทความ</th>
                <th>เนื้อหา</th>
                <th class="w-[15%]">สถานะ</th>
                <th class="w-[15%]"></th>
            </tr>
        </thead>
        @if ($blogs->count() > 0)
            <tbody>
                @php $count = 1; @endphp
                @foreach ($blogs as $blog)
                    <tr class="border-b-1 border-gray-200 odd:bg-white even:bg-gray-100 hover:bg-blue-50">
                        <td class="py-4 text-center">
                            {{ ($blogs->currentPage() - 1) * $blogs->perPage() + $loop->index + 1 }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ Str::limit($blog->content, 50) }}</td>
                        <td class="text-center">
                            @if ($blog->status == true)
                                <a href="{{ route('change', $blog->id) }}"
                                    class="bg-green-100 text-green-600 w-fit px-3 py-1 rounded-full text-sm">
                                    เผยแพร่
                                </a>
                            @else
                                <a href="{{ route('change', $blog->id) }}"
                                    class="bg-gray-300 w-fit px-3 py-1 rounded-full text-sm">
                                    ฉบับร่าง
                                </a>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('edit', $blog->id) }}"
                                class="px-4 py-2 rounded-md bg-yellow-400 hover:bg-yellow-500 text-sm">Edit</a>
                            <a href="{{ route('delete', $blog->id) }}"
                                onclick="return confirm('คุฯต้องการลบบทความ {{ $blog->title }} ใช่หรือไม่ ?')"
                                class="px-4 py-2 rounded-md bg-red-500 hover:bg-red-600 text-sm text-white">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        @else
            <tbody>
                <tr class="border-b-1 border-gray-200 odd:bg-white even:bg-gray-100 hover:bg-blue-50">
                    <td class="py-6 text-center bg-gray-200" colspan="5">ไม่มีบนความในระบบ</td>
                </tr>
            </tbody>
        @endif
    </table>
    <div class="mt-3">
        {{ $blogs->links() }}
    </div>
</x-app-layout>
