@extends('layouts.base')
@section('title',"Product |{$product->title} ")
@section('container')
    <main class="container">
        <div class="row">
            <h1 class="alert alert-success text-center"><i class="fa-solid fa-book-bookmark"></i> {{$product->title}} </h1>
        </div>
        <div class="row">
            <div class="card my-3">
                <div class="row g-8">
                    <div class="col-md-4">
                        <img src="{{$product->image}}" width="300px" height="300xp" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$product->author}}</h6>
                            <p class="card-text">Description: {{$product->description}}</p>
                        </div>
                        <div>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{$product->editorial}}.</h5>
                                    <small class="text-muted">Ago {{$product->year}}.</small>
                                </div>
                                <p class="mb-1">{{$product->price}}</p>
                                <small class="text-muted">Pages {{$product->number_pages}}.</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
