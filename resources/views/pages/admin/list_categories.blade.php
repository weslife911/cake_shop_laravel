<x-layout title="Categories" >

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
                        <span>Categories</span>
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
                        <span>Category List</span>
                        <h2>Manage Your Categories</h2>
                    </div>
                    <a href="{{ route("add.category") }}" class="primary-btn add-product-btn"><i class="fa fa-plus"></i> Add New Category</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="product-list-table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($categories)
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td class="product-name">{{ $category->name }}</td>
                                            <td class="action-buttons">
                                                <a href="{{ route("edit.category", $category->id) }}" class="edit-btn"><i class="fa fa-edit"></i> Edit</a>
                                                <form action="{{ route("delete.category", $category->id) }}" method="post">
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