<h1>dashboard</h1>
<table border='1'>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Image</th>
    <th>Action</th>
</tr>
@foreach($image as $image)
    <tr>
        <td>{{$image->id}}</td>
        <td><a href="{{route('show.image')}}">{{$image->name;}}</a></td>
        <td><img src="{{asset('/storage/uploads/'.$image->p_image.'')}}" alt="" width=150px height=100px></td>
        <td><a href="{{route('download',['p_image'=>$image->p_image])}}">download</a></td>
        </tr>
@endforeach
</table>
<h5>{{Session::get('msg')}}</h5>
<h4>{{Session::has('msg')}}</h4>