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
                        <div class="d-md-flex mb-3">
                            <h3 class="box-title mb-0">Products</h3>
                            <div class="col-md-3 col-sm-4 col-xs-6 ms-auto" style="text-align: end">
                                <a href="{{ url('/admin/products') }}">
                                    <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="site-section w-100 mt-5" data-aos="fade-up" data-aos-delay="0.3s">
                            <div class="container">
                                <form class="py-5 px-5 border" method="POST" action="{{ url('/admin/products/new/store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            @if ($errors->any())
                                                <div class="alert alert-danger p-3" role="alert">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Pizza: </label>
                                                <input type="text" name="name" id="pizza" class="form-control" placeholder="Enter pizza name" required>
                                            </div>
                                
                                            <div class="form-group">
                                                <label for="price">Price: </label>
                                                <input type="number" name="price" id="price" class="form-control" placeholder="Enter price" step="any" min="1" required>
                                            </div>
                                
                                            <div class="form-group">
                                                <label for="status">Availability: </label>
                                                <select name="status" id="status" class="form-control" required>
                                                    <option value="Not available" class="text-danger">Not available</option>
                                                    <option value="Available" class="text-success">Available</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Image preview</p>
                                        </div>
                                    </div>
                                
                                    <div class="row mt-4">
                                        <div class="col-12" style="text-align: center;">
                                            <input type="submit" value="Save changes" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                                
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
</x-dashboard.app-layout>