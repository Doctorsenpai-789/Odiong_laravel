@extends('posts.layout')
 
@section('content')
<style>
body{
    background-image: url(https://ih1.redbubble.net/image.1059458921.7824/sn,x1000-pad,750x1000,f8f8f8.u1.jpg);
    background-size:cover;
    font-family: "Times New Roman", Times, serif;
}
table{
    background-color:skyblue;
}
th,td{
    color:white;
    color: black;
}
h2{
    font-family: "Times New Roman", Times, serif;
    font-size: 50px;
}
</style>
    <div class="row" style="margin-top: 6rem;">
        <div class="col-lg-12 margin-tb">
            <div >
            <center>
                <h2>ODIONG Laravel 8 CRUD </h2>
                </center>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>
    <br>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ \Str::limit($value->description, 100) }}</td>
            <td>
                <form action="{{ route('posts.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('posts.show',$value->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('posts.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection