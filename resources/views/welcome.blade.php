@extends('temp')
@section('title','Home')
@section('content')






<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 my-5 p-5 card">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">image</th>
                  </tr>
                </thead>
                <tbody>
               @foreach ($alluser as $user )
               <tr>
                <th scope="row">{{ $loop -> iteration}}</th>
               <td> {{ $user->name }} </td>
               <td> {{ $user->email }} </td>
               <td> <img src=" {{ $user->image }} " style="width: 45px" alt=""> </td>
                <td><img src="" alt=""></td>
            </tr>
               @endforeach

                </tbody>
              </table>


        </div>
    </div>
    </div>





@stop
