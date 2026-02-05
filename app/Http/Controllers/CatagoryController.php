<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    public function index()
    {
        $categories = auth()->user()->catagory()->latest()->get();
        return view('home.welcome', ['cats' => $categories]);
    }
    public function show_categories()
    {
        $categories = auth()->user()->catagory()->latest()->get();
        return view('pages.categories', ['cats' => $categories]);
    }
    public function create_category(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => 'required'
        ]);
        $incomingFields['user_id'] = auth()->id();
        $incomingFields['name'] = strip_tags($incomingFields['name']);
        Catagory::create($incomingFields);
        return redirect()->back()->with('success', 'new category has been made');
    }
    public function delete_category(Catagory $catagory)
    {
        $catagory->delete();
        return redirect()->back()->with('success', 'category has been deleted seccessfully');
    }
    public function edit_form_category(Catagory $catagory)
    {
        return view('pages.editcategory', ['category' => $catagory]);
    }
    public function edit_category(Catagory $catagory, Request $request)
    {
        $incomingFields = $request->validate([
            'name' => 'required'
        ]);
        $catagory->update($incomingFields);
        return redirect('/categories')->with('success', 'Category have been edited successfully');
    }
    public function cat(Catagory $catagory){
        $links = $catagory->link()->get();
        return view('pages.category', ['cat' => $catagory, 'links' => $links]);
    }
}
