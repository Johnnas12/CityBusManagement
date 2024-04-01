@extends('Admin.layouts.index')
@section('main-content')

<div class="container d-flex justify-content-center align-items-center" >

    <div class="row">
      <div class="col-md-12">
        <a class="btn mb-2" href="{{route('tarrifEdit', $data->id)}}"  style="background: #F36D44; color:white">Edit Data</a>
        <div class="card p-4 shadow-lg rounded align-items-center">
            <h4>From- {{$data->from}} To - {{$data->to}}</h4>
            <h5>Via - {{$data->via}}</h5>
            <h5>Bus Number - {{$data->busnum}}</h5>
            <h5>Distance - {{$data->distance}} KM</h5>
            <h5>Price - {{$data->price}} ETB</h5>   
        </div>
      </div>
    </div>
  </div>
@endsection
