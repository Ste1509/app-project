@extends('layouts.base')
@section('title', 'Catalogue')
@section('container')
    <main class="container">
        <h1 class="alert alert-primary text-center"><i class="fa-solid fa-book-open"></i>&nbsp; Catalogue &nbsp; <i class="fa-solid fa-hand-holding-dollar"></i></h1>
        @foreach($categories as $category)
            <h1 class="alert alert-primary "><i class="fa-duotone fa-books"></i>{{$category->name}}</h1>
            <div class="row">
                @foreach($category->categoriesAvailableProducts as $product)
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <!-- Card Wider -->
                            <div class="card">
                                <!-- Card image -->
                                <div class="view view-cascade overlay">
                                    <img class="card-img-top"
                                         src="{{$product->image}}"
                                         alt="Card image cap">
                                    <a href="#!">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!-- Card content -->
                                <div class="card-body card-body-cascade text-center pb-0">
                                    <!-- Title -->
                                    <h4 class="card-title"><strong>{{$product->title}}</strong></h4>
                                    <!-- Subtitle -->
                                    <h5 class="blue-text pb-2"><small class="text-muted">{{$product->author}}</small></h5>
                                    <!-- Text -->
                                    <p class="card-text">{{$product->description}}</p>

                                    <a class="px-2 fa-lg li-ic"><i class="fa-solid fa-file"></i></a>
                                    <p class="card-text">{{$product->number_pages}}</p>
                                    <a class="px-2 fa-lg li-ic"><i class="fa-solid fa-money-check-dollar"></i></a>
                                    <p class="card-text"><strong>{{number_format($product->price,0,'.','.')}}</strong></p>
                                    <!-- Card footer -->
                                    <div class="card-footer text-muted text-center mt-4">
                                        {{$product->year}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </main>
@endsection
