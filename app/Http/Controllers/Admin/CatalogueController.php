<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogueController extends Controller
{
    const PATH_VIEW = "admin.catalogue.";
    const PATH_UPDATE = "catalogues";

    public function index()
    {
        $data = Catalogue::with(["parent", "children"])->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact("data"));
    }

    public function create()
    {
        $catalogues = Catalogue::with("children")->whereNull("parent_id")->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact("catalogues"));
    }

    public function store(Request $request)
    {
        $data = $request->except("cover");
        $data["is_active"] = $request->is_active ? 1 : 0;

        if ($request->hasFile("cover")) {
            $data["cover"] = Storage::put(self::PATH_UPDATE, $request->file("cover"));
        }

        Catalogue::create($data);
        return redirect()->route("admin.catalogue.index")->with("success", "Create catalogue successfully");
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $model = Catalogue::findOrFail($id);
        $catalogues = Catalogue::with("children")->whereNull("parent_id")->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact("model", "catalogues"));
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
