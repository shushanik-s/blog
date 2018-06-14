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
    <h2>Edit Your Post</h2><br>
    <form method="post" action="{{action('PostController@update', $id)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" value="{{$post->title}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="content">Content</label>
                <input type="text" class="form-control" name="content" value="{{$post->content}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <input type="file" name="image">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success" style="float:right;">Update</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>