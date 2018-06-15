<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create Your Post</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    @if (Auth::guest())
        <p class="mt-5">Please <a href="/login/">login</a> to add a new post.</p>
    @else
        <h2>Create Your Post</h2><br/>
        <form method="post" action="{{url('posts')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4 {{ $errors->has('title') ? ' has-error' : '' }}" >
                    <label for="Title">Title:</label>
                    <input type="text" class="form-control" name="title">

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
                    <label for="Content">Content:</label>
                    <input type="text" class="form-control" name="content">

                    @if ($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4 {{ $errors->has('image') ? ' has-error' : '' }}">
                    <input type="file" name="image">
                </div>

                @if ($errors->has('image'))
                    <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                @endif
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                </div>
            </div>
        </form>
    @endif
</div>
</body>
</html>