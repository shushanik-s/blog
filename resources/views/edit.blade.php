<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit a Post</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    @if (Auth::guest())
        <p class="mt-5">Please, <a href="/login/">login</a> to continue.</p>
    @else
        <h2>Edit Your Post</h2><br>
        <form method="post" action="{{action('PostController@update', $id)}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4 {{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" value="{{$post->title}}">

                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4 {{ $errors->has('content') ? ' has-error' : '' }}">
                    <label for="content">Content</label>
                    <input type="text" class="form-control" name="content" value="{{$post->content}}">

                    @if ($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4 {{ $errors->has('content') ? ' has-error' : '' }}">
                    <input type="file" name="image">

                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-success" style="float:right;">Update</button>
                </div>
            </div>
        </form>
    @endif
</div>
</body>
</html>