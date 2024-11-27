<section class="shop_section layout_padding bg-light py-5">
    <div class="container">
        <div class="heading_container heading_center mb-5">
            <h2 class="text-uppercase fw-bold">
                Latest Products
            </h2>
        </div>
        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        <button
                            class="btn p-0 border-0 text-start"
                            data-bs-toggle="modal"
                            data-bs-target="#product_modal"
                            onclick="getProductInfo('{{ $product->images ? asset('storage/' . $product->images) : asset('images/default.png') }}',
                                '{{ $product->product_name }}',
                                '{{ $product->price }}$',
                                '{{ $product->description }}')">
                            <div class="card-img-top" style="background-image: url('{{ $product->images ? asset('storage/' . $product->images) : asset('images/default.png') }}');
                                background-position: center; background-size: cover; height: 200px; border-radius: .25rem;"></div>
                            <div class="card-body text-center">
                                <h6 class="card-title mb-1">{{ $product->product_name }}</h6>
                                <h6 class="text-muted mb-0">
                                    Price:
                                    <span class="fw-bold">${{ $product->price }}</span>
                                </h6>
                            </div>
                            <div class="badge bg-danger position-absolute top-0 end-0 m-2">
                                Aksiya
                            </div>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">
                View All Products
            </a>
        </div>
    </div>

    <!-- Product Modal -->
    <a href="#" data-bs-toggle="modal" data-bs-target="#basket_modal" class="position-relative">
        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
        <span id="basket_count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        0
    </span>
    </a>

    <!-- Basket Modal -->
    <div class="modal fade" id="basket_modal" tabindex="-1" aria-labelledby="basket_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <!-- Modal Header -->
                <div class="modal-header bg-primary text-white">
                    <h4 class="modal-title fw-bold" id="basket_modal_label">Your Basket</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <ul id="basket_list" class="list-group mb-3">
                        <!-- Basket Items Will Appear Here -->
                    </ul>
                    <div class="mb-3">
                        <label for="delivery_address" class="form-label">Delivery Address</label>
                        <input type="text" class="form-control" id="delivery_address" placeholder="Enter delivery address">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" placeholder="Enter phone number">
                    </div>
                    <h6 class="fw-bold">
                        Total Price: $<span id="total_price">0.00</span>
                    </h6>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Checkout</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        const basket = [];
        const basketCountElem = document.getElementById('basket_count');
        const basketList = document.getElementById('basket_list');
        const totalPriceElem = document.getElementById('total_price');

        function addToBasket(id, name, price) {
            const product = { id, name, price: parseFloat(price) };
            basket.push(product);
            updateBasketCount();
            renderBasket();
        }

        function updateBasketCount() {
            basketCountElem.textContent = basket.length; // Update the basket count
        }

        function renderBasket() {
            // Clear basket list
            basketList.innerHTML = '';

            // Render each product
            let totalPrice = 0;
            basket.forEach((product, index) => {
                const li = document.createElement('li');
                li.className = 'list-group-item d-flex justify-content-between align-items-center';
                li.innerHTML = `
                ${product.name} - $${product.price.toFixed(2)}
                <button class="btn btn-sm btn-danger" onclick="removeFromBasket(${index})">Remove</button>
            `;
                basketList.appendChild(li);

                totalPrice += product.price;
            });

            // Update total price
            totalPriceElem.innerText = totalPrice.toFixed(2);
        }

        function removeFromBasket(index) {
            basket.splice(index, 1);
            updateBasketCount();
            renderBasket();
        }
    </script>
