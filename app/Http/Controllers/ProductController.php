<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Season;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __invoke($catalog_slug, $item_slug)
    {
        $product = Product::where("slug", $item_slug)->firstOrFail();
        return view('item', compact('product'));
    }

    public function showBrand(Request $request, $brand)
    {

        if ($brand_object = Brand::where('slug', $brand)->first()) {
            $match = array();
            $match['brand_id'] = $brand_object->id;
            $match[] = ['in_stock', '>', 0];
            $hasParams = false;
            if ($request->has('from_price') && $request->has('to_price')) {
                $hasParams = true;
                $match[] = ['price', '<=', $request->get('to_price')];
                $match[] = ['price', '>=', $request->get('from_price')];
            }
            if ($request->has('category')) {
                $hasParams = true;
                $seasonId = Category::where('slug', $request->category)->firstOrFail();
                $match['category_id'] = $seasonId->id;
            }
            if ($hasParams == true) {
                $items = Product::where($match)->get();
            } else {
                $items = Product::where('brand_id', $brand_object->id)->where('in_stock', '>', 0)->get();
            }

            if ($items->count() == 0) {
                $cheapiest = 0;
                $expensive = 0;
            } else {
                $cheapiest = $items->sortBy('price')->first()->price;
                $expensive = $items->sortByDesc('price')->first()->price;
            }
            if ($request->has('price') && $request->has('new')) {
                if ($request->price == 'expensive' && $request->new == 'new') {
                    $items = $items->sortByDesc('price')->sortByDesc('id');
                }
                if ($request->price == 'cheap' && $request->new == 'new') {
                    $items = $items->sortBy('price')->sortByDesc('id');
                }
                if ($request->price == 'expensive' && $request->new == 'old') {
                    $items = $items->sortByDesc('price')->sortBy('id');
                }
                if ($request->price == 'cheap' && $request->new == 'old') {
                    $items = $items->sortBy('price')->sortBy('id');
                }
            } else {
                if ($request->has('price')) {
                    if ($request->price == 'expensive') {
                        $items = $items->sortByDesc('price');
                    } else {
                        $items = $items->sortBy('price');
                    }
                }
                if ($request->has('new')) {
                    if ($request->new == 'new') {
                        $items = $items->sortByDesc('id');
                    } else {
                        $items = $items->sortBy('id');
                    }
                }
            }
            if ($request->has('from')) {
                if ($request->get('from') == "a-z") {
                    $items = $items->sortBy('name');
                } else {
                    $items = $items->sortByDesc('name');
                }
            }
            return view('catalog', ['items' => $items, 'title' => $brand_object->name, 'brand' => $brand_object,  'cheapiest' => $cheapiest, 'expensive' => $expensive]);
        } else {
            abort(404);
        }
    }
    public function showFull(Request $request)
    {
        $match = array();

        $match[] = ['in_stock', '>', 0];
        $hasParams = false;
        if ($request->has('from_price') && $request->has('to_price')) {
            $hasParams = true;
            $match[] = ['price', '<=', $request->get('to_price')];
            $match[] = ['price', '>=', $request->get('from_price')];
        }

        if ($request->has('brand')) {
            $hasParams = true;
            $brandId = Brand::where('slug', $request->brand)->firstOrFail();
            $match['brand_id'] = $brandId->id;
        }
        if ($request->has('category')) {
            $hasParams = true;
            $seasonId = Category::where('slug', $request->category)->firstOrFail();
            $match['category_id'] = $seasonId->id;
        }


        $items = Product::where($match)->get();

        if ($items->count() == 0) {
            $cheapiest = 0;
            $expensive = 0;
        } else {
            $cheapiest = $items->sortBy('price')->first()->price;
            $expensive = $items->sortByDesc('price')->first()->price;
        }

        if ($request->has('price') && $request->has('new')) {
            if ($request->price == 'expensive' && $request->new == 'new') {
                $items = $items->sortByDesc('price')->sortByDesc('id');
            }
            if ($request->price == 'cheap' && $request->new == 'new') {
                $items = $items->sortBy('price')->sortByDesc('id');
            }
            if ($request->price == 'expensive' && $request->new == 'old') {
                $items = $items->sortByDesc('price')->sortBy('id');
            }
            if ($request->price == 'cheap' && $request->new == 'old') {
                $items = $items->sortBy('price')->sortBy('id');
            }
        } else {
            if ($request->has('price')) {
                if ($request->price == 'expensive') {
                    $items = $items->sortByDesc('price');
                } else {
                    $items = $items->sortBy('price');
                }
            }
            if ($request->has('new')) {
                if ($request->new == 'new') {
                    $items = $items->sortByDesc('id');
                } else {
                    $items = $items->sortBy('id');
                }
            }
        }
        if ($request->has('from')) {
            if ($request->get('from') == "a-z") {
                $items = $items->sortBy('name');
            } else {
                $items = $items->sortByDesc('name');
            }
        }


        return view('fullCatalog', ['items' => $items, 'title' => "Каталог",  'cheapiest' => $cheapiest,  'expensive' => $expensive]);
    }
    public function showCategory(Request $request, $category)
    {
        if ($category_object = Category::where('slug', $category)->first()) {

            $match = array();
            $match['category_id'] = $category_object->id;
            $match[] = ['in_stock', '>', 0];
            $hasParams = false;
            if ($request->has('from_price') && $request->has('to_price')) {
                $hasParams = true;
                $match[] = ['price', '<=', $request->get('to_price')];
                $match[] = ['price', '>=', $request->get('from_price')];
            }

            if ($request->has('brand')) {
                $hasParams = true;
                $brandId = Brand::where('slug', $request->brand)->firstOrFail();
                $match['brand_id'] = $brandId->id;
            }

            if ($hasParams == true) {
                $items = Product::where($match)->get();
            } else {
                $items = Product::where('category_id', $category_object->id)->where('in_stock', '>', 0)->get();
            }
            if ($items->count() == 0) {
                $cheapiest = 0;
                $expensive = 0;
            } else {
                $cheapiest = $items->sortBy('price')->first()->price;
                $expensive = $items->sortByDesc('price')->first()->price;
            }

            if ($request->has('price') && $request->has('new')) {
                if ($request->price == 'expensive' && $request->new == 'new') {
                    $items = $items->sortByDesc('price')->sortByDesc('id');
                }
                if ($request->price == 'cheap' && $request->new == 'new') {
                    $items = $items->sortBy('price')->sortByDesc('id');
                }
                if ($request->price == 'expensive' && $request->new == 'old') {
                    $items = $items->sortByDesc('price')->sortBy('id');
                }
                if ($request->price == 'cheap' && $request->new == 'old') {
                    $items = $items->sortBy('price')->sortBy('id');
                }
            } else {
                if ($request->has('price')) {
                    if ($request->price == 'expensive') {
                        $items = $items->sortByDesc('price');
                    } else {
                        $items = $items->sortBy('price');
                    }
                }
                if ($request->has('new')) {
                    if ($request->new == 'new') {
                        $items = $items->sortByDesc('id');
                    } else {
                        $items = $items->sortBy('id');
                    }
                }
            }
            if ($request->has('from')) {
                if ($request->get('from') == "a-z") {
                    $items = $items->sortBy('name');
                } else {
                    $items = $items->sortByDesc('name');
                }
            }



            return view('catalog', ['items' => $items, 'title' => $category_object->name, 'category' => $category_object,  'cheapiest' => $cheapiest,  'expensive' => $expensive]);
        } else {
            abort(404);
        }
    }
}
