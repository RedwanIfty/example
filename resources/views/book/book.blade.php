<h1>Book</h1>
@php
 $total=0;
@endphp
<table border='1'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @foreach($book as $b)
    <tr>
        <td>{{$b->id}}</td>
        <td>{{$b->name}}</td>
        <td>{{$b->price}}</td>
        <td>{{$b->status}}</td>
        <td>Action</td>
        @php
            $total=$total+$b->price;
        @endphp
    </tr>
    @endforeach
    <tr>
        @if(Session::has('show'))<td colspan='5'>Total:{{$total}}</td>@endif
        <h5 style="color:green">{{Session::get('show')}}</h5>
    </tr>
</table>
