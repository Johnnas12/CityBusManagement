<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <title>Registration</title>

    
    <link rel="icon" sizes="180x180" href="{{ asset('admin/images/elliptical_logo.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />




    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="{{asset('tamplate/css/vendors.bundle.css')}}">
    <link rel="icon" sizes="180x180" href="{{ asset('admin/images/elliptical_logo.png') }}">

    <link id="appbundle" rel="stylesheet" media="screen, print" href="{{asset('tamplate/css/app.bundle.css')}}">

    {{-- <link id="myskin" rel="stylesheet" media="screen, print" href="{{asset('tamplate/css/skins/skin-master.css')}}">
    <link rel="stylesheet" media="screen, print" href="{{asset('tamplate/css/site.css') }}">
    <link rel="stylesheet" href=" {{asset('tamplate/css/site.css')}}"> --}}

    {{-- <link rel="stylesheet" media="screen, print" href="{{asset('tamplate/css/miscellaneous/reactions/reactions.css')}}">
    <link rel="stylesheet" media="screen, print" href="{{asset('tamplate/css/formplugins/full.calendar.html/fullcalendar.bundle.css')}}">
    <link rel="stylesheet" media="screen, print" href="{{asset('tamplate/css/miscellaneous/jqvmap/jqvmap.bundle.css')}}"> --}}
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}

  </head>
<body>

    <div class="container mt-5 ">
  
    <div id="panel-2" class="panel">
        <div class="panel-hdr">
            <h2>
                User  <span class="fw-300"><i>Registration Form</i></span>
            </h2>
        </div>

        <div class="panel-container show">
    
            <div class="panel-content p-0">
                <form class="needs-validation" novalidate action="{{ route('store') }}" enctype="multipart/form-data"  method="POST">
                    @csrf
                    <div class="panel-content">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustom01">First name <span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" name="name" id="validationCustom01" placeholder="First name"  required>
    
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
                                <label class="form-label" for="validationCustom02">Middle name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="mname" id="validationCustom02" placeholder="Middle name"  required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                @error('mname')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                               @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustom02">Last name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="lname" id="validationCustom02" placeholder="Last name"  required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                @error('lname')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                               @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustomUsername">Username <span class="text-danger">*</span></label>
                                <div class="input-group">
                                
                                    <input type="text" class="form-control" name="username" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                    @error('username')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                               @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustomUsername">Phone Number <span class="text-danger">*</span></label>
                                <div class="input-group">
    
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><img src="images/Flag_of_Ethiopia.svg.png" style="max-height: 10px" alt=""></span>
                                    </div>
                                    <input class="form-control" type="tel" maxlength="13" name="phone" pattern="\+?[0-9]+{13}" onkeypress="return isPhoneNumber(event)" value="+251" id="phone">
                                    <div class="invalid-feedback">
                                        Please Provide a Phone Number.
                                    </div>
                                    @error('phone')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                               @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustomUsername">Email Address <span class="text-danger">*</span></label>
                                <div class="input-group">
    
                                    <input class="form-control" type="email"  name="email"    id="email">
                                    <div class="invalid-feedback">
                                        Please Provide a Email.
                                    </div>
                                    @error('email')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                               @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row form-group">
    
    
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustom03">Role Type <span class="text-danger">*</span></label>
                                <select class="custom-select" required="" name="role" id="type">
    
                                         <option value="0">SystemAdmin</option>
                                         <option value="1">Admin</option>
                                         <option value="2">Driver</option>
                                         <option value="3">Maintainance</option>
                                         
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid Role.
                                </div>
                                @error('role')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                               @enderror
                            </div>
            

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustom05">Position <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="validationCustom05" name="position" placeholder="Position " required>
                                <div class="invalid-feedback">
                                    Please provide a valid Position.
                                </div>
                                @error('position')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                               @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustom05">Age<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="validationCustom05" name="age" placeholder="Age" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Position.
                                </div>
                                @error('age')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                               @enderror
                            </div>

                            
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustom05">Expriance<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="validationCustom05" name="expriance" placeholder="Expriance" required>
                                <div class="invalid-feedback">
                                    Please provide a valid year of expriance.
                                </div>
                                @error('expriance')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                               @enderror
                            </div>
    
                            <input class="form-control"  type="hidden" name="password"  value="12345678" id="password">
                            <input class="form-control"  type="hidden" name="cpassword" value="12345678" id="password">
    
                            @error('password')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                             @enderror

                            <div class="col-4">
                                <label class="form-label mb-2">Gender <span class="text-danger">*</span></label>
                                <div class="custom-control custom-radio mb-2">
                                    <input type="radio" class="custom-control-input" value="male" id="GenderMale" name="gender" required="">
                                    <label class="custom-control-label" for="GenderMale">Male</label>
                                </div>
                                <div class="custom-control custom-radio mb-2">
                                    <input type="radio" class="custom-control-input" value="female" id="GenderFemale" name="gender" required="">
                                    <label class="custom-control-label" for="GenderFemale">Female</label>
                                </div>
    
                            </div>
                            @error('gender')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                               @enderror


                            <div class="form-group col-4">
                                <label class="form-label">Choose Profile Picture</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="profile" id="customControlValidation7" >
                                    <label class="custom-file-label" for="customControlValidation7">Choose file...</label>
                                    <div class="invalid-feedback">Please Upload Your Profile</div>
                                </div>
                            </div>
                            @error('profile')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                               @enderror
                        </div>
                    </div>
                    <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
    
                        <button class="btn btn-primary ml-auto" type="submit" style="background-color:#eb8033">Submit form</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <body>
