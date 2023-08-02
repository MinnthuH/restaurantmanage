@extends('main_dashboard')


@section('main')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Restraunt Management</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>


        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            {{-- <div class="col"> --}}
                <div class="card m-5">
                    <a href=""><img style="width: 10rem" src="{{asset('assets/icons/restaurant.png')}}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                       <a href="" style="text-decoration: none"><h5 class="card-title text center">Management</h5></a>

                    </div>
                </div>
                <div class="card m-5">
                    <a href=""><img style="width: 10rem" src="{{asset('assets/icons/cash-machine.png')}}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                       <a href="" style="text-decoration: none"> <h5 class="card-title text center">Cashier</h5></a>

                    </div>
                </div>
                <div class="card m-5">
                    <a href=""><img style="width: 10rem" src="{{asset('assets/icons/monitor.png')}}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                       <a href="" style="text-decoration: none"> <h5 class="card-title text center">Report</h5></a>

                    </div>
                </div>
            {{-- </div> --}}

        </div>



    </div>
@endsection
