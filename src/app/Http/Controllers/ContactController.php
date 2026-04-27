<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('index', compact('categories'));
    }


    //３つ分かれている電話番号を結合させたコード//
    public function store(Request $request)
    {
        $tel = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;

        Contact::create
        ([
            'tel' => $tel,
        ]);

        return redirect('/thanks');
    }
}
