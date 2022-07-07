<form action="" method="post" enctype="multipart/form-data">
     {{ csrf_field() }}
    <label>Name:</label>
    <input type="text" name="name"><br><br>
    @error('name')
        {{$message}}
    @enderror
    <br><br>
    <label>Select Image File:</label>
    <input type="file" name="p_image">
    <br><br>
    @error('p_image')
        {{$message}}
    @enderror
    <br><br>
    <input type="submit" name="submit" value="Upload">
</form>