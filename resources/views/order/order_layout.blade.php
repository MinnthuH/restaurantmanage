@extends('order.main_order')

@section('main')
@section('title')
    Order| Pencil Restraurant System
@endsection
{{-- jquery link  --}}
<script src="{{ asset('backend/assets/jquery.js') }}"></script>


<style type="text/css">
    /* CSS for the search input field */
    #searchInput {
        width: 100%;
        max-width: 400px;
        /* Adjust the maximum width as per your design */
        margin: 0 auto;
        /* To center the input field horizontally */
    }

    /* CSS for the product cards */
    .col-lg-3.col-md-3.col-sm-6.col-6.mt-3 {
        /* Adjust the card styling as per your design */
    }

    /* CSS for the right column (scrollable area) */
    .scrollable-col {
        height: calc(100vh - 130px);
        /* Adjust the height as needed */
        overflow-y: auto;
    }

    /* CSS for the left column (fixed position) */
    .fixed-col {
        position: sticky;
        top: 20px;
        /* Adjust the top position as needed */
        height: calc(100vh - 170px);
        /* Adjust the height as needed */
        overflow-y: auto;
    }
</style>

<div class="content">

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-bs-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false"
                            aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div>
                    <h4 class="header-title">Table - {{ $table->name }}</h4>
                    <div id="cardCollpase5" class="collapse show">

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Menu</th>
                                        <th>Qty</th>
                                        <th>Extra</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $index => $cartItem)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $cartItem['name'] }}</td>
                                            <td>
                                                <form action="{{ route('cart.update', $cartItem['id']) }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="number" name="qty" style="width:40px;"
                                                        min="1" value="{{ $cartItem['qty'] }}">
                                                    <button type="submit" class="btn btn-sm btn-success"
                                                        style="margin-top:-2px;"><i class="fas fa-check"></i></button>
                                                </form>
                                            </td>
                                            <td>
                                                {{ $cartItem['extra'] }}
                                            </td>
                                            {{-- <td class="text-center">{{ $cartItem['qty'] }}</td> --}}
                                            <td class="text-center">
                                                <a href="{{ route('cart.remove', $cartItem['id']) }}"
                                                    style="margin-top: -2px;">
                                                    <i class="fas fa-trash-alt" style="color:rgb(25, 7, 187)"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <input type="hidden" name="cart[{{ $index }}][id]"
                                            value="{{ $cartItem['id'] }}">
                                        <input type="hidden" name="cart[{{ $index }}][name]"
                                            value="{{ $cartItem['name'] }}">
                                        <input type="hidden" name="cart[{{ $index }}][qty]"
                                            value="{{ $cartItem['qty'] }}">
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex">
                                <form action="{{ route('add.kitchen.order') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="table_id" value="{{ $table->id }}">
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary">Order Confirm</button>
                                    </div>
                                </form>
                                <div class="mt-3 ms-3">
                                    <button type="submit" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#scrollable-modal">Order</button>
                                </div>
                            </div>

                        </div> <!-- end table-responsive-->

                    </div>

                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col-lg-8 scrollable-col">
            <div class="card">
                <div class="card-body pb-2">
                    <div class="dropdown float-end">
                        <a href="" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="" class="dropdown-item category-link">All Menu</a>
                            @foreach ($category as $cat)
                                <a href="{{ route('add.order', $table->id) }}" class="dropdown-item category-link"
                                    data-category-id="{{ $cat->id }}">{{ $cat->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="searchInput"
                            placeholder="Search products by name or code" autofocus>
                    </div>
                    <h4 class="header-title mb-0">Menu</h4>

                    <div class="row" id="product-list-container">
                        @foreach ($menu as $key => $item)
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6 mt-3">
                                <form action="{{ url('/add/cart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="hidden" name="name" value="{{ $item->name }}">
                                    <input type="hidden" name="qty" value="1">
                                    <button type="submit" class="btn btn-link">

                                        <div class="card" style="width: 8.5rem;">
                                            <div class="position-relative">
                                                <!-- Add position-relative class to the card container -->
                                                <img src="{{ asset($item->image) }}" id="em_photo"
                                                    class="card-img-top">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $item->name }}</h5>
                                                    <span class="badge bg-dark">{{ $item->price }}&nbsp;ks</span>
                                                </div>
                                                <div class="form-check mb-2 form-check-primary">
                                                    <input class="form-check-input" name="extra" type="checkbox" value="takeway">
                                                    <label class="form-check-label" for="customckeck1">ပါဆယ်</label>
                                                </div>
                                                <!-- Use position-absolute, top-0, and end-0 classes to position the selling price badge -->
                                                <span
                                                    class="badge bg-primary position-absolute top-0 end-0">{{ $item->mealtag }}</span>
                                                <!-- Use position-absolute, top-0, and start-0 classes to position the product store badge -->
                                            </div>
                                        </div>

                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div> <!-- end card -->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <!-- Long Content Scroll Modal -->
    <div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog"
        aria-labelledby="scrollableModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="scrollableModalTitle">မှာယူထားသော အစားအသောက်များ</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @php
                    $orders = App\Models\Order::where('table_id', $table->id)
                        ->where('status', 'cooking')
                        ->get();
                @endphp
                <div class="modal-body">
                    <table class="table mb-0">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Menu</th>
                                <th>Qty</th>
                                <th>Extra</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $index => $order)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $order->menu->name }}</td>
                                    <td class="text-center"> {{ $order->quantity }} </td>
                                    <td class="text-center"> {{ $order->extra }} </td>
                                    <td class="text-center"> {{ $order->status }} </td>
                                    {{-- <td class="text-center">
                                    <a href="{{ route('cart.remove', $order['id']) }}"
                                        style="margin-top: -2px;">
                                        <i class="fas fa-trash-alt" style="color:rgb(25, 7, 187)"></i>
                                    </a>
                                </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



</div> <!-- content -->


<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                customerId: {
                    required: true,
                },
            },
            messages: {
                customerId: {
                    required: 'ဖေါက်သည် ရွေးချယ်ပေးရန် လိုအပ်ပါသည်',
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

<script type="text/javascript">
    $(document).ready(function() {
        $('.category-link').click(function(e) {
            e.preventDefault();
            var categoryId = $(this).data('category-id');
            $.ajax({
                url: "{{ route('get.menu.by.category', ':categoryId') }}".replace(
                    ':categoryId', categoryId),
                type: 'GET',
                success: function(data) {
                    // Assuming your backend returns an array of menu items as JSON
                    var menuItems = data;

                    // Update the product list container with the filtered menu items
                    var productListContainer = $('#product-list-container');
                    productListContainer.empty(); // Clear previous items

                    // Iterate through the menu items and add them to the container
                    $.each(menuItems, function(index, item) {
                        var menuItemHtml = `
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6 mt-3">
                                <form action="{{ url('/add/cart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="${item.id}">
                                    <input type="hidden" name="name" value="${item.name}">
                                    <input type="hidden" name="qty" value="1">

                                    <button type="submit" class="btn btn-link">
                                        <div class="card" style="width: 8.5rem;">
                                            <div class="position-relative">
                                                <!-- Add position-relative class to the card container -->
                                                <img src="{{ asset('${item.image}') }}" id="em_photo"
                                                    class="card-img-top">
                                                <div class="card-body">
                                                    <h5 class="card-title">${item.name}</h5>
                                                    <span class="badge bg-dark">${item.price}&nbsp;ks</span>
                                                </div>
                                                <div class="form-check mb-2 form-check-primary">
                                                    <input class="form-check-input" name="extra" type="checkbox" value="takeway">
                                                    <label class="form-check-label" for="customckeck1">ပါဆယ်</label>
                                                </div>
                                                <!-- Use position-absolute, top-0, and end-0 classes to position the selling price badge -->
                                                <span
                                                    class="badge bg-primary position-absolute top-0 end-0">${item.mealtag}</span>
                                                <!-- Use position-absolute, top-0, and start-0 classes to position the product store badge -->
                                            </div>
                                        </div>
                                    </button>
                                </form>
                            </div>
                        `;

                        productListContainer.append(menuItemHtml);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>

@endsection
