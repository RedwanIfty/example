<form action="" method="post">
     {{ csrf_field() }}
    <label>E-mail:</label>
    <input type="text" name="email"><br><br>
    @error('email')
        {{$message}}
    @enderror
    <br><br>
    <input type="submit" name="submit" value="Upload">
</form>