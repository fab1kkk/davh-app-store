<?php

namespace App\Http\Controllers\admin\panel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Product $products, ProductCategory $category): View
    {
        $viewData = [
            'title' => 'Manage products',
            'products' => $products->paginate(3),
            'categories' => $category->all(),
        ];
        return view('admin.panel.products')->with($viewData);
    }

    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'product_categories_id' => ['required', 'exists:product_categories,id'],
        ]);


        function generateUniqueSlug($from)
        {
            $slug = Str::slug($from);
            $slugCounter = Product::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            if ($slugCounter > 0) {
                $slug = "{$slug}-{$slugCounter}";
            }
            return $slug;
        }


        $product = new Product();
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->image = $validated['image'];
        $product->price = $validated['price'];
        $product->product_categories_id = $validated['product_categories_id'];
        $product->slug = generateUniqueSlug($validated['name']);

        $product->save();
        return back()->with('success', 'Saved.');
    }
}
