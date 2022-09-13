<?php

namespace App\Http\Controllers\Admin;

use App\Events\TenantCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProducts;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    Private $repository;

    public function __construct(Product $product)
    {
        $this->repository = $product;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->repository->latest()->paginate();

        return view('admin.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProducts  $request)
    {
        $data = $request->except('_token');
        // dd($data);
        $tenant = auth()->user()->tenant;

        if($request->hasFile('image') && $request->image->isValid()){
            $data['image'] = $request->image->store("tenants/{$tenant->uuid}/products");
        }

        $this->repository->create($data);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$product = $this->repository->where('tenant_id', auth()->user()->tenant_id)->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$product = $this->repository->where('tenant_id', auth()->user()->tenant_id)->find($id)){
            return redirect()->back();
        }

        return view('admin.pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = $this->repository->latest()->paginate();

        if(!$products){
            return redirect()->back();
        }

        $data = $request->all();

        $tenant = auth()->user()->tenant;

        if($request->hasFile('image') && $request->image->isValid()){
            if(Storage::exists($products->image)){
                Storage::delete($products->image);
            }

            $data['image'] = $request->image->store("tenants/{$tenant->uuid}/products");
        }

        $this->repository->find($id)->update($data);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products =  $this->repository->find($id);

        if(!$products){
            return redirect()->back();
        }

        if(Storage::exists($products->image)){
            Storage::delete($products->image);
        }

        $products->delete();

        return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $products = $this->repository
        ->where(function($query) use ($request){
            if($request->filter) {
                $query->orWhere('name', $request->filter);
                $query->orWhere('description', $request->filter);
            }

        })
        ->latest()
        ->paginate();

        return view('admin.pages.products.index', [
            'products' => $products,
            'filters' => $filters,
        ]);
    }
}
