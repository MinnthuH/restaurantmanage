@extends('order.main_order')

@section('main')
    <style type="text/css">
        .card.product-box {
        border-radius: 15px;
    }

    .bg-secondary {
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 15px;
        height: 150px;
    }
    </style>
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
                            <li class="breadcrumb-item active">Horizontal</li> --}}
                            </ol>
                        </div>
                        <h4 class="page-title">Tables</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->



            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false"
                                    aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>

                            <div id="cardCollpase5" class="collapse show">
                                <div class="row">
                                    @foreach ($tables as $item )

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 mt-3">
                                        <div class="card product-box">
                                            <a href="{{ route('add.order',$item->id) }}" style="text-decoration: none">
                                            <div class="card-body">
                                                <div class="bg-secondary">
                                                    <img src="{{ asset('backend/assets/icons/table.png') }}" alt="product-pic" class="img-fluid" width="150" height="150" />
                                                </div>
                                                <div class="product-info">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h5 class="font-16 mt-0 sp-line-1 text-center"> {{ $item->name }}</h5>
                                                        </div>
                                                    </div> <!-- end row -->
                                                </div> <!-- end product info-->
                                            </div>
                                        </a>
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    @endforeach
                                </div>
                                </div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div>
@endsection
