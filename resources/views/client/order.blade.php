@extends('client.master')
@section('Main')
<link rel="stylesheet" href="/Front-end/ThanhToan/pay.css">
<div class="container">
    <div class="checkout-form">
        <div class="left-section">
            <h2>Thanh toán và giao hàng</h2>
            <form action="{{ route('admin.order.create') }}" method="POST">
            @csrf
            <div class="checkout-form">

                <div class="xl:col-span-3">
                    <label for="firstNameInput" class="inline-block mb-2 text-base font-medium">First Name</label>
                    <input type="text" id="firstNameInput" name="first_name" value="{{ $user->name }}" class="form-input" placeholder="Enter First Name">
                </div>

                <!-- Phone Number -->
                <div class="xl:col-span-3">
                    <label for="phoneNumberInput" class="inline-block mb-2 text-base font-medium">Phone Number</label>
                    <input type="text" id="phoneNumberInput" name="phone" value="{{ $user->sdt ?? 'Chưa có thông tin' }}" class="form-input" placeholder="(012) 345 678 9010">
                </div>

                <!-- Address Information (Optional) -->
                @if($address->isNotEmpty())
                    @foreach ($address as $item)
                        <div class="xl:col-span-12">
                            <label for="provinceInput" class="inline-block mb-2 text-base font-medium">Tỉnh/Thành phố</label>
                            <input type="text" id="Province" name="Province" value="{{ $item->Province }}" class="form-input" placeholder="Enter Province">
                        </div>

                        <div class="xl:col-span-12">
                            <label for="townCityInput" class="inline-block mb-2 text-base font-medium">Quận/Huyện</label>
                            <input type="text" id="district" name="district" value="{{ $item->district }}" class="form-input" placeholder="Enter District">
                        </div>

                        <div class="xl:col-span-6">
                            <label for="neighborhoodInput" class="inline-block mb-2 text-base font-medium">Neighborhood</label>
                            <input type="text" id="neighborhoodInput" name="Neighborhood" value="{{ $item->Neighborhood }}" class="form-input" placeholder="Enter Neighborhood">
                        </div>

                        <div class="xl:col-span-6">
                            <label for="Apartment" class="inline-block mb-2 text-base font-medium">Địa chỉ cụ thể</label>
                            <input type="text" id="Apartment" name="Apartment" value="{{ $item->Apartment }}" class="form-input" placeholder="Enter Apartment">
                        </div>
                        {{--  <select id='provinces' onchange='getProvinces(event)'>
                            <option value=''>-- select provinces --</option>
                          </select>
                          <select id='districts' onchange='getDistricts(event)'>
                            <option value=''>-- select districts --</option>
                          </select>
                          <select id='wards'>
                            <option value=''>-- select wards --</option>
                          </select>  --}}
                    @endforeach
                @else
                    <!-- Form for adding new address -->
                    
                    <div class="xl:col-span-12">
                        <label for="provinceInput" class="inline-block mb-2 text-base font-medium">Tỉnh/Thành phố</label>
                        <select id='provinces' name="Province" onchange='getProvinces(event)'>
                            <option value=''>-- select provinces --</option>
                          </select>
                    </div>

                    <div class="xl:col-span-12">
                        <label for="townCityInput" class="inline-block mb-2 text-base font-medium">Quận/Huyện</label>
                        <select id='districts' name="district" onchange='getDistricts(event)'>
                            <option value=''>-- select districts --</option>
                          </select>
                    </div>

                    <div class="xl:col-span-6">
                        <label for="neighborhoodInput" class="inline-block mb-2 text-base font-medium">Neighborhood</label>
                        <input type="text" id="Neighborhood" name="Neighborhood" class="form-input" placeholder="Enter Neighborhood">
                    </div>

                    <div class="xl:col-span-6">
                        <label for="apartmentInput" class="inline-block mb-2 text-base font-medium">Địa chỉ cụ thể</label>
                        <select id='wards' name="Apartment">
                            <option value=''>-- select wards --</option>
                          </select>
                    </div>
                @endif

            </div>

            <h2>Thông tin bổ sung</h2>
            <textarea placeholder="Ghi chú đơn hàng..."></textarea>

            <h2>Thanh toán</h2>

            <label><input type="radio" name="payment" value="Chuyển khoản ngân hàng"> Chuyển khoản ngân hàng</label>


            <p class="note">
                Thông tin cá nhân sẽ được sử dụng để xử lý đơn hàng, tăng trải nghiệm sử dụng website.
            </p>
            <input type="hidden" class="order_total_amount" name="total_amount" value="{{ $cart->total_amuont }}">
            <button class="checkout-button" type="submit">Đặt hàng</button>
        </form>
        </div>

        <div class="right-section">
            <h2>Đơn hàng của bạn</h2>
            @foreach ($cart->cartDetail as $key => $list)
                <table id="order-summary">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th class="text-end">Tạm tính</th>
                    </tr>
                    </thead>
                <tbody>
                    <tr>
                        <td class="d-flex align-items-center">
                            <div class="me-3">
                                <img src="{{ Storage::url($list->product->image) }}" width="70px" alt="Product Image" class="rounded">
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">
                                    <a href="apps-ecommerce-product-overview.html" class="text-decoration-none text-dark">{{ $list->product->name }}</a>
                                </h6>
                                <p class="mb-0 text-muted">{{ number_format($list->product_variant->price_sale) }}₫ x {{ $list->quantity }}</p>
                            </div>
                        </td>
                        <td class="text-end">{{ number_format($list->product_variant->price_sale * $list->quantity) }}₫</td>
                    </tr>
                   
                </tbody> 
                    <tr>
                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 text-slate-500 dark:text-zink-200">
                            <input type="text" name="coupon" id="couponApply" class="form-control" placeholder="Coupon Client">
                        </td>
                        <td class="px-3.5 py-3 first:pl-0 last:pr-0 ltr:text-right rtl:text-left">
                            <a href="javascript:couponApply()">
                                <button type="button" class="btn btn-primary"><span class="align-middle">Place Order</span></button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Tạm Tính</strong></td>
                        <td>{{ number_format($list->product_variant->price_sale * $list->quantity) }}₫</td>
                    </tr>
                    <tr>
                        <td><strong><h4>Tổng:</h4></strong></td>
                        <td><h5>{{ number_format($list->product_variant->price_sale * $list->quantity) }}₫</h5></td>
                        
                    </tr>
                </table>
                
            @endforeach
           
        </div>

    </div>
