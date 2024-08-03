<x-dashboard.app-layout>
    <div class="page-wrapper">
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    {{-- <h4 class="page-title">Dashboard</h4> --}}
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal">My Profile</a></li>
                    </ol>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="d-md-flex mb-3">
                        <h3 class="box-title mb-0">User Profile</h3>
                        <div class="col-md-3 col-sm-4 col-xs-6 ms-auto" style="text-align: end">
                            <a href="{{ url('/admin') }}">
                                <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
                            </a>
                        </div>
                    </div>

                    <div class="site-section w-100 mt-5" data-aos="fade-up" data-aos-delay="0.3s">
                        <form class="py-5 px-5 border" method="POST" action="{{ url('/admin/profile/'.$users->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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

                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            <p class="font-bold">{{session('status')}}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Firstname: </label>
                                                <input type="text" name="firstname" class="form-control" placeholder="Enter firstname" value="{{ $users->firstname }}" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="name">Lastname: </label>
                                                <input type="text" name="lastname" class="form-control" placeholder="Enter lastname" value="{{ $users->lastname }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Email: </label>
                                                <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ $users->email }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Phone: </label>
                                                <input type="text" name="phone" class="form-control" placeholder="Enter phone number" minlength="11" maxlength="11" value="{{ $users->phone }}"  required>
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Address: </label>
                                                <textarea name="address" cols="30" rows="5" placeholder="Province/City/Street/Barangay" class="form-control" required>{{ $users->address }}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">New Password: </label>
                                                <input type="password" name="password" id="password" class="form-control">
                                                <div class="valid-feedback">
                                                    Password matched.
                                                </div>
                                                <div class="invalid-feedback">
                                                    Password does not match.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Confirm Password: </label>
                                                <input type="password" class="form-control" id="password1">
                                                <div class="valid-feedback">
                                                    Password matched.
                                                </div>
                                                <div class="invalid-feedback">
                                                    Password does not match.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <p>Image preview</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div id="imageContainer" class="border">
                                                    <img id="selectedImage" src="/images/users/{{ $users->image == null ? 'default.jpg' : $users->image }}" alt="Selected Image" style="width:100%; height: 225px;">
                                                </div>
                                            </div>
                                            <input type="file" name="image" id="fileInput" accept="image/*">
                                        </div>
                                        {{-- <div class="col-md-6">
                                        </div> --}}
                                    </div>

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

        <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a
            href="https://www.wrappixel.com/">wrappixel.com</a>
        </footer>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var password = document.getElementById('password');
            var password1 = document.getElementById('password1');
            var validFeedback = document.querySelector('.valid-feedback');
            var invalidFeedback = document.querySelector('.invalid-feedback');

            password1.addEventListener('keyup', function (e) {
                e.preventDefault();
                if (password1.value !== password.value) {
                    password.classList.add('is-invalid');
                    password1.classList.add('is-invalid');
                    password1.classList.remove('is-valid');
                    validFeedback.style.display = 'none';
                    invalidFeedback.style.display = 'block';
                } else {
                    password.classList.remove('is-invalid');
                    password1.classList.remove('is-invalid');
                    password1.classList.add('is-valid');
                    password.classList.add('is-valid');
                    validFeedback.style.display = 'block';
                    invalidFeedback.style.display = 'none';
                }
            });
        });
        
        document.getElementById('selectedImage').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });

        document.getElementById('fileInput').addEventListener('change', function() {
            var fileInput = this;
            var selectedImage = document.getElementById('selectedImage');

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    selectedImage.src = e.target.result;
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        });
    </script>
</x-dashboard.app-layout>