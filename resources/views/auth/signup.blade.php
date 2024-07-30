<x-app-layout>
    <section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">
        <div class="slider-item " style="background-image: url(images/bg_3.jpg);">
            <div class="overlay"></div>
            <div class="row justify-content-center align-items-center">
                <div class="site-section w-100 mt-5" data-aos="fade-up" data-aos-delay="0.3s">
                    <div class="container">
                    <form class="contact-form py-5 px-5 border" style="background-color: #00000093; border-radius:10px;" method="POST" action="{{ url('register') }}">
                        @csrf
                        <div class="row">
                          <div class="col-md-12 form-group">
                            <h3 class="text-center">SIGN UP</h3>
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
                                <div class="alert alert-success p-3" role="alert">
                                    <p class="font-bold">{{session('status')}}</p>
                                </div>
                            @endif
                          </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label for="fname">First Name</label>
                                <input type="text" id="fname" name="firstname" placeholder="Enter firstname" class="form-control form-control-lg">
                            </div>
                            
                            <div class="col-md-3 form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" id="lname" name="lastname" placeholder="Enter lastname" class="form-control form-control-lg">
                            </div>

                            <div class="col-md-3 form-group">
                                <label for="eaddress">Email Address</label>
                                <input type="email" id="email" name="email" placeholder="Enter email" class="form-control form-control-lg">
                            </div>

                            <div class="col-md-3 form-group">
                                <label for="tel">Phone Number</label>
                                <input type="text" name="phone" placeholder="+63" class="form-control form-control-lg" minlength="11" maxlength="11">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="message">Address</label>
                                <textarea name="address" id="address" cols="30" rows="5" placeholder="Enter complete address" class="form-control" placeholder="Street/ Barangay/ City/ Province"></textarea>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6 form-group">
                              <label for="eaddress">Password</label>
                              <div class="mb-3">
                                <input type="password" id="password" name="password" placeholder="Enter password" class="form-control form-control-lg">
                                <div class="invalid-feedback">
                                  Password does not match.
                                </div>
                                <div class="valid-feedback">
                                  Password matched.
                                </div>
                              </div>
                          </div>
                          <div class="col-md-6 form-group">
                              <label for="tel">Confirm Password</label>
                              <div class="mb-3">
                                <input type="password" id="password1" placeholder="Confirm password" class="form-control form-control-lg">
                                <div class="invalid-feedback">
                                  Password does not match.
                                </div>
                                <div class="valid-feedback">
                                  Password matched.
                                </div>
                              </div>
                          </div>
                      </div>
                        <div class="row">
                            <div class="col-12" style="text-align: center;">
                                <input type="submit" value="Create your account" class="btn btn-primary">
                            </div>
                        </div>
                        <hr>
                        <div class="mt-3 text-center">
                          <span>Already have an account? <a href="{{ url('/signin') }}">Login here</a></span>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        setTimeout(() => {
            const elements = document.querySelectorAll('.alert');
            elements.forEach((element) => {
                element.style.transition = 'opacity 0.5s';
                element.style.opacity = '0';
                setTimeout(() => {
                    element.style.display = 'none';
                }, 500); 
            });
        }, 3000);
    </script>
</x-app-layout>