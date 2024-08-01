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
                        <div class="d-md-flex mb-3">
                            <h3 class="box-title mb-0">Orders</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Customer</th>
                                        <th class="border-top-0">Delivery Address</th>
                                        <th class="border-top-0">Total</th>
                                        <th class="border-top-0">Date</th>
                                        <th class="border-top-0">Date Ordered</th>
                                        <th class="border-top-0">Order Status</th>
                                        <th class="border-top-0">Action</th>
                                        <th class="border-top-0">Order Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        @foreach ($order->orderdetails as $detail)
                                            <tr>
                                                <td>{{ $order->orderId  }}</td>
                                                <td>{{ $detail->product->name }}</td>
                                                <td>3</td>
                                                <td>4</td>
                                                <td>5</td>
                                                <td>6</td>
                                                <td>7</td>
                                                <td>8</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
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
            document.querySelectorAll('.delete-btn').forEach(function (button) {
                button.addEventListener('click', function () {
                    Swal.fire({
                        title: "CONFIRM",
                        text: "Are you sure to delete this Product?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, proceed"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var deleteValue = this.value;
                            this.closest('form').submit();
                        }
                    });
                });
            });
        });
    </script>
</x-dashboard.app-layout>