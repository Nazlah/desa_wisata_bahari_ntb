<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function content($content_kind,$content_kind_id)
    {
        if (request()->user()->hasRole('User Content')) {
            return view('/user/content/content_list')->with([
                'data' => $content_kind,
                'id' =>$content_kind_id,
            ]);
        } else {
            return redirect('/admin/home');
        }
    }

    public function read(Request $request)
    {
        if (request()->user()->hasRole('User Content')) {
            $id = $request->id;
            dd($id);
            $data = Content::where('content_kind_id' , '=' , $id)->get();
            //$data = DB::table('contents')->where('content_kind_id', '=', 100)->get();

            return view('/user/content/read')->with([
                'data' => $data
            ]);
        } else {
            return redirect('/admin/home');
        }
    }

    public function create($content_kind,$content_kind_id)
    {
        if (request()->user()->hasRole('User Content')) {


            return view('/user/content/create')->with([
                'data' => $content_kind,
                'id' =>$content_kind_id,
            ]);
        } else {
            return redirect('/admin/home');
        }
    }

    public function store(Request $request)
    {
        if (request()->user()->hasRole('User Content')) {

            // return [
            //     $request->id,
            //     $request->user_id,
            //     $request->name_content,
            // ];
            // $request->validate([
            //     'name_content' => ['required', 'string', 'max:255'],
            //     'content_kind_id' => ['required'],
            //     'user_id' => ['required']
            // ]);
            Content::create([
                'name_content' => $request->name_content,
                'content_kind_id' => $request->id,
                'user_id' => $request->user_id,
                'url' => 'slug',
                'content' => 'coba content',
                'thumbnail' => 'ini.jpg'
            ]);
            // $contentKind = $request->name_content_kind;
            // $content = $request->name_content;

            //return view('/user/content/edit/'+$content_kind+$content+$dataid);
        } else {
            return redirect('/admin/home');
        }
    }

    public function detail_input(){
        if (request()->user()->hasRole('User Content')) {


        } else {
            return redirect('/admin/home');
        }
    }
}
