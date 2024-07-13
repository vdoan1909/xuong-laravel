<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function save(Request $request)
    {
        try {
            DB::beginTransaction();

            $user = User::firstOrCreate(
                ['email' => $request->user_email],
                [
                    'name' => $request->user_name,
                    'password' => bcrypt($request->user_email),
                    'is_active' => false
                ]
            );

            $totalAmount = 0;
            $dataItem = [];

            foreach (session('cart') as $variantID => $item) {
                $totalAmount += $item['quantity'] * ($item['price_sale'] ?: $item['price_regular']);

                $dataItem[] = [
                    'product_variant_id' => $variantID,
                    'quantity' => $item['quantity'],
                    'product_name' => $item['name'],
                    'product_sku' => $item['sku'],
                    'product_img_thumbnail' => $item['img_thumbnail'],
                    'product_price_regular' => $item['price_regular'],
                    'product_price_sale' => $item['price_sale'],
                    'variant_size_name' => $item['product_size']['name'],
                    'variant_color_name' => $item['product_color']['name'],
                ];
            }

            $order = Order::create([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email,
                'user_phone' => $request->user_phone,
                'user_address' => $request->user_address,
                'user_note' => $request->user_note,
                'total_price' => $totalAmount,
            ]);

            foreach ($dataItem as $item) {
                $item['order_id'] = $order->id;

                OrderItem::create($item);
            }

            DB::commit();

            session()->forget('cart');
            return redirect()->route("client.index");
        } catch (\Exception $exception) {
            DB::rollBack();
            // dd($exception);
            return back();
        }
    }
}