</div>
<script>
    fetch('https://vn-public-apis.fpo.vn/provinces/getAll?limit=-1')
    .then(response => response.json())
    .then(data => {
      let provinces = data.data.data;
      provinces.map(value => document.getElementById('provinces').innerHTML += `<option value='${value.code}'>${value.name}</option>`);
    })
    .catch(error => {
      console.error('Lỗi khi gọi API:', error);
    });
  
  function fetchDistricts (provincesID) {
    fetch(`https://vn-public-apis.fpo.vn/districts/getByProvince?provinceCode=${provincesID}&limit=-1`)
      .then(response => response.json())
      .then(data => {
        let districts = data.data.data;
        document.getElementById('districts').innerHTML = `<option value=''>-- select districts --</option>`;
        if (districts !== undefined) {
          districts.map(value => document.getElementById('districts').innerHTML += `<option value='${value.code}'>${value.name}</option>`);
        }
      })
      .catch(error => {
        console.error('Lỗi khi gọi API:', error);
      });
  }
  
  function fetchWards (districtsID) {
    fetch(`https://vn-public-apis.fpo.vn/wards/getByDistrict?districtCode=${districtsID}&limit=-1`)
      .then(response => response.json())
      .then(data => {
        let wards = data.data.data;
        document.getElementById('wards').innerHTML = `<option value=''>-- select wards --</option>`;
        if (wards !== undefined) {
          wards.map(value => document.getElementById('wards').innerHTML += `<option value='${value.code}'>${value.name}</option>`);
        }
      })
      .catch(error => {
        console.error('Lỗi khi gọi API:', error);
      });
  }
  
  function getProvinces (event) {
    fetchDistricts(event.target.value);
    document.getElementById('wards').innerHTML = `<option value=''>-- select wards --</option>`;
  }
  
  function getDistricts (event) {
    fetchWards(event.target.value);
  }
  
</script>
@endsection