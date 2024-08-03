<x-dashboard.app-layout>
    <div class="page-wrapper">
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    {{-- <h4 class="page-title">Dashboard</h4> --}}
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal">Orders</a></li>
                    </ol>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                <p class="font-bold">{{session('status')}}</p>
                            </div>
                        @endif
                        <div class="d-md-flex mb-3 justify-content-between">
                            <h3 class="box-title mb-0">
                                <a href="/admin/orders">
                                    <button class="btn btn-primary btn-sm"><i class="far fa-arrow-alt-circle-left"></i> Back</button> Orders
                                </a>
                            </h3>
                            <form action="{{ url('/admin/orders/updateStatus/'.$order_details->orderId) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group d-md-flex justify-content-between gap-2">
                                    <label for="status" class="mt-2">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option {{ $order_details->status == 'Pending' ? 'selected' : '' }} value="Pending">Pending</option>
                                        <option value="On queue" {{ $order_details->status == 'On queue' ? 'selected' : '' }} >On queue</option>
                                        <option value="For delivery" {{ $order_details->status == 'For delivery' ? 'selected' : '' }} >For delivery</option>
                                        <option value="Delivered" {{ $order_details->status == 'Delivered' ? 'selected' : '' }} >Delivered</option>
                                    </select>
                                    <button type="button" class="btn btn-primary update-btn" id="update-btn">Update</button>
                                </div>
                            </form>   
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Customer Information</h5><hr>
                                        <div class="form-group">
                                            <label for="" class="fw-bold">Name of Customer</label>
                                            <p>{{ $order_details->user->firstname }} {{ $order_details->user->lastname }}</p>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="" class="fw-bold">Contact Number</label>
                                            <p>{{ $order_details->user->phone }}</p>
                                        </div>
        
                                        <div class="form-group">
                                            <label for="" class="fw-bold">Delivery Address</label>
                                            <p>{{ $order_details->user->address }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Order Details</h5><hr>
    
                                        <div class="form-group">
                                            <label for="" class="fw-bold">Order Status</label>
                                            <p>{{ $order_details->status }}</p>
                                        </div>
    
                                        <div class="form-group">
                                            <label for="" class="fw-bold">Date Ordered</label>
                                            <p>{{ \Carbon\Carbon::parse($order_details->dateordered)->format('F j, Y') }}</p>
                                        </div>
    
                                        <div class="form-group">
                                            <label for="" class="fw-bold">Total</label>
                                            <p>₱ {{ $order_details->total }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Order Summary</h5><hr>
                                @foreach ($order_details->orderdetails as $detail)
                                    <div class="row border mt-2">
                                        <div class="col-md-2">
                                        <img src="/images/products/{{ $detail->product->image ?? 'default.png' }}" class="img-fluid h-100 w-100" alt="Phone">
                                        </div>
                                        <div class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 small">{{ $detail->product->name }}</p>
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 small">Price: ₱{{ $detail->product->price }}</p>
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0 small">Qty: {{ $detail->quantity }}</p>
                                        </div>
                                        <div class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                        <p class="text-muted mb-0 small">Subtotal: ₱{{ $detail->subtotal }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a
            href="https://www.wrappixel.com/">wrappixel.com</a>
        </footer>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.update-btn').forEach(function (button) {
                button.addEventListener('click', function () {
                    Swal.fire({
                        title: "CONFIRM",
                        text: "Are you sure to update this Order?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, proceed"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // var deleteValue = this.value;
                            const form = this.closest('form');
                            // const formData = new FormData(form);
                            // formData.forEach((value, key) => {
                            //     console.log(key, value); 
                            // });
                            form.submit();
                        }
                    });
                });
            });

            document.getElementById('update-btn').disabled = true;
            const status = "{{ $order_details->status }}";
            const statusSelect = document.getElementById('status');

            statusSelect.addEventListener('change', function () {
                document.getElementById('update-btn').disabled = false;
            })

            if (status === 'On queue') {
                statusSelect.querySelector('option[value="Pending"]').disabled = true;
            } else if (status === 'For delivery') {
                statusSelect.querySelector('option[value="Pending"]').disabled = true;
                statusSelect.querySelector('option[value="On queue"]').disabled = true;
            } else if (status === 'Delivered') {
                statusSelect.querySelector('option[value="Pending"]').disabled = true;
                statusSelect.querySelector('option[value="On queue"]').disabled = true;
                statusSelect.querySelector('option[value="For delivery"]').disabled = true;
            }
        });
    </script>
</x-dashboard.app-layout>