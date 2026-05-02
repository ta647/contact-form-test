<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $tel = $request->tel1 . $request->tel2 . $request->tel3;
        $contact = $request->only([
            'first_name', 'last_name', 'gender', 'email',
            'address', 'building', 'category_id', 'detail',
            'tel1', 'tel2', 'tel3',
        ]);
        $contact['tel'] = $tel;

        $category = Category::find($request->category_id);

        return view('confirm', compact('contact', 'category'));
    }

    public function store(Request $request)
    {
        Contact::create($request->only([
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel',
            'address',
            'building',
            'detail',
        ]));

        return redirect('/thanks');
    }

    public function back(Request $request)
    {
        return redirect('/')->withInput($request->all());
    }

    public function thanks()
    {
        return view('thanks');
    }
}
