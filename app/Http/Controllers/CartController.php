<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function index()
    {
        $data = session("cart");
        $totalAmount = 0;
        if (isset($data)) {
            foreach ($data as $item) {
                $totalAmount += $item['quantity'] * ($item['price_sale'] ?: $item['price_regular']);
            }
        }
        return view("client.product.cart", compact("totalAmount"));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $productVariant = ProductVariant::with(["product_size", "product_color"])
            ->where([
                "product_id" => $request->product_id,
                "product_size_id" => $request->product_size_id,
                "product_color_id" => $request->product_color_id
            ])
            ->firstOrFail();

        // Gan so luong trc tu ban ngoai, neu khong no se lay quantity cua csdl luon
        $productVariant["quantity"] = $request->quantity;

        $cart = session('cart', []);

        if (!isset($cart[$productVariant->id])) {
            $data = $product->toArray()
                + $productVariant->toArray()
                + ["quantity" => $productVariant["quantity"]];
            $cart[$productVariant->id] = $data;
        } else {
            $cart[$productVariant->id]['quantity'] = $request->quantity;
        }

        session()->put('cart', $cart);

        return redirect()->route('client.cart.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
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
