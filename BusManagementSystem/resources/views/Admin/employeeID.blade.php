@extends('Admin.layouts.index')
@section('main-content')

<div class="container d-flex justify-content-center align-items-center" >

    <div class="row">
      <div class="col-md-12">
        <a class="btn mb-2" href=""  style="background: #F36D44; color:white">Print ID</a>
        <div class="card p-2 shadow-lg rounded " style="background-color: #ee7e5b; max-width: 400px; border-radius:20px;" >
             <div class="row">
                <div class="col-md-3">
                    <img style="border-radius: 40px" src="{{asset('images/anbessa.png')}}" alt="" height="40px">
                </div>
                <div  class="col-md-9">
                    <p style="margin-bottom: -5px">Anbessa city Bus</p>
                    <p>Phone +251 116293379</p>  
                </div>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <p style="margin-bottom: -2px">Name: {{$data->name}}</p>
                    <p style="margin-bottom: -2px">position: {{$data->position}}</p>
                    <p style="margin-bottom: -2px">sex: {{$data->gender}}</p>


                    @php
                        echo '<img style= "max-width: 210px"  src="data:image/png;base64,' . DNS1D::getBarcodePNG($data->name, 'C39+',3,33) . '" alt="barcode"   />';      
                    @endphp
                    {{-- <img src="data:image/png;base64, {{ $barcode }}" alt="barcode"   /> --}}
                </div>
                <div class="col-md-5">
                     <img src="{{asset('images/' . $data->profile)}}" alt="" height="50px" width="100px" style="border-radius: 10px">

                </div>

            </div>
           
               
        </div>
      </div>
    </div>
  </div>
@endsection
