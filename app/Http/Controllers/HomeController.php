<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Product::take(8)->get();
        $colors = ProductColor::get();
        $tags = Tag::get();
        return view('client.index', compact("data", "colors", "tags"));
    }

    public function show(string $slug)
    {
        $model = Product::where("slug", $slug)->with(["variants", "galleries"])->first();
        $colors = ProductColor::get();
        $sizes = ProductSize::get();
        return view("client.product.detail", compact("model", "colors", "sizes"));
    }
}
