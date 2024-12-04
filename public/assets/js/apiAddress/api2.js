document.addEventListener("DOMContentLoaded", function () {
    // Tìm tất cả các form với id động
    const forms = document.querySelectorAll("form[action*='client/profile/changeAddress']");

    forms.forEach((form) => {
        const citySelect = form.querySelector("[id^='citySelect']");
        const districtSelect = form.querySelector("[id^='districtSelect']");
        const wardSelect = form.querySelector("[id^='wardSelect']");

        // Khi thay đổi tỉnh
        citySelect.addEventListener("change", async function () {
            const cityCode = this.value;

            if (cityCode) {
                try {
                    // Gọi API lấy quận/huyện
                    const response = await fetch(`https://provinces.open-api.vn/api/p/${cityCode}?depth=2`);
                    const data = await response.json();

                    // Xóa dữ liệu cũ và cập nhật quận/huyện
                    districtSelect.innerHTML = `<option value="" selected>Choose District</option>`;
                    wardSelect.innerHTML = `<option value="" selected>Choose Ward</option>`;
                    districtSelect.disabled = false; // Mở khóa quận/huyện
                    wardSelect.disabled = true; // Khóa phường/xã

                    data.districts.forEach((district) => {
                        const option = document.createElement("option");
                        option.value = district.code; // Tương ứng với name="district"
                        option.textContent = district.name;
                        districtSelect.appendChild(option);
                    });
                } catch (error) {
                    console.error("Error fetching districts:", error);
                    alert("Error loading districts. Please try again later.");
                }
            } else {
                districtSelect.innerHTML = `<option value="" selected>Choose District</option>`;
                wardSelect.innerHTML = `<option value="" selected>Choose Ward</option>`;
                districtSelect.disabled = true;
                wardSelect.disabled = true;
            }
        });

        // Khi thay đổi quận/huyện
        districtSelect.addEventListener("change", async function () {
            const districtCode = this.value;

            if (districtCode) {
                try {
                    // Gọi API lấy phường/xã
                    const response = await fetch(`https://provinces.open-api.vn/api/d/${districtCode}?depth=2`);
                    const data = await response.json();

                    // Xóa dữ liệu cũ và cập nhật phường/xã
                    wardSelect.innerHTML = `<option value="" selected>Choose Ward</option>`;
                    wardSelect.disabled = false; // Mở khóa phường/xã

                    data.wards.forEach((ward) => {
                        const option = document.createElement("option");
                        option.value = ward.code; // Tương ứng với name="Apartment"
                        option.textContent = ward.name;
                        wardSelect.appendChild(option);
                    });
                } catch (error) {
                    console.error("Error fetching wards:", error);
                    alert("Error loading wards. Please try again later.");
                }
            } else {
                wardSelect.innerHTML = `<option value="" selected>Choose Ward</option>`;
                wardSelect.disabled = true;
            }
        });
    });
});
