<x-layout title="Products" >
    
    <style>
        /* Custom styles for product list table */
        .product-list-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden; /* Ensures rounded corners apply to table content */
        }

        .product-list-table th,
        .product-list-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
            font-family: 'Montserrat', sans-serif;
        }

        .product-list-table th {
            background-color: #f8f8f8;
            font-weight: 600;
            color: #111;
            text-transform: uppercase;
            font-size: 14px;
        }

        .product-list-table tbody tr:last-child td {
            border-bottom: none;
        }

        .product-list-table .product-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 15px;
            vertical-align: middle;
        }

        .product-list-table .product-name {
            font-weight: 600;
            color: #111;
        }

        .product-list-table .action-buttons a {
            display: inline-block;
            margin-right: 10px;
            color: #fff;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s;
            font-size: 14px;
        }

        .product-list-table .action-buttons .edit-btn {
            background-color: #6c757d; /* Grey for edit */
        }

        .product-list-table .action-buttons .edit-btn:hover {
            background-color: #5a6268;
        }

        .product-list-table .action-buttons .delete-btn {
            background-color: #dc3545; /* Red for delete */
        }

        .product-list-table .action-buttons .delete-btn:hover {
            background-color: #c82333;
        }

        .add-product-btn {
            margin-bottom: 30px;
        }
    </style>

    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Product Management</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{ route("home") }}">Home</a>
                        <a href="{{ route("admin.dashboard") }}">Admin Dashboard</a>
                        <span>Products</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="admin-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <span>Product List</span>
                        <h2>Manage Your Cakes</h2>
                    </div>
                    <a href="{{ route("add.product") }}" class="primary-btn add-product-btn"><i class="fa fa-plus"></i> Add New Product</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="product-list-table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($products)
                                    @foreach ($products as $product)
                                        <tr>
                                            <td><img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="product-img"></td>
                                            <td class="product-name">{{ $product->name }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>${{ number_format($product->price, 2) }}</td>
                                            <td class="action-buttons">
                                                <a href="{{ route("edit.product", $product->id) }}" class="edit-btn"><i class="fa fa-edit"></i> Edit</a>
                                                <form action="{{ route("delete.product", $product->id) }}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="delete-btn"><i class="fa fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>