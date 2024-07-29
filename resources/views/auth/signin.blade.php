<x-app-layout>
    <section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">

        <div class="slider-item" style="background-image: url(images/bg_3.jpg);">
            <div class="overlay"></div>
          <div class="container">
            <div class="row justify-content-center align-items-center">
  
                <div class="col-md-7 col-sm-12 ftco-animate mt-5 py-5 px-4" style="background-color: #00000093; border-radius:10px;">
                    <h3 class="card-title text-center">SIGN IN | <span style="color: #EAC406">PizzaHub</span></h3>
                    @if ($errors->any())
                        <div class="bg-red-200 p-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="contact-form" method="POST" action="{{ url('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email" style="color: #d8d8d8">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password" style="color: #d8d8d8">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <button type="submit" class="btn btn-primary btn-block w-50">Submit</button>
                        </div>
                    </form>
                </div>
  
            </div>
          </div>
        </div>
      </section>
  
</x-app-layout>