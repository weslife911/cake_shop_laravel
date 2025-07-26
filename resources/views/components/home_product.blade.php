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
                        <div class="cart_add">
                            <a href="#">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>