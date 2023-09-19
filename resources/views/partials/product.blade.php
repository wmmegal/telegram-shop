<div class="product-card text-center" x-data="{count: 0}" x-init="count = {{ cart()->inCart($product->id) }}">
   <span data-id="1" class="product-cart-qty badge rounded-pill bg-warning" x-text="count" x-show="count">
   </span>
    <img src="{{ $product->thumb }}" class="card-img-top"
         alt="">
    <div class="product-card-body">
        <p class="product-title">
            {{ $product->title }}
        </p>
        <p class="product-price">
            {{ $product->price }}
        </p>
        <div class="d-grid gap-2 mt-2" >
            <button class="btn btn-warning add2cart"
                    @click="$dispatch('addToCart', { productId: {{ $product->id }} }); count++">ADD
            </button>
        </div>
    </div>
</div>
