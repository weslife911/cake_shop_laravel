<x-layout title="Admin Dashboard" >
    <style>
        /* Custom styles for admin dashboard */
        .admin-section {
            padding: 80px 0;
        }

        .admin-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
            text-align: center;
        }

        .admin-card h4 {
            font-family: 'Playfair Display', serif;
            color: #111;
            margin-bottom: 15px;
        }

        .admin-card p {
            font-family: 'Montserrat', sans-serif;
            color: #666;
            font-size: 16px;
        }

        .admin-card .icon {
            font-size: 48px;
            color: #e53637; /* Primary color from your template */
            margin-bottom: 20px;
        }

        .admin-card .primary-btn {
            margin-top: 20px;
        }

        .admin-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .admin-menu li {
            margin-bottom: 10px;
        }

        .admin-menu li a {
            display: block;
            padding: 15px 20px;
            background-color: #f8f8f8;
            border-radius: 5px;
            color: #111;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            transition: all 0.3s;
        }

        .admin-menu li a:hover {
            background-color: #e53637;
            color: #fff;
        }
    </style>

    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Admin Dashboard</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{ route("home") }}">Home</a>
                        <span>Admin Dashboard</span>
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
                        <span>Admin Panel</span>
                        <h2>Welcome to your Dashboard!</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="admin-card">
                        <div class="icon"><i class="fa fa-cubes"></i></div>
                        <h4>Product Management</h4>
                        <p>Manage your cake products: add, edit, delete, and view all items.</p>
                        <a href="./admin-products.html" class="primary-btn">Go to Products</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="admin-card">
                        <div class="icon"><i class="fa fa-shopping-bag"></i></div>
                        <h4>Order Management</h4>
                        <p>View and manage customer orders, update statuses, and track deliveries.</p>
                        <a href="#" class="primary-btn">Go to Orders</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="admin-card">
                        <div class="icon"><i class="fa fa-users"></i></div>
                        <h4>User Management</h4>
                        <p>Manage user accounts, roles, and permissions.</p>
                        <a href="#" class="primary-btn">Go to Users</a>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Quick Links</h2>
                    </div>
                    <ul class="admin-menu">
                        <li><a href="{{ route("list.products") }}">Manage Products</a></li>
                        <li><a href="{{ route("list.categories") }}">Manage Categories</a></li>
                        <li><a href="{{ route("add.product") }}">Add New Product</a></li>
                        <li><a href="{{ route("add.category") }}">Add New Category</a></li>
                        <li><a href="#">View All Orders</a></li>
                        <li><a href="#">Site Settings</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

</x-layout>