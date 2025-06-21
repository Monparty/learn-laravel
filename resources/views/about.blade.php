<x-app-layout>
    <x-slot name="title">เกี่ยวกับเรา</x-slot>
    <div class="grid gap-2">
        <div>ผู้ก่อพัฒนาระบบ : {{ $name }}</div>
        <div>วันที่พัฒนาระบบ : {{ $date }}</div>
    </div>
</x-app-layout>
