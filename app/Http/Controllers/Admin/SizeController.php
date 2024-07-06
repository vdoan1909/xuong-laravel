<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    const PATH_VIEW = "admin.size.";

    public function index()
    {
        $data = ProductSize::get();
        return view(self::PATH_VIEW . __FUNCTION__, compact("data"));
    }

    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    public function store(Request $request)
    {
        ProductSize::create($request->all());
        return redirect()->route("admin.size.index");
    }

    public function edit(string $id)
    {
        $model = ProductSize::findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact("model"));
    }

    public function update(Request $request, string $id)
    {
        $model = ProductSize::findOrFail($id);
        $model->update($request->all());
        return redirect()->route("admin.size.index");
    }

    public function destroy(string $id)
    {
        $model = ProductSize::findOrFail($id);
        $model->delete();
        return back();
    }
}
