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
                <form method="POST" action="{{ route('book-save') }}">
                    @csrf
                    <div class="form-group">
                        <label for="author">Authors</label>
                        <select class="form-control" id="author" name="author">
                            @foreach ($authors['items'] as $author)
                                <option value="{{$author['id']}}">{{$author['first_name']}} {{$author['last_name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" required class="form-control" name="title" id="title" aria-describedby="title" placeholder="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" required name="description" id="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="isbn">Isbn</label>
                        <input type="text" class="form-control" required name="isbn" id="isbn" aria-describedby="isbn" placeholder="isbn">
                    </div>
                    <div class="form-group">
                        <label for="format">Format</label>
                        <input type="text" class="form-control" required name="format" id="format" aria-describedby="format" placeholder="format">
                    </div>
                    <div class="form-group">
                        <label for="number_of_pages">Number Of Pages</label>
                        <input type="text" class="form-control" required name="number_of_pages" id="number_of_pages" aria-describedby="number_of_pages" placeholder="number_of_pages">
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection
