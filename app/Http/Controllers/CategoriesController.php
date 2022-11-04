<?php

namespace App\Http\Controllers;

use App\Mail\CategoryUpdateReport;
use App\Models\Category;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index', [ 'categories'=> Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriesRequest $request)
    {
        $category = new Category;

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->priority = $request->input('priority');

        $category->save();

        return redirect('/categories', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', ['category'=> $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', ['category'=> $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoriesRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriesRequest $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->priority = $request->input('priority');

        $category->save();


        Mail::to('egiraldoduran@gmail.com')->send(new CategoryUpdateReport($category));

        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }

    public function productsAvailable(){

        return view('catalogue', ['categories'=> Category::all()]);
    }


}
