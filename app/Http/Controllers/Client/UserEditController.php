<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserEditController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $address = $user->addresses;

        return view('client.account.index', compact('user', 'address'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('client.account.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Xác thực dữ liệu đầu vào
        $data = $request->validate([
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'sdt' => 'nullable|numeric', // Nếu có số điện thoại
            'password' => 'nullable|min:4|max:100',
        ]);

        // Băm mật khẩu nếu có thay đổi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);
        return redirect()->route('auth.user.account')->with('success', 'Thông tin người dùng đã được cập nhật.');
    }

public function addAddresses()
{
    try {
        // Lấy tỉnh/thành phố từ GHN API
        $response = Http::withHeaders([
            'token' => '33d38975-8f97-11ef-b065-1e41f6c66bec'
        ])->get('https://online-gateway.ghn.vn/shiip/public-api/master-data/province');
        $citys = json_decode($response->body(), true);

        // Lấy quận/huyện từ GHN API (dựa trên tỉnh/thành phố đầu tiên nếu chưa có dữ liệu)
        $province_id = old('Province') ?? ($citys['data'][0]['ProvinceID'] ?? null);
        $response = Http::withHeaders([
            'token' => '33d38975-8f97-11ef-b065-1e41f6c66bec'
        ])->get('https://online-gateway.ghn.vn/shiip/public-api/master-data/district', [
            'province_id' => $province_id,
        ]);
        $districts = json_decode($response->body(), true);

        // Lấy phường/xã từ GHN API (dựa trên quận/huyện đầu tiên nếu chưa có dữ liệu)
        $district_id = old('district') ?? ($districts['data'][0]['DistrictID'] ?? null);
        $response = Http::withHeaders([
            'token' => '33d38975-8f97-11ef-b065-1e41f6c66bec'
        ])->get('https://online-gateway.ghn.vn/shiip/public-api/master-data/ward', [
            'district_id' => $district_id,
        ]);
        $wards = json_decode($response->body(), true);

        // Trả về view với dữ liệu từ các API
        return view('client.account.add_address', [
            'citys' => $citys['data'],   // Tỉnh/Thành phố
            'districts' => $districts['data'], // Quận/Huyện
            'wards' => $wards['data'],   // Phường/Xã
        ]);
    } catch (\Exception $e) {
        // Nếu có lỗi (ví dụ như không thể lấy dữ liệu từ API), hiển thị thông báo lỗi
        return redirect()->route('user.login')->with('error', 'Lỗi khi lấy thông tin địa chỉ');
    }
}

public function getDistricts(Request $request)
{
    try {
        $province_id = $request->input('province_id');
        $response = Http::withHeaders([
            'token' => '33d38975-8f97-11ef-b065-1e41f6c66bec'
        ])->get('https://online-gateway.ghn.vn/shiip/public-api/master-data/district', [
            'province_id' => $province_id,
        ]);
        $districts = json_decode($response->body(), true);
        return response()->json($districts['data']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Không thể tải quận/huyện'], 500);
    }
}

public function getWards(Request $request)
{
    try {
        $district_id = $request->input('district_id');
        $response = Http::withHeaders([
            'token' => '33d38975-8f97-11ef-b065-1e41f6c66bec'
        ])->get('https://online-gateway.ghn.vn/shiip/public-api/master-data/ward', [
            'district_id' => $district_id,
        ]);
        $wards = json_decode($response->body(), true);
        return response()->json($wards['data']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Không thể tải xã/phường'], 500);
    }
}
public function storeAddAddress(Request $request)
{
    // Xử lý Validation
    $data = $request->validate([
        'Province' => 'required|string|max:100',
        'district' => 'required|string|max:100',
        'Neighborhood' => 'nullable|string|max:100',
        'Apartment' => 'required|string|max:255',
    ]);

    // Cập nhật giá trị cho 'Neighborhood' nếu nó không có
    $data['Neighborhood'] = $data['Neighborhood'] ?? null;

    // Lưu địa chỉ mới vào cơ sở dữ liệu cho người dùng đã đăng nhập
    auth()->user()->addresses()->create([
        'Province' => $data['Province'],   // Đảm bảo trường 'Province' được truyền vào
        'district' => $data['district'],    // Truyền 'district' vào
        'Neighborhood' => $data['Neighborhood'],  // Truyền 'Neighborhood' vào
        'Apartment' => $data['Apartment'],  // Truyền 'Apartment' vào
        'status' => $request->input('status', 0),  // Nếu không có status, mặc định là 0
    ]);

    // Chuyển hướng về trang tài khoản với thông báo thành công
    return redirect()->route('auth.user.account')->with('success', 'Địa chỉ đã được thêm thành công.');
}


    public function editAddress($id)
    {
        $address = auth()->user()->addresses()->findOrFail($id);
        return view('client.account.edit_address', compact('address'));
    }

    public function updateAddress(Request $request, $id)
    {
        $address = auth()->user()->addresses()->findOrFail($id);
        $data = $request->validate([
            'Province' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'Neighborhood' => 'nullable|string|max:100',
            'Apartment' => 'nullable|string|max:100',
        ]);

        $address->update($data);

        return redirect()->route('auth.user.account')->with('success', 'Địa chỉ đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $address = auth()->user()->addresses()->findOrFail($id);

        $address->delete();

        return redirect()->route('auth.user.account')->with('success', 'Địa chỉ đã được xóa thành công.');
    }
}
