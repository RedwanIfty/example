<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
        {{@csrf_field()}}
        Name: <input type="text" name="name" placeholder="Name" value="{{old('name')}}"><br>
        @error('name')
            {{$message}}<br>
        @enderror
        Price: <input type="text" name="price" placeholder="Price" value="{{old('price')}}"><br>
        @error('price')
            {{$message}}<br>
        @enderror
        <input type="submit" value="Submit">
    </form>
    <h5 style="color:green">{{Session::get('msg')}}</h5>
</body>
</html>