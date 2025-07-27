<section class="product spad">
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/' . $product->image) }}">
                        <div class="product__label">
                            <span>{{ $product->category->name }}</span>
                        </div>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{ route("product.detail", $product->id) }}">{{ $product->name }}</a></h6>
                        <div class="product__item__price">${{ $product->price }}</div>
                        @auth
                            <form action="{{ route("add.to.cart") }}" method="post">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button style="background-color: orange; font-weight: bold;" class="cart_add text-white border-0 " >Add to cart</button>
                            </form>
                        @else
                            <div class="cart_add">
                                <a href="{{ route("login") }}">Add to cart</a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>