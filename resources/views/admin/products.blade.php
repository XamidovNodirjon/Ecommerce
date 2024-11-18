<!DOCTYPE html>
<html>
<head>
    <style>
        .action-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .action-btn:hover {
            background-color: #218838;
        }

        .action-btn.delete {
            background-color: #dc3545;
        }

        .action-btn.delete:hover {
            background-color: #c82333;
        }
    </style>
    @include('admin.css')
</head>
<body>
@include('admin.header')

<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
@include('admin.sidebar')
<!-- Sidebar Navigation end-->

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <!-- Display success message -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="div_deg">
                    <h1>Products</h1>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category->category_name }}</td>
                                <td>
                                    @if($product->images)
                                        <img src="{{ asset('storage/' . $product->images) }}" alt="Product Image" style="width: 80px; height: auto; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>

                                <td>
                                    <button class="action-btn">Edit</button>
                                    <button class="action-btn delete">Delete</button>
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

<!-- JavaScript files-->
@include('admin.script')

</body>
</html>
