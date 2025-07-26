<x-layout title="Add Category" >
    <style>
        /* Custom styles for forms */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            color: #111;
            margin-bottom: 8px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 20px;
            border: 1px solid #ebebeb;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            color: #666;
            transition: all 0.3s;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="number"]:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #e53637;
            outline: none;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-group input[type="file"] {
            padding: 10px 0;
            border: none;
        }

        .site-btn {
            width: auto;
            min-width: 180px;
            padding: 15px 30px;
            font-size: 16px;
            text-transform: uppercase;
            font-weight: 700;
        }
    </style>

    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Create New Category</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{ route("home") }}">Home</a>
                        <a href="{{ route("admin.dashboard") }}">Admin Dashboard</a>
                        <a href="{{ route("list.categories") }}">Categories</a>
                        <span>Create</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact spad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="contact__form">
                        <div class="section-title">
                            <span>Add New Category</span>
                            <h2>Category Details</h2>
                        </div>
                        <form action="{{ route("add.category") }}" method="POST" >
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 form-group">
                                    <label for="categoryName">Product Name:</label>
                                    <input type="text" id="categoryName" placeholder="Enter category name" name="name" required>
                                    @error("name")
                                        <strong style="color: red;" >
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="site-btn">Create Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>