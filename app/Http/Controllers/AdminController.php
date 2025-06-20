<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function blogs() {
        $blogs = DB::table('blogs')->paginate(3);
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

        DB::table('blogs')->insert($data);
        
        return redirect(route('blog'));
    }

    function change($id) {
        $blog = DB::table('blogs')->where('id', $id)->first();
        $data = [
            'status' => !$blog->status
        ];
        DB::table('blogs')->where('id', $id)->update($data);
        return redirect(route('blog'));
    }

    function edit($id) {
        $blog = DB::table('blogs')->where('id', $id)->first();
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

        $blog = DB::table('blogs')->where('id', $id)->update($data);
        return redirect(route('blog'));
    }

    function delete($id) {
        DB::table('blogs')->where('id', $id)->delete();
        return redirect(route('blog'));
    }
}
