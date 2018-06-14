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
    <h2>Create Your Post</h2><br/>
    <form method="post" action="{{url('posts')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Title">Title:</label>
                <input type="text" class="form-control" name="title">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Content">Content:</label>
                <input type="text" class="form-control" name="content">
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
                <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>