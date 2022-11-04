@extends('layouts.base')
@section('title', 'Create a new category')
@section('container')
    <main class="container">
        <h1 class="alert alert-success text-center"><i class="fa-solid fa-border-none"></i> &nbsp; Create a new category</h1>
        <form method="POST" action="{{route('categories.store')}}">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Gender category</label>
                        <input type="text" class="form-control" name="name" id="name"
                               aria-describedby="name" value="{{old('name')}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description">{{old('description')}}</textarea>
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <input type="number" value="{{old('priority')}}" name="priority" class="form-control" stop="0">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </main>
@endsection
