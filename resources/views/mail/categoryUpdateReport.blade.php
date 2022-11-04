@extends('layouts.base')
@section('title',"Category |{$category->name} ")
@section('container')
    <main class="container">
        <div class="row">
            <h1 class="alert alert-success text-center"><i class="fa-duotone fa-note"></i> {{$category->name}} </h1>
        </div>
        <div class="row">
            <div class="card my-3">
                <div class="row g-8">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$category->name}}</h5>
                            <p class="card-text">Description: {{$category->description}}</p>
                            <p class="card-text"><small class="text-muted">Priority: {{$category->priority}}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
