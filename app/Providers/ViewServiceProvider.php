<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Catalogue;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('admin.layout.side-bar', function ($view) {
            $data = Catalogue::with('children')->whereNull('parent_id')->get();
            $view->with('data', $data);

            $menuItems = [
                [
                    'id' => 'catalogue',
                    'href' => 'admin.catalogue.index',
                    'icon' => ' ri-list-check',
                    'name' => 'Catalogue',
                    // Catalogue cần in ra danh mục cha con nên sẽ truyển $data
                    "data" => $data
                ],
                [
                    'id' => 'tag',
                    'icon' => 'ri-hashtag',
                    'name' => 'Tag',
                ],
                [
                    'id' => 'size',
                    'icon' => 'ri-service-line',
                    'name' => 'Size',
                ],
                [
                    'id' => 'color',
                    'icon' => 'ri-pencil-line',
                    'name' => 'Color',
                ],
                [
                    'id' => 'product',
                    'icon' => 'ri-product-hunt-line',
                    'name' => 'Product',
                ],
                [
                    'id' => 'productgallery',
                    'icon' => 'ri-image-2-line',
                    'name' => 'Product Gallery',
                ],
                [
                    'id' => 'producttag',
                    'icon' => 'ri-price-tag-3-line',
                    'name' => 'Product Tag',
                ],
                [
                    'id' => 'productvariant',
                    'icon' => ' ri-mini-program-fill',
                    'name' => 'Product Variant',
                ],
            ];

            $view->with('menuItems', $menuItems);
        });
    }
}
