@extends('admin.layouts.master')

@section('title')
@endsection
@section('body')
<div
    class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
            <div class="grow">
                <h5 class="text-16">Danh sách tài khoản</h5>
            </div>
            <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                <li
                    class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                    <a href="#!" class="text-slate-400 dark:text-zink-200">Tài khoản</a>
                </li>
                <li class="text-slate-700 dark:text-zink-100">
                    Danh sách tài khoản
                </li>
            </ul>
        </div>
        <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12">
            <div class="xl:col-span-12">
                <div class="card" id="usersTable">

                    <div class="!py-3.5 card-body border-y border-dashed border-slate-200 dark:border-zink-500">
                        <form action="{{ route('admin.users.index') }}" method="GET" class="relative xl:col-span-2">
                            <input type="text" name="email"
                                class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Tìm theo email..." autocomplete="off" value="{{ $searchEmail ?? '' }}">
                            <i data-lucide="search"
                                class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                        </form>

                    </div>
                    <div class="card-body">
                        <div class="-mx-5 -mb-5 overflow-x-auto">
                            <table class="w-full border-separate table-custom border-spacing-y-1 whitespace-nowrap">
                                <thead class="text-left">
                                    <tr
                                        class="relative rounded-md bg-slate-100 dark:bg-zink-600 after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">
                                            <div class="flex items-center h-full">

                                            </div>
                                        </th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                            data-sort="user-id"> ID</th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                            data-sort="name">Tên người dùng</th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                            data-sort="location">Địa chỉ</th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                            data-sort="email">Email</th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                            data-sort="phone-number">Số điện thoại</th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort"
                                            data-sort="status">Vai trò</th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach($users as $user)
                                    <tr class="relative rounded-md after:absolute ...">
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            <div class="flex items-center h-full">

                                            </div>
                                        </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            <a href="#!" class="transition-all duration-150 ease-linear ...">#{{
                                                $user->id }}</a>
                                        </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            <div class="flex items-center gap-2">
                                                <div class="flex items-center ...">
                                                    <img src="{{ asset('assets/images/avatar-2.png') }}"
                                                        alt="{{ $user->name }}" class="h-10 rounded-full">
                                                </div>
                                                <div class="grow">
                                                    <h6 class="mb-1"><a href="#!" class="name">{{ $user->name }}</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 location">
                                            @if($user->addresses->isNotEmpty())
                                            @foreach($user->addresses as $address)
                                            <div>-
                                                {{ $address->Apartment }}, {{ $address->Neighborhood }}, {{
                                                $address->district }}, {{ $address->Province }}
                                            </div>
                                            @endforeach
                                            @else
                                            Chưa có
                                            @endif
                                        </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 email">{{ $user->email }}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 phone-number">{{ $user->sdt ??
                                            'N/A' }}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            <span class="badge badge-soft-primary">{{ $user->role->name ?? 'Chưa có'
                                                }}</span>
                                        </td>

                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            <div class="relative dropdown">
                                                <button
                                                    class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20"
                                                    id="usersAction{{ $user->id }}" data-bs-toggle="dropdown">
                                                    <i data-lucide="more-horizontal" class="size-3"></i>
                                                </button>
                                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600 border-2 border-solid border-gray-300"
                                                    aria-labelledby="usersAction{{ $user->id }}">


                                                    <li>
                                                        <form action="{{ route('admin.users.block', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <textarea name="block_reason" id="block_reason"
                                                                    class=" border-gray-300 form-control"
                                                                    placeholder="---- NHẬP LÝ DO CHẶN ----"
                                                                    required></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="ri-lock-2-line"></i>
                                                                Chặn tài khoản</button>
                                                        </form>
                                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                                            class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200">
                                                            <i data-lucide="edit"
                                                                class="inline-block size-3 ltr:mr-1 rtl:ml-1"></i>
                                                            Sửa
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>



                            </table>


                            <div class="noresult" style="display: none">
                                <div class="py-6 text-center">
                                    <i data-lucide="search"
                                        class="w-6 h-6 mx-auto text-sky-500 fill-sky-100 dark:fill-sky-500/20"></i>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="mb-0 text-slate-500 dark:text-zink-200">We've searched more than 199+
                                        users We did not find any users for you search.</p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end grid-->
        <div class="flex flex-col items-center mt-8 md:flex-row">
            <div class="mb-4 grow md:mb-0">
                {{-- <p class="text-slate-500 dark:text-zink-200">Showing <b>10</b> of <b>57</b> Results
                </p> --}}
            </div>
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    new DataTable("#example", {
        order: [
            [0, 'desc']
        ]
    });
</script>

@endsection
