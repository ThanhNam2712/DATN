@extends('client.layouts.master')

@section('title')
    Thêm Địa Chỉ
@endsection

@section('body')<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">Thêm Địa Chỉ</h6>

                <div class="mx-auto md:max-w-lg">
                    <form action="{{ route('auth.address.store') }}" method="POST">
                        @csrf

                        @if ($errors->any())
                            <div class="mb-4 text-red-500">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="xl:col-span-12">
                          <label for="provinceInput" class="inline-block mb-2 text-base font-medium">Tỉnh/Thành phố</label>
                          <select id="provinces" name="Province" onchange="getProvinces(event)">
                              <option value="">-- select provinces --</option>
                          </select>
                          <input type="hidden" name="province_name" id="province_name">
                        </div>
                  
                        <div class="xl:col-span-12">
                          <label for="townCityInput" class="inline-block mb-2 text-base font-medium">Quận/Huyện</label>
                          <select id="districts" name="district" onchange="getDistricts(event)">
                              <option value="">-- select districts --</option>
                          </select>
                          <input type="hidden" name="district_name" id="district_name">
                        </div>
                  
                        <div class="xl:col-span-6">
                          <label for="apartmentInput" class="inline-block mb-2 text-base font-medium">Phường/Xã</label>
                          <select id="wards" name="Apartment" onchange="setWardName(event)">
                              <option value="">-- select wards --</option>
                          </select>
                          <input type="hidden" name="apartment_name" id="apartment_name">
                        </div>  
                        <div>
                          <label for="neighborhoodInput" class="inline-block mb-2 text-base font-medium">Xã/Phường</label>
                          <input type="text" id="neighborhoodInput" name="Neighborhood" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500"  placeholder="Nhập xã/phường">
                        </div>
                  
                        <div class="flex justify-end gap-2 mt-5">
                          <button type="submit" class="btn bg-custom-500 text-white">Lưu Địa Chỉ</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
  fetch('https://vn-public-apis.fpo.vn/provinces/getAll?limit=-1')
  .then(response => response.json())
  .then(data => {
      let provinces = data.data.data;
      provinces.map(value => {
          document.getElementById('provinces').innerHTML += 
              `<option value="${value.code}" data-name="${value.name}">${value.name}</option>`;
      });
  })
  .catch(error => console.error('Lỗi khi gọi API:', error));

function fetchDistricts(provinceCode) {
  fetch(`https://vn-public-apis.fpo.vn/districts/getByProvince?provinceCode=${provinceCode}&limit=-1`)
      .then(response => response.json())
      .then(data => {
          let districts = data.data.data;
          document.getElementById('districts').innerHTML = `<option value="">-- select districts --</option>`;
          if (districts) {
              districts.map(value => {
                  document.getElementById('districts').innerHTML += 
                      `<option value="${value.code}" data-name="${value.name}">${value.name}</option>`;
              });
          }
      })
      .catch(error => console.error('Lỗi khi gọi API:', error));
}

function fetchWards(districtCode) {
  fetch(`https://vn-public-apis.fpo.vn/wards/getByDistrict?districtCode=${districtCode}&limit=-1`)
      .then(response => response.json())
      .then(data => {
          let wards = data.data.data;
          document.getElementById('wards').innerHTML = `<option value="">-- select wards --</option>`;
          if (wards) {
              wards.map(value => {
                  document.getElementById('wards').innerHTML += 
                      `<option value="${value.code}" data-name="${value.name}">${value.name}</option>`;
              });
          }
      })
      .catch(error => console.error('Lỗi khi gọi API:', error));
}

// Lấy tên tỉnh và gán vào trường ẩn province_name
function getProvinces(event) {
  const selectedOption = event.target.options[event.target.selectedIndex];
  document.getElementById('province_name').value = selectedOption.getAttribute('data-name');
  fetchDistricts(event.target.value);  // Lấy quận của tỉnh đã chọn
  document.getElementById('wards').innerHTML = `<option value="">-- select wards --</option>`;
}

// Lấy tên quận và gán vào trường ẩn district_name
function getDistricts(event) {
  const selectedOption = event.target.options[event.target.selectedIndex];
  document.getElementById('district_name').value = selectedOption.getAttribute('data-name');
  fetchWards(event.target.value);  // Lấy phường của quận đã chọn
}

// Lấy tên phường và gán vào trường ẩn apartment_name
function setWardName(event) {
  const selectedOption = event.target.options[event.target.selectedIndex];
  document.getElementById('apartment_name').value = selectedOption.getAttribute('data-name');
}
</script>

@endsection
