@extends('layouts.base')
@section('title', 'Create a new product')
@section('container')
    <main class="container">
        <h1 class="alert alert-success text-center"><i class="fa-solid fa-book-bookmark"></i> &nbsp; Create a new product</h1>
        <form method="POST" action="{{route('products.store')}}">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                               aria-describedby="title" value="{{old('title')}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3"
                                  name="description">{{old('description')}}</textarea>
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Genre</label>
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option selected>Open this select menu</option>
                            @foreach($categories as $category)
                                <option value="{{old('category_id', $category->id)}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control" name="author" id="author"
                               aria-describedby="author" value="{{old('author')}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="editorial" class="form-label">Editorial</label>
                        <input type="text" class="form-control" name="editorial" id="editorial"
                               aria-describedby="editorial" value="{{old('editorial')}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="number" value="{{old('year')}}" name="year" class="form-control" stop="0">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="number_pages" class="form-label">Number pages</label>
                        <input type="number" value="{{old('number_pages')}}" name="number_pages" class="form-control"
                               stop="0">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" value="{{old('price')}}" name="price" class="form-control" stop="0.1">
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="text" class="form-control" name="image" id="image"
                               aria-describedby="image" value="{{old('image')}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="active" name="active" >
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
