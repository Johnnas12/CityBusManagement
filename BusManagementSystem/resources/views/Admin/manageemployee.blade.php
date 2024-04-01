@extends('Admin.layouts.index')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Manage Employee</h4>
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
                                <th>first name</th>
                                <th>middle name</th>
                                <th>last name</th>
                                <th>position</th>
                                <th>phone</th>
                                <th>Age</th>
                                <th>gender</th>
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
                                <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{$data->name}}</a> </td>
                                <td>{{$data->mname}}</td>
                                <td>{{$data->lname}}</td>
                                <td>{{$data->position}}</td>
                                <td>
                                    {{$data->phone}} 

                                    {{-- <span class="badge badge-pill badge-soft-success font-size-12">Paid</span> --}}
                                </td>
                                <td>{{$data->age}}</td>
                                <td>{{$data->gender}}</td>

                                <td>
                                    <i class="fab fa-money mr-1"></i> {{$data->price}} ETB
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="" style="color:#FFAD4E "><i class="fa fa-pencil-alt"></i></a>
                                    <a href="" style="color: red"><i class="fa fa-trash-alt"></i></a>
                                    <a href="{{route('employeeId', $data->id)}}" style="color: rgba(148, 207, 212, 0.854)"><i class="fa fa-eye"></i></a>
                                    
                                    
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