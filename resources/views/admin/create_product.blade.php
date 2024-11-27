<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
@include('admin.css') <!-- Assuming this includes Bootstrap or other stylesheets -->
    <style>
        .form-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-container input, .form-container select, .form-container button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;

        }
        .form-container button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
        .alert-success {
            margin-bottom: 20px;
        }
    </style>
</head>
<script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>

<script src="{{asset('/admincss/js/toastr.min.js')}}"></script>

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

                <div class="form-container">
                    <h2 class="text-center" style="color: white">Create New Product</h2>

                    <form action="{{ route('admin.addProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" name="product_name" required placeholder="Enter product name">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" required placeholder="Enter description">
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" required placeholder="Enter price">
                        </div>

                        <div class="form-group">
                            <label for="images">Product Image</label>
                            <input type="file" class="form-control" name="images">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript files-->
@include('admin.script')

</body>
</html>
