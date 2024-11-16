@extends('admin.layouts.master')

@section('title')
    Thêm Địa Chỉ
@endsection

@section('body')
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
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

                        <div class="flex justify-end gap-2 mt-5">
                            <button type="button" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Hủy</button>
                            <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Lưu Địa Chỉ</button>
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
