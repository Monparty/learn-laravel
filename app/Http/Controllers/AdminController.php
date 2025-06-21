<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class AdminController extends Controller
{
    function blogs() {
        $blogs = Blog::orderBy('id', 'desc')->paginate(5);
        return view('blog', compact('blogs'));
    }

    function about() {
        $name = 'monsuniti';
        $date = '11 jun 2028';
        return view('about', compact('name', 'date'));
    }

    function create() {
        return view('from');
    }

    function insert(Request $request) {
        $request->validate(
            [
            'title' => 'required|max:50',
            'content' => 'required'
            ],
            [
                'title.required' => 'ระบุชื่อบทความ',
                'title.max' => 'ชื่อบทความไม่ควรเกิน 50 ตัวอักษร',
                'content.required' => 'ระบุเนื้อหา',
            ]
        );

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status 
        ];

        Blog::insert($data);
        
        return redirect(route('blog'));
    }

    function change($id) {
        $blog = Blog::find($id);
        $data = [
            'status' => !$blog->status
        ];
        Blog::find($id)->update($data);
        return redirect()->back();
    }

    function edit($id) {
        $blog = Blog::find($id);
        return view('edit', compact('blog'));
    }

    function update(Request $request, $id) {
        $request->validate(
            [
            'title' => 'required|max:50',
            'content' => 'required'
            ],
            [
                'title.required' => 'ระบุชื่อบทความ',
                'title.max' => 'ชื่อบทความไม่ควรเกิน 50 ตัวอักษร',
                'content.required' => 'ระบุเนื้อหา',
            ]
        );
        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];

        Blog::find($id)->update($data);
        return redirect(route('blog'));
    }

    function delete($id) {
        Blog::find($id)->delete();
        return redirect()->back();
    }
}
