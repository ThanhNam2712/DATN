@extends('admin.layouts.master')

@section('title')
Chỉnh Sửa Danh Mục Sản Phẩm
@endsection

@section('body')
<div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
    <div class="pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4">
        <div class="container-fluid mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Chỉnh Sửa Danh Mục Sản Phẩm</h5>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4 text-15">Form Chỉnh Sửa Danh Mục</h6>

                    <div class="mx-auto md:max-w-lg">
                        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Thêm phương thức PUT cho cập nhật -->

                            <input type="hidden" name="id" value="{{ $category->id }}"> <!-- Trường ẩn để gửi id -->

                            <div class="mb-4">
                                <label for="nameInput" class="inline-block mb-2 text-base font-medium">Tên Danh Mục <span class="text-red-500">*</span></label>
                                <input type="text" id="nameInput" name="name" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500" placeholder="Nhập tên danh mục" value="{{ old('name', $category->name) }}" required>
                                <p id="nameError" class="mt-1 text-sm text-red-500"></p>
                            </div>

                            <div class="mb-4">
                                <label for="imageInput" class="inline-block mb-2 text-base font-medium">Hình Ảnh <span class="text-red-500">*</span></label>
                                <input type="file" id="imageInput" name="image" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500">
                                <p id="imageError" class="mt-1 text-sm text-red-500"></p>
                                @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" width="100px" class="mt-2 w-32 h-32">
                                @endif
                            </div>

                            <div class="flex justify-end gap-2 mt-5">
                                <button type="button" class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">
                                    <i data-lucide="x" class="inline-block size-4"></i> <span class="align-middle">Hủy</span>
                                </button>
                                <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                    Cập Nhật Danh Mục
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="absolute right-0 bottom-0 px-4 h-14 border-t py-3 flex items-center dark:border-zink-600">
        <div class="w-full">
            <div class="grid items-center grid-cols-1 text-center lg:grid-cols-2 text-slate-400 dark:text-zink-200">
                <div>
                    <script>
                        document.write(new Date().getFullYear())
                    </script> StarCode Kh
                </div>
                <div class="hidden lg:block">
                    <div class="ltr:text-right rtl:text-left">
                        Design & Develop by StarCode Kh
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection
