@extends('layouts.base')
@section('title', 'Edit a product')
@section('container')
    <main class="container">
        <h1 class="alert alert-success text-center"><i class="fa-solid fa-book-bookmark"></i> &nbsp; Edit a product</h1>
        <form method="POST" action="{{route('products.update', $product->slug)}}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                               aria-describedby="title" value="{{old('title',$product->title)}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3"
                                  name="description">{{old('description', $product->description)}}</textarea>
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Genre</label>
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option selected>Open this select menu</option>
                            @foreach($categories as $category)
                                <option
                                    value="{{$category->id}}" {{isset($category->id) && $product->category_id == $category->id ? "selected":""}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control" name="author" id="author"
                               aria-describedby="author" value="{{old('author',$product->author)}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="editorial" class="form-label">Editorial</label>
                        <input type="text" class="form-control" name="editorial" id="editorial"
                               aria-describedby="editorial" value="{{old('editorial',$product->editorial)}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="number" value="{{old('year',$product->year)}}" name="year" class="form-control"
                               stop="0.1">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="number_pages" class="form-label">Number pages</label>
                        <input type="number" value="{{old('number_pages',$product->number_pages)}}" name="number_pages"
                               class="form-control"
                               stop="0">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" value="{{old('price',$product->price)}}" name="price" class="form-control"
                               stop="0.1">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="text" class="form-control" name="image" id="image"
                               aria-describedby="image" value="{{old('image',$product->image)}}">
                    </div>
                </div>
                <div class="col-4">
                    @if($product->active==1)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="active" name="active" checked>
                            @else
                                <input class="form-check-input" type="checkbox" id="active" name="active">
                            @endif
                            <label class="form-check-label" for="active">
                                Available
                            </label>
                        </div>
                </div>
            </div>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </main>
@endsection
