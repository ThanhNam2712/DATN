<div>
<h3>Sản Phẩm Nổi Bật</h3>
  <hr>
  <div class="product-grid">
    @foreach ($trends as $list)
    <div class="product">
      <img src="{{Storage::url($list->image)}}" alt="Áo Adidas" />
      <h4>{{$list->name}}</h4>
      <p>Giá: {{$list->variant->first()->price}} VNĐ</p>
      @if ($list->variant->first()->price_sale < $list->variant->first()->price)
      <p>Giá Sale: {{$list->variant->first()->price_sale}} VNĐ</p>
      @else
      <!-- <p style="visibility: hidden;">helo</p> -->
      @endif
      
    </div>
    @endforeach
  </div>