@extends('admin.layouts.master')

@section('title')
    Chỉnh sửa thông tin người dùng
@endsection

@section('body')
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">Chỉnh sửa người dùng</h6>

                <div class="mx-auto md:max-w-lg">
                    <form action="{{ route('auth.user.update') }}" method="POST">
                        @csrf
                        @method('PUT')

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
                            <div>
                                <label for="lastNameInput" class="inline-block mb-2 text-base font-medium">Tên <span class="text-red-500">*</span></label>
                                <input type="text" id="lastNameInput" name="name" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500" value="{{ old('name', $user->name) }}" placeholder="Nhập tên" required>
                            </div>
                            <div>
                                <label for="emailInput" class="inline-block mb-2 text-base font-medium">Email <span class="text-red-500">*</span></label>
                                <input type="email" id="emailInput" name="email" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500" value="{{ old('email', $user->email) }}" placeholder="example@gmail.com" required>
                            </div>
                            <div>
                                <label for="phoneNumberInput" class="inline-block mb-2 text-base font-medium">Số điện thoại</label>
                                <input type="number" id="phoneNumberInput" name="sdt" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500" value="{{ old('sdt', $user->sdt) }}" placeholder="+(84) 123 456 789">
                            </div>
                        </div><!--end grid-->

                        <div class="flex justify-end gap-2 mt-5">
                            <button type="button" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Hủy</button>
                            <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Cập nhật</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
