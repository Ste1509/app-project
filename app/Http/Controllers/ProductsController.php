<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreProductsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsRequest $request)
    {
        $product = new Product;
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->author = $request->input('author');
        $product->editorial = $request->input('editorial');
        $product->year = $request->input('year');
        $product->number_pages = $request->input('number_pages');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->slug = Str::slug($request->input('title'), '-');
        $product->image = $request->input('image');
        $product->active = $request->exists('active');

        $product->save();

        return redirect('/products', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $param
     * @return \Illuminate\Http\Response
     */
    public function edit($param)
    {
        $product = Product::where('slug', $param)
            ->firstOrFail();

        $categories = Category::all();

        return view('products.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateProductsRequest $request
     * @param
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsRequest $request, $param)
    {
        $product = Product::where('slug', $param)->firstOrFail();

        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->author = $request->input('author');
        $product->editorial = $request->input('editorial');
        $product->year = $request->input('year');
        $product->number_pages = $request->input('number_pages');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->slug = Str::slug($request->input('title'), '-');
        $product->image = $request->input('image');
        $product->active = $request->exists('active');
        $product->save();

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back();
    }

}
