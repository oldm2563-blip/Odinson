<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagValidation;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function create_tag(TagValidation $request)
    {
        $incomingFields = $request->validated();
        $incomingFields['name'] = strip_tags($incomingFields['name']);
        Tag::updateOrCreate($incomingFields);
        return redirect()->back()->with('success', 'new Tag has been made');
    }
}
