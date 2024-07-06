<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductColor;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    const PATH_VIEW = "admin.color.";

    public function index()
    {
        $data = ProductColor::get();
        return view(self::PATH_VIEW . __FUNCTION__, compact("data"));
    }

    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    public function store(Request $request)
    {
        ProductColor::create($request->all());
        return redirect()->route("admin.color.index");
    }

    public function edit(string $id)
    {
        $model = ProductColor::findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact("model"));
    }

    public function update(Request $request, string $id)
    {
        $model = ProductColor::findOrFail($id);
        $model->update($request->all());
        return redirect()->route("admin.color.index");
    }

    public function destroy(string $id)
    {
        $model = ProductColor::findOrFail($id);
        $model->delete();
        return back();
    }
}
