@extends('layouts.master')
@include('sweetalert::alert')

@section('content')
    <section class="container">

        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h1> Articles </h1>
                <form action="{{ route('articles.index') }}" method="GET">
                    @csrf
                    <div class="row g-3 my-4">
                        <div class="col-auto">
                            <select name="categoryId" class="form-select" aria-label="Default select example">
                                <option selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>

                    </div>

                </form>


            </div>
        </div>


        <div class="row row-cols-1 row-cols-md-3 g-4">

            @foreach ($articles as $article)
                {{-- @dd($article->image) --}}
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('storage/files/files/' . $article->image) }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $article->title }} </h5>
                            <p class="card-text"> {{ $article->content }} </p>
                            <button type="button" class="btn btn-primary">View</button>
                        </div>
                    </div>
                </div>
            @endforeach




        </div>

    </section>

    <div class="pagination justify-content-center mt-5">
        {!! $articles->links('article.customPagination') !!}
    </div>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
                            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
                        </script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
                            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
                        </script>
                        -->
@endsection
