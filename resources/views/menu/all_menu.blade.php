@extends('main_dashboard')


@section('admin')
@section('title')
    All Category | Pencil Restraurant System
@endsection
<script src="{{ asset('backend/assets/jquery.js') }}"></script>
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">

                            <a href="{{ route('add.menu') }}"
                                class="btn btn-blue rounded-pill waves-effect waves-light">မီးနူး အသစ်ထည့်ရန်</a>

                        </ol>
                    </div>
                    <h4 class="page-title">မီးနူး စာရင်း</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>စဉ်</th>
                                    <th>ဓါတ်ပုံ</th>
                                    <th>အမည်</th>
                                    <th>အမျိုးအစား</th>
                                    <th>အခြေအနေ</th>
                                    <th>ရရှိနိုင်သော အသားများ</th>
                                    <th>ဈေးနှုန်း</th>
                                    <th>လုပ်ဆောင်ချက်</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($menu as $key => $menu)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ asset($menu->image) }}" style="width:50px;height:40px;"
                                                alt=""></td>
                                        <td>{{ $menu->name }}</td>
                                        <td>{{ $menu['category']['name'] ?? 'N/A' }}</td>
                                        <td>{{ $menu->status }}</td>
                                        <td>{{ $menu->mealtag }}</td>
                                        <td>{{ $menu->price }}</td>
                                        <td>

                                            <a href="{{ route('edit.menu',$menu->id) }}" class="btn btn-primary sm" title="Edit Data"><i
                                                    class="far fa-edit"></i></a>


                                            <a href="{{ route('delete.menu',$menu->id) }}" class="btn btn-danger sm" title="Delete Data"
                                                id="delete"><i class="fas fa-trash-alt"></i></a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->


    </div> <!-- container -->

</div> <!-- content -->

@endsection
