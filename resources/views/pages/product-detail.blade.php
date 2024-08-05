<x-app-layout>
    <section class="ftco-section">
        <div class="container-wrap">
            <div class="row no-gutters d-flex px-5 ftco-animate">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <img src="/images/products/{{ $products->image ?? 'default.png' }}" alt="Product Image" class="img-fluid center-image">
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <p class="font-bold">{{session('status')}}</p>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger p-3" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <h2>{{ $products->name }}</h2>
                    <p id="price">Price: ₱<span id="basePrice">{{ $products->price }}</span></p>
                    <form action="{{ url('/addCart/'.$products->productId) }}" method="POST" class="contact-form">
                        @csrf
                        <div class="form-group">
                            <label for="quantity">Quantity:</label><br>
                            <input type="number" class="w-50" name="quantity" id="quantity" min="1" step="any" value="1">
                        </div>
                        <div class="form-group">
                            <label for="size">Select Size:</label><br>
                            <select name="size" class="w-50" id="sizeSelect">
                                <option value="Small">Small</option>
                                <option value="Medium">Medium +₱25</option>
                                <option value="Large">Large +₱50</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Add to cart</button>
                    </form>
                </div>                
            </div>            
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const basePrice = parseFloat(document.getElementById('basePrice').innerText);
            const sizeSelect = document.getElementById('sizeSelect');
            const priceElement = document.getElementById('price');
            const quantityElement = document.getElementById('quantity');
            
            function updatePrice() {
                let newPrice = basePrice;
                if (sizeSelect.value === 'Medium') {
                    newPrice += 25;
                } else if (sizeSelect.value === 'Large') {
                    newPrice += 50;
                }
                newPrice *= parseFloat(quantityElement.value) || 1;
                priceElement.innerHTML = `Price: ₱<span id="basePrice">${newPrice.toFixed(2)}</span>`;
            }
            
            sizeSelect.addEventListener('change', updatePrice);
            quantityElement.addEventListener('change', updatePrice);
            quantityElement.addEventListener('keyup', updatePrice);
        });
    </script>
</x-app-layout>