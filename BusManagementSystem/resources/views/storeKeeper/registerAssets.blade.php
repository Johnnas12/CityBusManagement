@extends('storeKeeper.layouts.index1')
@section('main-content')
    <div class="container ">
        <div class="card shadow-lg p-4">
            <div id="panel-2" class="panel">
                <div class="panel-hdr">
                    <h5 class="text-center">
                        Bus <span class="fw-300">Registration Form</span>
                    </h5>
                    <hr>
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">
                        <form class="needs-validation" novalidate action="{{ route('storekeeper.storeBuses') }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="panel-content">
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label" for="validationCustom01">Plate Number<span
                                                class="text-danger">*</span> </label>
                                        <input class="form-control" id="validationCustom01"  type="number" name="plate"
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
                                        <label class="form-label" for="validationCustom01">Bus Model<span
                                                class="text-danger">*</span> </label>
                                                <select class="custom-select" required="" name="model" id="type">
                                                    <option value="Mercedes-Benz O321">Mercedes-Benz O321</option>
                                                    <option value="Mercedes-Benz OF">Mercedes-Benz OF</option>
                                                    <option value="Volvo B7F">Volvo B7F</option>
                                                    <option value="Mercedes-Benz OF1621">Mercedes-Benz OF1621</option>             
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
                                        <label class="form-label" for="validationCustom01">Manufacturer<span
                                                class="text-danger">*</span> </label>
                                                <select class="custom-select" required="" name="manufacturer" id="type">
                                                    <option value="Mercedes">Mercedes</option>
                                                    <option value="volvo">volvo</option>
                                                    <option value="Scania">Scania </option>          
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
                                        <label class="form-label" for="validationCustom01">Year of Manufacture<span
                                                class="text-danger">*</span> </label>

                                        <input type="text" class="form-control" name="yearofmanufacture">

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
                                        <label class="form-label" for="validationCustom01">Seating Capacity<span
                                                class="text-danger">*</span> </label>
                                        <input type="number" class="form-control" min="0" 
                                        max="1000" step="0.01" name="seatcapacity">

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
                                        <label class="form-label" for="validationCustom01">Fuel Type<span
                                                class="text-danger">*</span> </label>
                                                <select class="custom-select" required="" name="fuel" id="type">
                                                    <option value="diesel">diesel</option>
                                                    <option value="gasoline">gasoline</option>
                                                    <option value="electric">electric </option>          
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
                                        <label class="form-label" for="validationCustom01">Vehicle Identification Number (VIN)<span
                                                class="text-danger">*</span> </label>
                                        <input type="number" class="form-control" min="0" 
                                        max="1000" step="0.01" name="vin">


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
                                        <label class="form-label" for="validationCustom01">Transmission Type<span
                                                class="text-danger">*</span> </label>

                                        <select class="custom-select" required="" name="transmission" id="type">
                                            <option value="manual">manual</option>
                                            <option value="automatic">automatic</option>       
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
                                        <label class="form-label" for="validationCustom01">Status<span
                                                class="text-danger">*</span> </label>

                                        <select class="custom-select" required="" name="status" id="type">
                                            <option value="Working">Working</option>
                                            <option value="on Maintainance">on Maintainance</option> 
                                            <option value="out of service">out of service</option>       

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
