<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    const PATH_VIEW = "admin.tag.";

    public function index()
    {
        $data = Tag::get();
        return view(self::PATH_VIEW . __FUNCTION__, compact("data"));
    }

    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    public function store(Request $request)
    {
        Tag::create($request->all());
        return redirect()->route("admin.tag.index");
    }

    public function edit(string $id)
    {
        $model = Tag::findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact("model"));
    }

    public function update(Request $request, string $id)
    {
        $model = Tag::findOrFail($id);
        $model->update($request->all());
        return redirect()->route("admin.tag.index");
    }

    public function destroy(string $id)
    {
        $model = Tag::findOrFail($id);
        $model->delete();
        return back();
    }
}
