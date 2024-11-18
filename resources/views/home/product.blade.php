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
                                New
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
    <div class="modal fade form-control" id="product_modal" tabindex="-1" aria-labelledby="product_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <!-- Modal Header -->
                <div class="modal-header bg-primary text-white">
                    <h4 class="modal-title fw-bold" id="product_modal_label">Product Details</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body text-center">
                    <img src="" alt="Product Image" class="img-fluid mb-3 rounded" id="product_image">
                    <h5 id="product_name" class="fw-bold mb-2"></h5>
                    <p id="product_description" class="text-muted mb-3"></p>
                    <h6 class="fw-bold">
                        Price: <span id="product_price" class="text-success"></span>
                    </h6>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
        const productImage = document.getElementById('product_image');
        const productName = document.getElementById('product_name');
        const productPrice = document.getElementById('product_price');
        const productDescription = document.getElementById('product_description');

        function getProductInfo(image, name, price, description) {
            productImage.setAttribute('src', image);
            productName.innerText = name;
            productPrice.innerText = price;
            productDescription.innerText = description;
        }
    </script>
</section>
