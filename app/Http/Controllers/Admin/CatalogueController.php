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
        $data = Catalogue::with("parent")->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact("data"));
    }

    public function create()
    {
        $catalogues = Catalogue::with("children")->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact("catalogues"));
    }

    public function store(Request $request)
    {
        $data = $request->except("cover");
        $data["is_active"] = $request->is_active ? 1 : 0;

        $catalogue = Catalogue::create($data);

        if ($catalogue) {
            if ($request->hasFile('cover')) {
                $path = Storage::put(self::PATH_UPDATE, $request->file('cover'));
                $catalogue->update(['cover' => $path]);
            }
        }
        return redirect()->route("admin.catalogue.index")->with("success", "Create catalogue successfully");
    }

    public function edit(string $id)
    {
        $model = Catalogue::findOrFail($id);
        // dd($model);
        $catalogues = Catalogue::where('id', '!=', $model->id)->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact("model", "catalogues"));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->except("cover");
        $model = Catalogue::findOrFail($id);
        $data["is_active"] = $request->is_active ? 1 : 0;

        $model->update([
            'name' => $data['name'],
            'is_active' => $data['is_active'],
        ]);

        if ($request->hasFile('cover')) {
            if ($model->cover && Storage::exists($model->cover)) {
                Storage::delete($model->cover);
            }

            $data['cover'] = Storage::put(self::PATH_UPDATE, $request->file('cover'));

            $model->update(['cover' => $data['cover']]);
        }

        return redirect()->route('admin.catalogue.index')->with('success', 'Update catalogue successfully');
    }

    public function destroy(string $id)
    {
        $model = Catalogue::findOrFail($id);

        $model->delete();

        if ($model->cover && Storage::exists($model->cover)) {
            Storage::delete($model->cover);
        }

        return back();
    }
}
