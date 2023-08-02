@extends('main_dashboard')

@section('admin')
@section('title')
    Add Menu | Pencil Restraurant System
@endsection

<script src="{{ asset('backend/assets/jquery.js') }}"></script>
<!-- Plugins css -->
<link href="{{ asset('backend/assets/libs/mohithg-switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/libs/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet"
    type="text/css" />



<link href="{{ asset('backend/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet"
    type="text/css" />

<!-- Bootstrap css -->
<link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App css -->
<link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
<!-- icons -->
<link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Head js -->
<script src="{{ asset('backend/assets/js/head.js') }}"></script>


<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">

                    </div>
                    <h4 class="page-title">ကုန်ပစ္စည်းအသစ် ထည့်ရန်</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-8 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-pane" id="settings">
                            <form id="myForm" method="post" action="{{ route('store.menu') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Add Menu
                                </h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">မီနူး အမည်</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="category" class="form-label">အမျိုးအစား</label>
                                            <select name="category_id" class="form-select" id="example-select">
                                                <option selected disabled>အမျိုးအစား အရွေးချယ်ပါ</option>

                                                @foreach ($category as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">ဈေးနှုန်း</label>
                                            <input type="number" name="price" class="form-control">
                                        </div>
                                    </div>
                                    <!-- end col -->

                                    {{-- meal tag  --}}

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Meal Tag</label>
                                            <input type="text" id="selectize-tags" name="mealtag" value="Chiken, Pork">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <legend class="col-form-label col-sm-3 pt-0">Menu Status</legend>
                                        <div class="mt-3">
                                            <div class="form-check">
                                                <input type="radio" id="customRadio1" value="available" name="status"
                                                    class="form-check-input" checked>
                                                <label class="form-check-label" for="customRadio1"
                                                    >Available </label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="customRadio2" name="status"
                                                    class="form-check-input" value="notavailable">
                                                <label class="form-check-label" for="customRadio2">Tempory Out of
                                                    Service</label>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->


                                    <div class="col-md-6">
                                        <label for="example-textarea" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="example-textarea" rows="5"></textarea>
                                    </div>





                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="lastname" class="form-label">မီးနူး ဓါတ်ပုံ</label>
                                            <input type="file" id="image" name="image"
                                                class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                                class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                        </div>
                                    </div> <!-- end col -->

                                </div> <!-- end row -->

                                <div class="text-end">
                                    <button type="submit" class="btn btn-blue waves-effect waves-light mt-2"><i
                                            class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->

                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->

</div> <!-- content -->


<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                name: {
                    required: true,
                },
                category_id: {
                    required: true,
                },
                price: {
                    required: true,
                },

                description: {
                    required: true,
                },
                status: {
                    required: true,
                },
                mealtag: {
                    required: true,
                },
                image: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: 'ကျေးဇူးပြုပြီး အမည်ထည့်ပါ',
                },
                category_id: {
                    required: 'ကျေးဇူးပြုပြီး အမျိုးအစားရွေးပါ',
                },
                price: {
                    required: 'ကျေးဇူးပြုပြီး ဈေးနှုန်းထည့်ပါ',
                },
                description: {
                    required: 'ကျေးဇူးပြုပြီး Description ထည့်ပါ',
                },
                status: {
                    required: 'ကျေးဇူးပြုပြီး Menu Status ရွေးချယ်ပါ',
                },
                mealtag: {
                    required: 'ကျေးဇူးပြုပြီး Meal Tag ရွေးချယ်ပါ',
                },
                image: {
                    required: 'ကျေးဇူးပြုပြီး ဟင်းပွဲပုံထည့်ပါ',
                },

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>

<!-- Vendor js -->
<script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

<script src="{{ asset('backend/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/mohithg-switchery/switchery.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/multiselect/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('backend/assets/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/jquery-mockjax/jquery.mockjax.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>

<!-- Init js-->
<script src="{{ asset('backend/assets/js/pages/form-advanced.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('backend/assets/js/app.min.js') }}"></script>

@endsection
