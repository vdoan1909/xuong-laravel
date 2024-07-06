<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    const PATH_VIEW = "admin.product.";
    const PATH_UPLOAD = "products";

    public function index()
    {
        $data = Product::with(["catalogue", "tags"])->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact("data"));
    }

    public function create()
    {
        $catalogues = Catalogue::get();
        $sizes = ProductSize::pluck('name', 'id')->all();
        $colors = ProductColor::pluck('name', 'id')->all();
        $tags = Tag::pluck('name', 'id')->all();
        return view(self::PATH_VIEW . __FUNCTION__, compact("catalogues", "sizes", "colors", "tags"));
    }

    public function store(Request $request)
    {
        // Du lieu san pham
        $dataProduct = $request->except(["img_thumbnail", "product_variants", "tags", "product_galleries"]);
        $dataProduct["is_active"] = isset($dataProduct["is_active"]) ? 1 : 0;
        $dataProduct["is_hot_deal"] = isset($dataProduct["is_hot_deal"]) ? 1 : 0;
        $dataProduct["is_good_deal"] = isset($dataProduct["is_good_deal"]) ? 1 : 0;
        $dataProduct["is_new"] = isset($dataProduct["is_new"]) ? 1 : 0;
        $dataProduct["is_show_home"] = isset($dataProduct["is_show_home"]) ? 1 : 0;
        $dataProduct["slug"] = Str::slug($dataProduct["name"]) . "-" . $dataProduct["sku"];

        // Du lieu bien the, vi chua co id san pham nen ta se xu ly de lay id kich co va id mau sac
        $dataProductVariantTmp = $request->product_variants;
        $dataProductVariant = [];

        foreach ($dataProductVariantTmp as $key => $item) {
            $szCl = explode("-", $key);

            $dataProductVariant[] = [
                "product_size_id" => $szCl[0],
                "product_color_id" => $szCl[1],
                "quantity" => $item["quantity"] ?? 0,
                "image" => $item["image"] ?? null
            ];
        }

        $dataProductTag = $request->tags;
        $dataProductGallery = $request->product_galleries ?: [];

        try {
            DB::beginTransaction();
            $product = Product::create($dataProduct);

            if ($product) {
                if ($request->hasFile('img_thumbnail') && $request->file('img_thumbnail')) {
                    $dataProduct['img_thumbnail'] = Storage::put(self::PATH_UPLOAD, $request->file('img_thumbnail'));
                    $product->update(['img_thumbnail' => $dataProduct['img_thumbnail']]);
                }
            }

            foreach ($dataProductVariant as $variant) {
                $variant["product_id"] = $product->id;

                if ($variant["quantity"] > 0 || $variant["image"] != null) {
                    if (isset($variant["image"])) {
                        $variant["image"] = Storage::put(self::PATH_UPLOAD, $variant["image"]);
                    }
                    ProductVariant::create($variant);
                }
            }

            $product->tags()->sync($dataProductTag);

            foreach ($dataProductGallery as $gallery) {
                ProductGallery::create([
                    "product_id" => $product->id,
                    "image" => Storage::put(self::PATH_UPLOAD, $gallery)
                ]);
            }

            DB::commit();

            return redirect()->route("admin.product.index");
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception);
            return back();
        }
    }

    public function edit(string $id)
    {
        return view(self::PATH_VIEW . __FUNCTION__);
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
