@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Dashboard</h2>
                </div>
                <div class="panel-body">

                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                    @endif

                    <a href="posts/create" class="btn btn-primary">Create</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td><img src="/images{{$post->imgThumb}}"></td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->content}}</td>

                                    <td><a href="{{action('PostController@edit', $post->id)}}" class="btn btn-warning">Edit</a></td>
                                    <td>
                                        <form action="{{action('PostController@destroy', $post->id)}}" method="post">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                {{--{{ $posts->links() }}--}}

            </div>
        </div>
    </div>
</div>
@endsection
