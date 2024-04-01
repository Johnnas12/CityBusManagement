@extends('Admin.layouts.index1')
@section('main-content')
    <div class="container mt-5">
        <div class="card shadow-lg mt-4">
            <div id="panel-2" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Tarrif <span class="fw-300"><i>Edit Form</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                        <form class="needs-validation" novalidate action="{{ route('updateTarrif', $data->id) }}"
                            enctype="multipart/form-data" method="post">
                            @csrf
                            @method('patch')
                            <div class="panel-content">
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom01">Bus Number<span
                                                class="text-danger">*</span> </label>
                                        <input class="form-control" value="{{$data->busnum}}" id="validationCustom01"  type="number" name="busnum"
                                            required>

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
                                        <label class="form-label" for="validationCustom01">From<span
                                                class="text-danger">*</span> </label>
                                        <input class="form-control" value="{{$data->from}}" id="validationCustom01" type="text" name="from"
                                            required>

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
                                        <label class="form-label" for="validationCustom01">To<span
                                                class="text-danger">*</span> </label>
                                        <input class="form-control" id="validationCustom01" value="{{$data->to}}" type="text" name="to" required>
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
                                        <label class="form-label" for="validationCustom01">Via<span
                                                class="text-danger">*</span> </label>

                                        <input type="text" class="form-control" name="via" value="{{$data->via}}">

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
                                        <label class="form-label" for="validationCustom01">Distance (KM)<span
                                                class="text-danger">*</span> </label>
                                        <input type="number" value="{{$data->distance}}" class="form-control" min="0" 
                                        max="1000" step="0.01" name="distance">

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
                                        <label class="form-label" for="validationCustom01">Price<span
                                                class="text-danger">*</span> </label>
                                        <input type="number" value="{{$data->price}}" class="form-control" min="0" 
                                        max="1000" step="0.01" name="price">


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
                                    <div class="col-md-4"></div>
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
