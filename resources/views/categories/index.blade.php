@extends('layouts.base')
@section('title', 'Categories')
@section('container')
    <main class="container">
        <h1 class="alert alert-success text-center"><i class="fa-solid fa-border-none"></i> &nbsp; Category list</h1>
        <table class="table table-bordered table-stripped">
            <thead>
            <th>ID</th>
            <th>Genre</th>
            <th>Description</th>
            <th>Priority</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{$category->priority}}</td>
                    <td>
                        <div class="d-grid"><a href="{{route('categories.show',$category)}}" class="btn btn-primary">Show</a>
                        </div>
                    </td>
                    <td>
                        <div class="d-grid"><a href="{{route('categories.edit', $category)}}" class="btn btn-success">Edit</a>
                        </div>
                    </td>
                    <td>
                        <form action="{{route('categories.destroy', $category)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input
                                type="submit"
                                value="Delete"
                                class="btn btn-danger"
                                onclick=" return confirm('¿Delete {{$category->name}}?')"
                            />
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="cold d-grid">
                <a href="/categories/create" class="btn btn-success">Create a new category</a>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    </body>
    </html>
@endsection
