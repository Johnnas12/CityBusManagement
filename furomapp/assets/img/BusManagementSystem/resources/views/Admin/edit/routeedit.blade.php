@extends('Admin.layouts.index1')
@section('main-content')
    <div class="container mt-5">
        <div class="card shadow-lg mt-4">
            <div id="panel-2" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Route <span class="fw-300"><i>Creating Form</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                        <form class="needs-validation" novalidate action="{{route('storeRoute')}}" enctype="multipart/form-data"  method="POST">
                            @csrf
                            <div class="panel-content">
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom01">Starting from<span class="text-danger">*</span> </label>
                                        
                                        <select class="form-control" id="validationCustom01" name="from" id="" required>
                                            @foreach ($datas as $i => $data1 )
                                            <option value="{{$data1->from}}" {{ $data1->from == $data->from ? 'selected' : '' }}>{{$data1->from}}</option>
                                            @endforeach
                                        </select>
                                        
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        @error('fname')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                       @enderror
                                    </div>
                                    <div class="col-md-2"></div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom01">Departure<span class="text-danger">*</span> </label>
                                        
                                        <select class="form-control" id="validationCustom01" name="to" id="" required>

                                            @foreach ($datas as $i => $data1 )
                                            <option value="{{$data1->to}}" {{ $data1->to == $data->to ? 'selected' : '' }}>{{$data1->to}}</option>
                                            @endforeach
                                            
                                            
                                        </select>
            
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        @error('fname')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                       @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom01">Via<span class="text-danger">*</span> </label>
                                        
                                       <input type="text" placeholder="CSV (eg: agona, lancha)" class="form-control" name="via">
            
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        @error('fname')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                       @enderror
                                    </div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom01">Driver<span class="text-danger">*</span> </label>
                                        
                                        <select class="form-control" id="validationCustom01" name="driver" id="" required>
                                            @foreach ($drivers as $i => $driver)
                                            <option value="{{$i}} {{ $driver->name == $i ? 'selected' : '' }}">{{$driver->name}} {{$driver->mname}}</option>
                                            @endforeach
                                            @empty($drivers)
                                            <option disabled>No option available</option>
                                            @endempty
                                            
                                            
                                        </select>
            
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        @error('fname')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                       @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom01">starting time<span class="text-danger">*</span> </label>
                                        
                                       <input type="time" class="form-control" name="starttime">
            
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        @error('fname')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                       @enderror
                                    </div>

                                    <div class="col-md-2"></div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom01">Departure time<span class="text-danger">*</span> </label>
                                        
                                       <input type="time" class="form-control" name="departuretime">
            
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        @error('fname')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                       @enderror
                                    </div>

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4 text-center">
                                        <button class="btn btn-primary" style="background: #F36D44">Create Route</button>
                                    </div>
                                </div>
                            </div>   
                        </form>   
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection

    {{-- <h1>Welcome TO Admin page</h1>


<a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
 {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
 @csrf
</form> --}}
