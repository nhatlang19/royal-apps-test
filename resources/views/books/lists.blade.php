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
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Gender</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($authors as $author)
                        <tr>
                            <th scope="row">{{$author['id']}}</th>
                            <td>{{$author['first_name']}}</td>
                            <td>{{$author['last_name']}}</td>
                            <td>{{$author['gender']}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{route('author-view', ['id' => $author['id']])}}" >Detail</a>
                                <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" href="{{route('author-destroy',$author['id'])}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                @php echo str_replace('/?', '?', $authors->links('pn')); @endphp
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection
