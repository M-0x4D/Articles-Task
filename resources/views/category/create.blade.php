@extends('layouts.master')

@section('content')
    <div class="container h-100">


        <div class="row h-100 d-flex justify-content-center align-items-center">


            <div class="col-md-6">
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label class="mx-auto mt-4" for="name">Category Name :</label>
                    <input placeholder="Enter Category Name" class="form-control mt-4" type="text" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <br>

                    <button class="btn btn-primary" type="submit">Create Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
