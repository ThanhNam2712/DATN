document.addEventListener("DOMContentLoaded", function () {
    const citySelect = document.getElementById("citySelect");
    const districtSelect = document.getElementById("districtSelect");
    const wardSelect = document.getElementById("wardSelect");

    citySelect.addEventListener("change", async function () {
        const cityCode = this.value;

        if (cityCode) {
            try {
                // Gọi API để lấy quận/huyện
                const response = await fetch(`https://provinces.open-api.vn/api/p/${cityCode}?depth=2`);
                const data = await response.json();

                // Xóa dữ liệu cũ và bật lựa chọn quận/huyện
                districtSelect.innerHTML = `<option value="" selected>Choose District</option>`;
                wardSelect.innerHTML = `<option value="" selected>Choose Ward</option>`;
                districtSelect.disabled = false; // Bật chọn quận/huyện
                wardSelect.disabled = true; // Phường/xã tạm thời khóa

                // Điền dữ liệu quận/huyện
                data.districts.forEach(district => {
                    const option = document.createElement("option");
                    option.value = district.name; // Tương ứng với name="district"
                    option.textContent = district.name;
                    districtSelect.appendChild(option);
                });
            } catch (error) {
                console.error("Error fetching districts:", error);
                alert("Error loading districts. Please try again later.");
            }
        }
    });

    districtSelect.addEventListener("change", async function () {
        const districtCode = this.value;

        if (districtCode) {
            try {
                // Gọi API để lấy phường/xã
                const response = await fetch(`https://provinces.open-api.vn/api/d/${districtCode}?depth=2`);
                const data = await response.json();

                // Xóa dữ liệu cũ và bật lựa chọn phường/xã
                wardSelect.innerHTML = `<option value="" selected>Choose Ward</option>`;
                wardSelect.disabled = false; // Bật chọn phường/xã

                // Điền dữ liệu phường/xã
                data.wards.forEach(ward => {
                    const option = document.createElement("option");
                    option.value = ward.name; // Tương ứng với name="Apartment"
                    option.textContent = ward.name;
                    wardSelect.appendChild(option);
                });
            } catch (error) {
                console.error("Error fetching wards:", error);
                alert("Error loading wards. Please try again later.");
            }
        }
    });
});

