<h1>dashboard</h1>
@php
$count=0;
@endphp
<table border='1'>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Image</th>
    <th>Action</th>
    <th>Total</th>
</tr>
@foreach($image as $image)
    <tr>
        <td>{{$image->id}}</td>
        <td><a href="{{route('show.image')}}">{{$image->name;}}</a></td>
        <td><img src="{{public_path('/storage/uploads/'.$image->p_image.'')}}" alt="" width=150px height=100px></td>
        <td><a href="{{route('download',['p_image'=>$image->p_image])}}">download</a></td>
        </tr>
       @php $count=$count+1; @endphp
@endforeach
<tr>
    <td><td>
    <td></td>
    </td></td>
    <td></td>
    <td> {{$count}} </td>
</tr>
</table>

<a href="{{route('download.pdf')}}">Download PDF</a>