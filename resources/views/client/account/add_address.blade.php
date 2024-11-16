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

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <!-- Tỉnh/Thành phố -->
                            <div>
                                <label for="provinceInput" class="inline-block mb-2 text-base font-medium">Tỉnh/Thành phố <span class="text-red-500">*</span></label>
                                <select name="Province" id="provinceInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500" required>
                                    <option value="" disabled selected>Chọn tỉnh/thành phố</option>
                                    @foreach ($citys as $city)
                                        <option value="{{ $city['ProvinceID'] }}" {{ old('Province') == $city['ProvinceID'] ? 'selected' : '' }}>{{ $city['ProvinceName'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Quận/Huyện -->
                            <div>
                                <label for="districtInput" class="inline-block mb-2 text-base font-medium">Quận/Huyện <span class="text-red-500">*</span></label>
                                <select name="district" id="districtInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500" required>
                                    <option value="" disabled selected>Chọn quận/huyện</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district['DistrictID'] }}" {{ old('district') == $district['DistrictID'] ? 'selected' : '' }}>{{ $district['DistrictName'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Xã/Phường -->
                            <div>
                                <label for="neighborhoodInput" class="inline-block mb-2 text-base font-medium">Xã/Phường</label>
                                <select name="Neighborhood" id="neighborhoodInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500">
                                    <option value="" disabled selected>Chọn phường/xã</option>
                                    @foreach ($wards as $ward)
                                        <option value="{{ $ward['WardCode'] }}" {{ old('Neighborhood') == $ward['WardCode'] ? 'selected' : '' }}>{{ $ward['WardName'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Địa chỉ cụ thể -->
                            <div>
                                <label for="apartmentInput" class="inline-block mb-2 text-base font-medium">Địa chỉ cụ thể <span class="text-red-500">*</span></label>
                                <input type="text" id="apartmentInput" name="Apartment" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500" value="{{ old('Apartment') }}" placeholder="Nhập địa chỉ cụ thể" required>
                            </div>
                        </div><!--end grid-->

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
    document.getElementById('provinceInput').addEventListener('change', function() {
        let province_id = this.value;
        fetch(`{{ url('/get-districts') }}?province_id=${province_id}`)
            .then(response => response.json())
            .then(data => {
                let districtSelect = document.getElementById('districtInput');
                districtSelect.innerHTML = '<option value="" disabled selected>Chọn quận/huyện</option>';
                data.forEach(district => {
                    let option = document.createElement('option');
                    option.value = district.DistrictID;
                    option.textContent = district.DistrictName;
                    districtSelect.appendChild(option);
                });

                // Xóa các lựa chọn xã/phường khi tỉnh thay đổi
                let neighborhoodSelect = document.getElementById('neighborhoodInput');
                neighborhoodSelect.innerHTML = '<option value="" disabled selected>Chọn phường/xã</option>';
            });
    });

    document.getElementById('districtInput').addEventListener('change', function() {
        let district_id = this.value;
        fetch(`{{ url('/get-wards') }}?district_id=${district_id}`)
            .then(response => response.json())
            .then(data => {
                let neighborhoodSelect = document.getElementById('neighborhoodInput');
                neighborhoodSelect.innerHTML = '<option value="" disabled selected>Chọn phường/xã</option>';
                data.forEach(ward => {
                    let option = document.createElement('option');
                    option.value = ward.WardCode;
                    option.textContent = ward.WardName;
                    neighborhoodSelect.appendChild(option);
                });
            });
    });
</script>

@endsection
