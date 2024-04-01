@extends('storeKeeper.layouts.index1')
@section('main-content')
<div class="row">


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
    </div>


    <div class="col-lg-12 option-div" id="div-Engine" >
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Engine components data</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Category</th>
                                <th>component</th>
                                <th>quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($datas as $i => $data)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{$data->category}}</a> </td>
                                <td>{{$data->component}}</td>
                                <td>{{$data->quantity}}</td>                                
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="" style="color:#FFAD4E "><i class="fa fa-pencil-alt"></i></a>
                                    <a href="" style="color: red"><i class="fa fa-trash-alt"></i></a>
                                    <a href="{{route('TarrifshowMore', $data->id)}}" style="color: rgba(148, 207, 212, 0.854)"><i class="fa fa-eye"></i></a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>


    <div class="col-lg-12 option-div" id="div-Electrical" style="display: none">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Electrical Parts</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Category</th>
                                <th>component</th>
                                <th>quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($datas1 as $i => $data)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{$data->category}}</a> </td>
                                <td>{{$data->component}}</td>
                                <td>{{$data->quantity}}</td>                                
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="" style="color:#FFAD4E "><i class="fa fa-pencil-alt"></i></a>
                                    <a href="" style="color: red"><i class="fa fa-trash-alt"></i></a>
                                    <a href="{{route('TarrifshowMore', $data->id)}}" style="color: rgba(148, 207, 212, 0.854)"><i class="fa fa-eye"></i></a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>



    <div class="col-lg-12 option-div" id="div-Suspension" style="display: none">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Suspension and Steering Components</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Category</th>
                                <th>component</th>
                                <th>quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($datas2 as $i => $data)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{$data->category}}</a> </td>
                                <td>{{$data->component}}</td>
                                <td>{{$data->quantity}}</td>                                
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="" style="color:#FFAD4E "><i class="fa fa-pencil-alt"></i></a>
                                    <a href="" style="color: red"><i class="fa fa-trash-alt"></i></a>
                                    <a href="{{route('TarrifshowMore', $data->id)}}" style="color: rgba(148, 207, 212, 0.854)"><i class="fa fa-eye"></i></a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>



    <div class="col-lg-12 option-div" id="div-Brake" style="display: none">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Brake System Components</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Category</th>
                                <th>component</th>
                                <th>quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($datas3 as $i => $data)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{$data->category}}</a> </td>
                                <td>{{$data->component}}</td>
                                <td>{{$data->quantity}}</td>                                
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="" style="color:#FFAD4E "><i class="fa fa-pencil-alt"></i></a>
                                    <a href="" style="color: red"><i class="fa fa-trash-alt"></i></a>
                                    <a href="{{route('TarrifshowMore', $data->id)}}" style="color: rgba(148, 207, 212, 0.854)"><i class="fa fa-eye"></i></a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>



    <div class="col-lg-12 option-div" id="div-Transmission" style="display: none;">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Transmission and Drivetrain Parts</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Category</th>
                                <th>component</th>
                                <th>quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($datas4 as $i => $data)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{$data->category}}</a> </td>
                                <td>{{$data->component}}</td>
                                <td>{{$data->quantity}}</td>                                
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="" style="color:#FFAD4E "><i class="fa fa-pencil-alt"></i></a>
                                    <a href="" style="color: red"><i class="fa fa-trash-alt"></i></a>
                                    <a href="{{route('TarrifshowMore', $data->id)}}" style="color: rgba(148, 207, 212, 0.854)"><i class="fa fa-eye"></i></a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>



    <div class="col-lg-12 option-div" id="div-Cooling" style="display: none;">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Cooling System</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Category</th>
                                <th>component</th>
                                <th>quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($datas5 as $i => $data)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{$data->category}}</a> </td>
                                <td>{{$data->component}}</td>
                                <td>{{$data->quantity}}</td>                                
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="" style="color:#FFAD4E "><i class="fa fa-pencil-alt"></i></a>
                                    <a href="" style="color: red"><i class="fa fa-trash-alt"></i></a>
                                    <a href="{{route('TarrifshowMore', $data->id)}}" style="color: rgba(148, 207, 212, 0.854)"><i class="fa fa-eye"></i></a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>


    <div class="col-lg-12 option-div" id="div-AirConditioning" style="display: none">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Air Conditioning and Heating</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Category</th>
                                <th>component</th>
                                <th>quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($datas6 as $i => $data)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{$data->category}}</a> </td>
                                <td>{{$data->component}}</td>
                                <td>{{$data->quantity}}</td>                                
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="" style="color:#FFAD4E "><i class="fa fa-pencil-alt"></i></a>
                                    <a href="" style="color: red"><i class="fa fa-trash-alt"></i></a>
                                    <a href="{{route('TarrifshowMore', $data->id)}}" style="color: rgba(148, 207, 212, 0.854)"><i class="fa fa-eye"></i></a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>


    <div class="col-lg-12 option-div" id="div-Body" style="display: none;">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Body and Interior Parts</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Category</th>
                                <th>component</th>
                                <th>quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($datas7 as $i => $data)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{$data->category}}</a> </td>
                                <td>{{$data->component}}</td>
                                <td>{{$data->quantity}}</td>                                
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="" style="color:#FFAD4E "><i class="fa fa-pencil-alt"></i></a>
                                    <a href="" style="color: red"><i class="fa fa-trash-alt"></i></a>
                                    <a href="{{route('TarrifshowMore', $data->id)}}" style="color: rgba(148, 207, 212, 0.854)"><i class="fa fa-eye"></i></a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
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
                selectedDiv.style.display = 'block';
            }
        });
    });
</script>