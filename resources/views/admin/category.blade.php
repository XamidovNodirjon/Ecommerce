<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }

        .page-header h1 {
            color: #2c3e50;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px 0;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        input[type="text"] {
            width: 300px;
            height: 40px;
            padding: 0 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 200px;
            height: 45px;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
        }

        .div_table {
            width: 80%;
            margin: 30px auto;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            border-radius: 5px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            font-size: 18px;
        }

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
</head>

<body>
@include('admin.header')

<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
@include('admin.sidebar')
<!-- Sidebar Navigation end-->

    <div class="page-content">
        <div class="container-fluid">
            <div class="page-header">
                <h1 style="color: white">Add Category</h1>

                <div class="div_deg">
                    <form action="{{url('add_category')}}" method="POST">
                        @csrf
                        <input type="text" class="form-control" name="category" required placeholder="Enter category name">
                        <input type="submit" class="form-control" value="Add Category">
                    </form>
                </div>

                <div class="div_table">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $categories)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$categories->category_name}}</td>
                                <td>
                                    <button class="action-btn">Edit</button>
                                    <button class="action-btn delete">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $category->links() }}

                </div>
            </div>
        </div>
    </div>


</div>

@include('admin.script')

</body>

</html>
