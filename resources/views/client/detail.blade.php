@extends('client.master')
@section('New_Product')
@include('client.partials.new_product',['trends'=>$trends])
@endsection

@section('Main')
<link rel="stylesheet" href="/Front-end/ChiTietSp/chitit.css" />

<div class="main-content1">
          <!-- Hình ảnh sản phẩm và các lựa chọn thumbnail -->
          <div class="product-image-section1">
            <div class="product-thumbnails">
              @for ($i=0;$i<5;$i++)
              <img
                src="/Front-end/Ảnh/phông/z5656716018630_a4de478b1438777a35c47eaa4cd16c34-300x400.jpg"
                alt="Sofa {{$i}}"
                class="thumbnail"
                onclick="changeImage('sofa1.jpg')"
              />
              @endfor

            </div>
            <div class="product-main-image">
              <img
                src="/Front-end/Ảnh/phông/z5658081308673_a0f3018761202d2211712cde56ef3f88-300x400.jpg"
                id="main-product-image"
                alt="Main Sofa"
              />
            </div>
          </div>

          <div class="product-info">
            <h1>{{ $product->name }}</h1>
            <div class="price">{{ $product->variant->first()->price }}</div>
            <p>
              Setting the bar as one of the loudest speakers in its class, the
              Kilburn is a compact, stout-hearted hero with a well-balanced
              audio which boasts a clear midrange and extended highs for a
              sound.
            </p>
            <br />
            <!-- Chọn kích thước và màu sắc -->
            <div class="product-options">
              <div class="size-options">
                <label>Size:</label>
               @foreach ($product->variant as $size)
                      <button class="size-option" onclick="selectSize('{{ $size->size->name }}')"></button>
                @endforeach

                <button class="size-option" onclick="selectSize('XL')"></button>
                <button class="size-option" onclick="selectSize('XS')">
                  XS
                </button>
              </div>
              <br />

              <div class="color-options">
                <label>Color:</label>
                  @foreach($product->variant as $color)
                      <button
                          class="color-option black"
                          onclick="selectColor('{{ $color->color->name }}')"
                      ></button>
                  @endforeach

              </div>
            </div>
            <div class="product-actions">
              <label>Số Lượng:</label>
              <div class="quantity-input">
                <button class="minus-btn">-</button>
                <input type="text" value="1" min="1" id="quantity" />
                <button class="plus-btn">+</button>
              </div>

              <div class="button-group">
                <button id="buy-now">
                  <i class="fas fa-shopping-cart"></i> Mua hàng
                </button>
                <button id="add-to-cart">
                  <i class="fas fa-cart-plus"></i> Thêm giỏ hàng
                </button>
              </div>

            </div>
          </div>
        </div>




        <script src="/Front-end/ChiTietSp/chitiet.js"></script>
@endsection