</html>

            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function()
                {
                    'use strict';
                    window.addEventListener('load', function()
                    {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form)
                        {
                            form.addEventListener('submit', function(event)
                            {
                                if (form.checkValidity() === false)
                                {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();

            </script>
        </div>
    </div>
</div>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

{{-- <script>
    function isPhoneNumber(event) {
    const charCode = event.which ? event.which : event.keyCode;
    const charValue = String.fromCharCode(charCode);

    // Allow only numbers and the "+" sign
    if (!/[\d+]/.test(charValue)) {
        event.preventDefault();
        return false;
    }

    return true;
   }

</script> --}}


{{-- <script>
    $('#region').change(function() {
        var regionId = $(this).val();
        if (regionId) {
            $.get('/get-zone/' + regionId, function(data) {
                $('#zone').empty();
                $('#zone').append('<option value="">Select Zone</option>');
                $.each(data, function(index, zone) {
                    $('#zone').append('<option value="' + zone.id + '">' + zone.name +
                        '</option>');
                });
            });
        } else {
            $('#zone').empty();
            $('#woreda').empty();
        }
    });

    $('#zone').change(function() {
        var zoneId = $(this).val();
        if (zoneId) {
            $.get('/get-woreda/' + zoneId, function(data) {
                $('#woreda').empty();
                $('#woreda').append('<option value="">Select Woreda</option>');
                $.each(data, function(index, woreda) {
                    $('#woreda').append('<option value="' + woreda.id + '">' + woreda.name +
                        '</option>');
                });
            });
        } else {
            $('#woreda').empty();
        }
    });

    // Fetch and set the name based on the selected ID
    $('#region').change(function() {
        var regionId = $(this).val();
        if (regionId) {
            $.get('/get-region-name/' + regionId, function(data) {
                // Update the form field with the fetched name
                $('#selected_region_name').val(data.name);
            });
        } else {
            $('#selected_region_name').val('');
        }
    });

    $('#zone').change(function() {
        var zoneId = $(this).val();
        if (zoneId) {
            $.get('/get-zone-name/' + zoneId, function(data) {
                // Update the form field with the fetched name
                $('#selected_zone_name').val(data.name);
            });
        } else {
            $('#selected_zone_name').val('');
        }
    });

    $('#woreda').change(function() {
        var woredaId = $(this).val();
        if (woredaId) {
            $.get('/get-woreda-name/' + woredaId, function(data) {
                // Update the form field with the fetched name
                $('#selected_woreda_name').val(data.name);
            });
        } else {
            $('#selected_woreda_name').val('');
        }
    });
</script> --}}






{{-- 

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize the phone input
        $("#phone").intlTelInput({
            initialCountry: "auto",
            separateDialCode: true,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/utils.js",
        });
    });
</script> --}}
