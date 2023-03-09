@extends('layouts.app')

@section('template_title')
    {{ (Session::get('user'))['first_name'] }} {{ (Session::get('user'))['last_name'] }} Authors Page
@endsection

@section('template_fastload_css')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <h1>Name: {{ $author['first_name'] }} {{ $author['last_name'] }}</h1>
                <h3>Gender: {{ $author['gender'] }}</h3>
                <h3>Books:</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Release Date</th>
                        <th scope="col">Description</th>
                        <th scope="col">Isbn</th>
                        <th scope="col">Format</th>
                        <th scope="col">Number of pages</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($author['books'] as $book)
                        <tr>
                            <th scope="row">{{$book['id']}}</th>
                            <td>{{$book['title']}}</td>
                            <td>{{$book['release_date']}}</td>
                            <td>{{$book['description']}}</td>
                            <td>{{$book['isbn']}}</td>
                            <td>{{$book['format']}}</td>
                            <td>{{$book['number_of_pages']}}</td>
                            <td>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection
