@extends('storeKeeper.layouts.index1')
@section('main-content')
    <div class="container">
        <div class="card shadow-lg p-4">
            <div id="panel-2" class="panel">
                <div class="panel-hdr">
                    <h5 class="text-center">
                        Spare Parts <span class="fw-300"><i>Consumption Form</i></span>
                    </h5>
                    <hr>
                </div>
                <div class="panel-container show">
                    <div class="panel-content p-0">

                        <div class="panel-content">
                            <div class="form-row text-center">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">Choose Category<span
                                            class="text-danger">*</span> </label>
                                    <select class="custom-select" required="" name="" id="type">
                                        <option value="Engine">Engine Components</option>
                                        <option value="Electrical">Electrical Parts</option>
                                        <option value="Suspension">Suspension and Steering Components</option>
                                        <option value="Brake">Brake System Components</option>
                                        <option value="Transmission">Transmission and Drivetrain Parts</option>
                                        <option value="Cooling">Cooling System</option>
                                        <option value="AirConditioning">Air Conditioning and Heating</option>
                                        <option value="Body">Body and Interior Parts</option>

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
                            </div>
                            <form class="needs-validation" novalidate action="{{ route('storekeeper.decrease') }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="form-row option-div" id="div-Engine" ">

                                    <div class="col-md-4 mb-3">
                                        <input type="hidden" name="category" value="Engine Components">
                                        <label class="form-label" for="validationCustom01">Components<span
                                                class="text-danger">*</span> </label>
                                        <select class="custom-select" required="" name="component" id="">
                                            <option value="Pistons">Pistons</option>
                                            <option value="Cylinders">Cylinders</option>
                                            <option value="bearings">Engine bearings</option>
                                            <option value="Gaskets">Gaskets and seals</option>
                                            <option value="Timing belts or chains">Timing belts or chains</option>
                                            <option value="Fuel injectors">Fuel injectors</option>
                                            <option value="Turbochargers">Turbochargers</option>
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
                                        <label class="form-label" for="validationCustom01">Quantity<span
                                                class="text-danger">*</span> </label>

                                        <input type="text" class="form-control" name="quantity">

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
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 text-center">
                                        <button class="btn btn-primary" style="background: #F36D44">Register Assets</button>
                                    </div>
                            </form>
                        </div>

                        <form class="needs-validation" novalidate action="{{route('storekeeper.decrease') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-row option-div" id="div-Electrical" style="display: none;">

                            <div class="col-md-4 mb-3">
                                <input type="hidden" name="category" value="Electrical Components">
                                <label class="form-label" for="validationCustom01">Components<span
                                        class="text-danger">*</span> </label>
                                <select class="custom-select" required="" name="component" id="type">
                                    <option value="Starter moto">Starter motor</option>
                                    <option value="Alternator">Alternator</option>
                                    <option value="Batteries">Batteries</option>
                                    <option value="Ignition coils">Ignition coils</option>
                                    <option value="Spark plugs">Spark plugs</option>
                                    <option value="Wiring harnesses">Wiring harnesses</option>
                                    <option value="Fuses and relays">Fuses and relays</option>

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
                                <label class="form-label" for="validationCustom01">Quantity<span
                                        class="text-danger">*</span> </label>

                                <input type="text" class="form-control" name="quantity">

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
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-center">
                                <button class="btn btn-primary" style="background: #F36D44">Register Assets</button>
                            </div>
                        </div>
                        </form>


                        <form class="needs-validation" novalidate action="{{route('storekeeper.decrease') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-row option-div" id="div-Suspension" style="display: none;">
                            <div class="col-md-4 mb-3">
                                <input type="hidden" name="category" value="Suspension and Steering Components">
                                <label class="form-label" for="validationCustom01">Components<span
                                        class="text-danger">*</span> </label>
                                <select class="custom-select" required="" name="component" id="type">
                                    <option value="Shock absorbers">Shock absorbers</option>
                                    <option value="Struts">Struts</option>
                                    <option value="Control arms">Control arms</option>
                                    <option value="Tie rod ends">Tie rod ends</option>
                                    <option value="Power steering pump">Power steering pump</option>
                                    <option value="Steering rack or gearbox">Steering rack or gearbox</option>
                                    <option value="Ball joints">Ball joints</option>
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
                                <label class="form-label" for="validationCustom01">Quantity<span
                                        class="text-danger">*</span> </label>

                                <input type="text" class="form-control" name="quantity">

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
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-center">
                                <button class="btn btn-primary" style="background: #F36D44">Register Assets</button>
                            </div>
                        </div>
                        </form>



                        <form class="needs-validation" novalidate action="{{route('storekeeper.decrease') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-row option-div" id="div-Brake" style="display: none;">
                            <div class="col-md-4 mb-3">
                                <input type="hidden" name='category' value="Brake System">
                                <label class="form-label" for="validationCustom01">Components<span
                                        class="text-danger">*</span> </label>
                                <select class="custom-select" required="" name="component" id="type">
                                    <option value="Brake pads">Brake pads</option>
                                    <option value="Brake rotors or drums">Brake rotors or drums</option>
                                    <option value="Brake calipers">Brake calipers</option>
                                    <option value="Brake lines and hoses">Brake lines and hoses</option>
                                    <option value="Master cylinder">Master cylinder</option>
                                    <option value="ABS sensors">ABS sensors</option>
                                    <option value="Brake fluid reservoir">Brake fluid reservoir</option>
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
                                <label class="form-label" for="validationCustom01">Quantity<span
                                        class="text-danger">*</span> </label>

                                <input type="text" class="form-control" name="quantity">

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
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-center">
                                <button class="btn btn-primary" style="background: #F36D44">Register Assets</button>
                            </div>
                        </div>
                        </form>


                        <form class="needs-validation" novalidate action="{{route('storekeeper.decrease') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-row option-div" id="div-Transmission" style="display: none;">
                            <div class="col-md-4 mb-3">
                                <input type="hidden" name='category' value="Transmission and Drivetrain">

                                <label class="form-label" for="validationCustom01">Components<span
                                        class="text-danger">*</span> </label>
                                <select class="custom-select" required="" name="component" id="type">
                                    <option value="Clutch kit">Clutch kit</option>
                                    <option value="Transmission fluid">Transmission fluid</option>
                                    <option value="Drive belts">Drive belts</option>
                                    <option value="CV joints">CV joints</option>
                                    <option value="Axles">Axles</option>
                                    <option value="Differential components">Differential components</option>
                                    <option value="Transmission filters">Transmission filters</option>
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
                                <label class="form-label" for="validationCustom01">Quantity<span
                                        class="text-danger">*</span> </label>

                                <input type="text" class="form-control" name="quantity">

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
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-center">
                                <button class="btn btn-primary" style="background: #F36D44">Register Assets</button>
                            </div>
                        </div>
                        </form>



                        <form class="needs-validation" novalidate action="{{route('storekeeper.decrease') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-row option-div" id="div-Cooling" style="display: none;">
                            <div class="col-md-4 mb-3">
                                <input type="hidden" name='category' value="Cooling System">
                                <label class="form-label" for="validationCustom01">Components<span
                                        class="text-danger">*</span> </label>
                                <select class="custom-select" required="" name="component" id="type">
                                    <option value="Radiator">Radiator</option>
                                    <option value="Water pump">Water pump</option>
                                    <option value="Thermostat">Thermostat</option>
                                    <option value="Radiator hoses">Radiator hoses</option>
                                    <option value="Cooling fans">Cooling fans</option>
                                    <option value="Heater core">Heater core</option>
                                    <option value="Coolant reservoir">Coolant reservoir</option>
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
                                <label class="form-label" for="validationCustom01">Quantity<span
                                        class="text-danger">*</span> </label>

                                <input type="text" class="form-control" name="quantity">

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
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-center">
                                <button class="btn btn-primary" style="background: #F36D44">Register Assets</button>
                            </div>
                        </div>
                        </form>


                        <form class="needs-validation" novalidate action="{{route('storekeeper.decrease') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-row option-div" id="div-AirConditioning" style="display: none;">
                            <div class="col-md-4 mb-3">
                                <input type="hidden" name='category' value="Air Conditioning">
                                <label class="form-label" for="validationCustom01">Components<span
                                        class="text-danger">*</span> </label>
                                <select class="custom-select" required="" name="component" id="type">
                                    <option value="Compressor">Compressor</option>
                                    <option value="Condenser">Condenser</option>
                                    <option value="Evaporator">Evaporator</option>
                                    <option value="Expansion valve">Expansion valve</option>
                                    <option value="Heater control valve">Heater control valve</option>
                                    <option value="AC refrigerant">AC refrigerant</option>
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
                                <label class="form-label" for="validationCustom01">Quantity<span
                                        class="text-danger">*</span> </label>

                                <input type="text" class="form-control" name="quantity">

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
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-center">
                                <button class="btn btn-primary" style="background: #F36D44">Register Assets</button>
                            </div>
                        </div>
                        </form>

                        <form class="needs-validation" novalidate action="{{route('storekeeper.decrease') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-row option-div" id="div-Body" style="display: none;">
                            <div class="col-md-4 mb-3">
                                <input type="hidden" name='category' value="Body and Interior">

                                <label class="form-label" for="validationCustom01">Components<span
                                        class="text-danger">*</span> </label>
                                <select class="custom-select" required="" name="component" id="type">
                                    <option value="Mirrors">Mirrors</option>
                                    <option value="Headlights">Headlights</option>
                                    <option value="Tail lights">Tail lights</option>
                                    <option value="Bumpers">Bumpers</option>
                                    <option value="Door handles">Door handles</option>
                                    <option value="Window regulators">Window regulators</option>
                                    <option value="Seats and seat covers">Seats and seat covers</option>

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
                                <label class="form-label" for="validationCustom01">Quantity<span
                                        class="text-danger">*</span> </label>

                                <input type="text" class="form-control" name="quantity">

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
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-center">
                                <button class="btn btn-primary" style="background: #F36D44">Register Assets</button>
                            </div>
                        </div>
                        <form>


                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<script>
    // In your JavaScript section or external file

    document.addEventListener('DOMContentLoaded', function() {
        var selectOption = document.getElementById('type');
        var optionDivs = document.getElementsByClassName('option-div');

        selectOption.addEventListener('change', function() {
            var selectedValue = this.value.replace(/\d+$/, ''); // Remove the number at the end

            // Hide all option divs
            for (var i = 0; i < optionDivs.length; i++) {
                optionDivs[i].style.display = 'none';
            }

            // Show the selected option div
            var selectedDiv = document.getElementById('div-' + selectedValue);
            if (selectedDiv) {
                selectedDiv.style.display = 'flex';
            }
        });
    });
</script>
