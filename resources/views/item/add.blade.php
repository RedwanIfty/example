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
        Quantity: <input type="number" name="quantity" placeholder="Quantity" value="{{old('quantity')}}"><br>
        @error('quantity')
            {{$message}}<br>
        @enderror
        <input type="submit" value="Submit">
    </form>
    <h5 style="color:green">{{Session::get('msg')}}</h5>
</body>
</html>