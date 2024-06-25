<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    public function __invoke(Request $request)
    {

        if ($request->has('query')) {
            if (is_numeric($request->get('query'))) {
                $products = Product::where('id', $request->get('query'))->get();
            } else {
                $products = Product::where('name', 'like', '%' . $request->get('query') . '%')->get();
            }
        } else {
            $products = Product::orderByDesc('id')->get();
        }
        $cats = Category::all();
        if ($request->has('orderByOrders')) {
            if ($request->get('orderByOrders') == "new") {
                $orders = Order::where('status', "Новый")->orderByDesc('id')->get();
            }
            if ($request->get('orderByOrders') == "confirmed") {
                $orders = Order::where('status', "Подтвержден")->orderByDesc('id')->get();
            }
            if ($request->get('orderByOrders') == "cancelled") {
                $orders = Order::where('status', "Отменен")->orderByDesc('id')->get();
            }
        } else {
            $orders = Order::orderByDesc('id')->get();
        }
        return view('admin.admin', compact('products', 'cats', 'orders'));
    }
    public function confirmOrder(Request $request, Order $order)
    {
        $order->status = "Подтвержден";
        $order->save();
        return back()->with('success', "Заказ был подтвержден");
    }
    public function cancelOrder(Request $request, Order $order)
    {
        $order->status = "Отменен";
        $order->comment = $request->comment;
        $order->save();
        return back()->with('success', "Заказ был отменен");
    }
    public function changeCategory(Request $request, Category $category)
    {
        switch ($request->method()) {
            case 'POST':
                $category->name = $request->name;
                $category->save();
                return to_route('admin')->with(['success' => 'Категория была обновлена']);

            case 'GET':
                return view('admin.category', ['category' => $category]);
        }
    }
    public function deleteCategory(Category $category)
    {
        foreach ($category->products as $pr) {
            $pr->delete();
        }
        $category->delete();
        return to_route('admin')->with(['success' => 'Категория была удалена']);
    }
    public function changeProduct(Request $request, Product $product)
    {
        switch ($request->method()) {
            case 'POST':
                $data = $request->all();

                if ($request->has('name')) {
                    $data['slug'] = Str::slug($request->name);

                    if ($data['slug'] == $request->name) {
                        $data['slug'] = Str::slug($request->name . "-" . $product->id);
                    }
                }
                if ($request->has('image')) {
                    $request->validate([
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp'
                    ]);
                    $imgname = $product->id . time() .  "product" . "." . $request->image->extension();
                    $request->image->move(public_path('images/products/'), $imgname);

                    $data['image'] = $imgname;
                    File::delete(public_path() . "/images/products" . $product->image);
                }

                $product->update($data);
                unset($data['_token']);
                unset($data['slug']);

                return to_route('admin')->with(['success' => 'Товар был обновлен', 'changed' => array_keys($data)]);

            case 'GET':
                return view('admin.product', ['product' => $product]);
        }
    }
    public function deleteProduct(Product $product)
    {
        File::delete(public_path() . "/images/products" . $product->image);
        $product->delete();
        return to_route('admin')->with(['success' => 'Товар был удален']);
    }

    public function addProduct(Request $request)
    {
        switch ($request->method()) {
            case 'POST':
                $data = $request->all();
                $request->validate([
                    'name' => 'required|string',
                    'price' => 'required|integer',
                    'description' => 'required|string',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
                    'category_id' => 'required|integer',
                    'brand_id' => 'required|integer',

                    'in_stock' => 'required|integer',
                ]);
                $imgname = Str::slug($request->name . time() .  "product") . "." . $request->image->extension();
                $request->image->move(public_path('images/products/'), $imgname);

                $data['image'] = $imgname;
                $data['type_id'] = 1;

                $data['slug'] = rand(1, 5000) . '-' . Str::slug($request->name) . "-" . rand(1, 5000);
                Product::create($data);
                return back()->with(['success' => 'Товар был создан']);

            case 'GET':
                return view('admin.addProduct');
        }
    }
    public function addCategory(Request $request)
    {
        switch ($request->method()) {
            case 'POST':
                $data = $request->all();
                $request->validate([
                    'name' => 'required|string',
                ]);
                $data['type_id'] = 1;
                $data['slug'] = Str::slug($request->name);
                Category::create($data);
                return back()->with(['success' => 'Категория была создана!']);

            case 'GET':
                return view('admin.addCategory');
        }
    }
}
