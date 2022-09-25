@extends('temp')
@section('title','Home')
@section('content')




<div class="container">
<div class="row justify-content-center">
    <div class="col-6 my-5 p-5 card">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
        <form action="{{ route('insert.data') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="card-header my-3" >AddUser</h1>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"> User name</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}"  id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            </div>


            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            </div>


            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="exampleInputPassword1">
              @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            </div>


            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Image</label>
              <input type="file" class="form-control" name="image" id="exampleInputPassword1">
              @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

    </div>
</div>
</div>




@stop
