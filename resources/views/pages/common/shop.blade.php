<x-layout title="Shop" >

    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Shop</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{ route("home") }}">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shop spad">
        <div class="container">
            <div class="shop__option">
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <div class="shop__option__search">
                            <form action="#">
                                <select>
                                    <option value="">Categories</option>
                                    <option value="">Red Velvet</option>
                                    <option value="">Cup Cake</option>
                                    <option value="">Biscuit</option>
                                </select>
                                <input type="text" placeholder="Search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="shop__option__right">
                            <select>
                                <option value="">Default sorting</option>
                                <option value="">A to Z</option>
                                <option value="">1 - 8</option>
                                <option value="">Name</option>
                            </select>
                            <a href="#"><i class="fa fa-list"></i></a>
                            <a href="#"><i class="fa fa-reorder"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product__item">
                            <a href="{{ route("product.detail", $product->id) }}">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/' . $product->image ) }}">
                                <div class="product__label">
                                    <span>{{ $product->category->name }}</span>
                                </div>
                            </div>
                            </a>
                            <div class="product__item__text">
                                <h6>
                                    <a href="{{ route("product.detail", $product->id) }}">
                                    {{ $product->name }}
                                </a>
                                </h6>
                                <div class="product__item__price">${{ number_format($product->price, 2) }}</div>
                                <form action="{{ route("add.to.cart") }}" method="post">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button style="background-color: orange; font-weight: bold;" class="cart_add text-white border-0 " >Add to cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="shop__last__option">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        {{ $products->links("vendor.pagination.bootstrap-5") }}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="shop__last__text">
                            <p>Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} results</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>