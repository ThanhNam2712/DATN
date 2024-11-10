<section class="new-products">
  <h3>Sản Phẩm Mới</h3>
  <hr>
  <div class="product-container">
    @foreach ($products as $list)
    <a href="detail/{{$list->id}}">
    <div class="product-card">
      <div class="product-image" id="product-image-1">
        <img src="{{Storage::url($list->image)}}" alt="">
      </div>
      <div class="product-details">
        <p class="product-name">{{$list->name}}</p>

        <div class="price">
          <span class="old-price">{{$list->variant->first()->price}}</span>
          <span class="new-price">{{$list->variant->first()->price_sale}}</span>
          <!-- @if ($list->variant->first()->price_sale < $list->variant->first()->price)
          <span class="new-price">{{$list->variant->first()->price_sale}}</span>
            @else
            <!-- <p style="visibility: hidden;">helo</p> -->
            <!-- @endif -->
            
        </div>
        <div class="star-rating">
          <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
        </div>
      </div>
      <div class="icons">
        <button class="cart-icon">
          <a href="../ChiTietSp/chitiet.html"><img src="/Front-end/anh/cart.png" alt="Giỏ hàng" width="20" height="20"></a>
        </button>
      </div>
    </div>
    </a>
    @endforeach
  </div>
</section>