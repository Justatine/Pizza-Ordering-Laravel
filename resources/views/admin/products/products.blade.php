<x-dashboard.app-layout>
    <div class="page-wrapper">
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    {{-- <h4 class="page-title">Dashboard</h4> --}}
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal">Products</a></li>
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
                            <div class="alert alert-success p-3" role="alert">
                                <p class="font-bold">{{session('status')}}</p>
                            </div>
                        @endif
                        <div class="d-md-flex mb-3">
                            <h3 class="box-title mb-0">Products</h3>
                            <div class="col-md-3 col-sm-4 col-xs-6 ms-auto" style="text-align: end">
                                <a href="{{ url('/admin/products/new') }}">
                                    <button class="btn btn-primary">+ Add new</button>
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">ID</th>
                                        <th class="border-top-0">Preview</th>
                                        <th class="border-top-0">Pizza</th>
                                        <th class="border-top-0">Price</th>
                                        <th class="border-top-0">Availability</th>
                                        <th class="border-top-0 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->productId }}</td>
                                            <td class="txt-oflo">Image Preview</td>
                                            <td>{{ $product->name }}</td>
                                            <td><span class="text-success">${{ $product->price }}</span></td>
                                            <td><span class="text-danger">{{ $product->status }}</span></td>
                                            <td class="d-md-flex align-items-center justify-content-center gap-2">
                                                <a href="{{'/product/'.$product->productId}}">
                                                    <button class="btn btn-primary">Update</button>
                                                </a>

                                                <form action="{{ url('/product/'.$product->productId) }}" method="POST" class="inline-block">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td> 
                                        </tr>
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
</x-dashboard.app-layout>