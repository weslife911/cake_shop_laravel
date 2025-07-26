<x-layout title="Edit Product" >

    <style>
        /* Custom styles for forms (reused from create product) */
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

        .current-image-preview {
            margin-top: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        .current-image-preview img {
            max-width: 200px;
            height: auto;
            border-radius: 5px;
            border: 1px solid #eee;
        }
    </style>

    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Edit Product</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{ route("home") }}">Home</a>
                        <a href="{{ route("admin.dashboard") }}">Admin Dashboard</a>
                        <a href="{{ route("list.products") }}">Products</a>
                        <span>Edit</span>
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
                            <span>Update Cake Details</span>
                            <h2>Edit Product</h2>
                        </div>
                        <form action="{{ route("edit.product", $product->id) }}" method="post">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-lg-12 form-group">
                                    <label for="productName">Product Name:</label>
                                    <input type="text" id="productName" name="name" value="{{ $product->name }}" required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="productPrice">Price ($):</label>
                                    <input type="number" id="productPrice" name="price" value="{{ $product->price }}" step="0.01" required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="productCategory">Category:</label>
                                    <select id="productCategory" name="category_id" required>
                                        <option value="{{ $product->category->id }}" selected>{{ $product->category->name }}</option>
                                        @foreach ($categories as $category)
                                            @if($product->category != $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label for="productDescription">Description:</label>
                                    <textarea name="description" id="productDescription">{{ $product->description }}</textarea>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <label>Current Product Image:</label>
                                    <div class="current-image-preview">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Current Product Image">
                                    </div>
                                    <label for="productImage">Change Product Image:</label>
                                    <input type="file" name="image" id="productImage" accept="image/*">
                                    <small class="form-text text-muted">Upload a new image to replace the current one.</small>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="site-btn">Update Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>