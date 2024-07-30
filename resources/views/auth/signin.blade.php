<x-app-layout>
    <section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">

        <div class="slider-item" style="background-image: url(images/bg_3.jpg);">
            <div class="overlay"></div>
            <div class="row justify-content-center align-items-center">
  
                <!-- Login Start -->
                <div class="container-xxl py-5 w-75" data-aos="fade-up" data-aos-delay="0.3s">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                        <form class="p-5 border w-100 contact-form" method="POST" action="{{ url('login') }}" style="background-color: #00000093; border-radius:10px;">
                            <h3 class="text-center">SIGN IN</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger p-3" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @csrf
                            <div class="form-floating mt-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                            </div>

                            <div class="form-floating mt-3">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                            </div>
                            <br>
                            <div class="row justify-content-center align-items-center">
                                <input type="submit" value="Sign in" class="btn btn-primary rounded-0 w-25">
                            </div>
                                <div class="form-group mt-3 text-center">
                                    <a href="forgot-password.html">Forgot Password?</a>
                                </div>
                            <hr>
                            <div class="mt-3 text-center">  
                                <span>No account? <a href="{{ url('/signup') }}">Register now!</a></span>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- Login End -->
  
            </div>
        </div>
      </section>
  
      <script>
        function updateText() {
            var screenSize = window.innerWidth;
            var loginForm = document.querySelector('.contact-form');

            if (screenSize <= 576) {
                loginForm.classList.remove('w-75');
                loginForm.classList.add('w-100');
            } else {
                loginForm.classList.remove('w-100');
                loginForm.classList.add('w-75');
            }
        }

        updateText();
        window.addEventListener('resize', function() {
            updateText();
        });

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