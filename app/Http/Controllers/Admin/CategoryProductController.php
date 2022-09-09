<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    protected $product, $categories;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->categories = $category;
    }

    // retornar produtos
    public function products($idCategory)
    {
        $categories = $this->categories->with('products')->find($idCategory);

        if(!$categories)
        {
            return redirect()->back();
        }

        $products = $categories->products;

        return view('', compact('products'));
    }
    // retornar categorias
    public function categories($idProduct)
    {
        $product = $this->product->with('categories')->find($idProduct);

        if(!$product)
        {
            return redirect()->back();
        }

        $categories = $product->categories;

        return view('admin.pages.products.categories.categories', compact('categories', 'product'));
    }

    public function categoriesAvaliable($idProduct)
    {
        $product = $this->product->with('categories')->find($idProduct);
        if(!$product){
            return redirect()->back();
        }
        $categories = $product->categoriesAvaliable();

        return view('admin.pages.products.categories.avaliable', compact('categories', 'product'));
    }


    public function productCategoryAttach(Request $request, $idProduct)
    {
        if(!$product = $this->product->with('categories')->find($idProduct))
        {
            return redirect()->back();
        }

        $product->categories()->attach($request->categories);

        return redirect()->route('product.categories', $product->id);
    }

    public function productCategoryDetach($idProduct, $idCategory)
    {
        $product = $this->product->find($idProduct);
        $category = $this->categories->find($idCategory);

        $product->categories()->detach($category);

        return redirect()->route('product.categories', $product->id);
    }

}
