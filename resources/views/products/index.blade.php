@extends('layouts.base')
@section('title', 'Products')
@section('container')
    <main class="container">
        <h1 class="alert alert-success text-center"><i class="fa-solid fa-book-atlas"></i> &nbsp; list of products</h1>
        <table class="table table-bordered table-stripped">
            <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Author</th>
            <th>Year</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->author}}</td>
                    <td>{{$product->year}}</td>
                    <td>
                        <div class="d-grid"><a href="{{route('products.show',$product)}}" class="btn btn-primary">Show</a>
                        </div>
                    </td>
                    <td>
                        <div class="d-grid"><a href="{{route('products.edit', $product->slug)}}" class="btn btn-success">Edit</a>
                        </div>
                    </td>
                    <td>
                        <form action="{{route('products.destroy', $product)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input
                                type="submit"
                                value="Delete"
                                class="btn btn-danger"
                                onclick=" return confirm('¿Delete {{$product->title}}?')"
                            />
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="cold d-grid">
                <a href="/products/create" class="btn btn-success">Create a new product</a>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    </body>
    </html>
@endsection
