@extends('layouts.master')

@section('content')
    <div class="container h-100 mt-5">


        <div class="row h-100 d-flex justify-content-center align-items-center">


            <div class="col-md-6">
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row mb-4">
                        <div class="form-group col-md-6">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="content">Content</label>
                        <input type="text" class="form-control" id="content" placeholder="content" name="content">
                        @error('content')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-auto mb-4">
                        <select name="categoryId" class="form-select" aria-label="Default select example">
                            <option selected>Select Category</option>
                            @foreach ($categories as $category)
                                <option id="categoryId" value="{{ $category->id }}"> {{ $category->name }} </option>
                            @endforeach
                        </select>
                        @error('categoryId')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="custom-file mb-4">
                        {{-- <label class="custom-file-label" for="image">Choose file</label> --}}
                        <input type="file" class="custom-file-input" id="image" name="image"
                            accept=".jpg, .jpeg, .png, .gif">
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Create Article</button>
                </form>
            </div>
        </div>
    </div>
@endsection
