@if(session()->has('message'))
    <div x-data= "{show: true}" x-init="setTimeout(()=> show= false, 6000)" x-show="show" class="fixed text-center top-0 alert alert-success " role="alert" >
            {{session('message')}}  
    </div>
@endif

@if(session()->has('fail'))
    <div x-data= "{show: true}"  x-init="setTimeout(()=> show= false, 6000)" x-show="show" class="fixed text-center text-dark top-0 alert alert-danger" role="alert" >
            {{session('fail')}} 
    </div>
@endif