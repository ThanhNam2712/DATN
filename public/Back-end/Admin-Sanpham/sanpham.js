const products = [
  {
    id: "1",
    name: "Áo Polo Gucci",
    image: "https://picsum.photos/id/18/300/300",
    price: "1500",
    description: "Áo Polo Gucci chất liệu thun co dãi 4 chiều",
    size: "L",
    danhmuc: "Áo Polo",
  },
  {
    id: "2",
    name: "Áo Phông Dior",
    image: "https://picsum.photos/id/19/300/300",
    price: "1600",
    description: "Áo Phông chất liệu thun co dãi 4 chiều",
    size: "M",
    danhmuc: "Áo Phông",
  },
];

function renderProducts() {
  const tbody = document.getElementById("product-table-body");
  tbody.innerHTML = ""; // Xóa nội dung cũ

  products.forEach((product, index) => {
    const row = document.createElement("tr");
    row.innerHTML = `
          <td>${product.id}</td>
          <td>${product.name}</td>
          <td><img src="${product.image}" alt="${product.name}" width="100" height="100"></td>
          <td>${product.price}</td>
          <td>${product.description}</td>
          <td>${product.size}</td>
          <td>${product.danhmuc}</td>
          <td>
            <button class="rejected">Delete</button>
            <button class="verified">Update</button>
          </td>
      `;

    // Thêm sự kiện xóa sản phẩm
    const deleteButton = row.querySelector(".rejected");
    deleteButton.addEventListener("click", () => {
      const confirmDelete = confirm(
        `Bạn có chắc chắn muốn xóa sản phẩm "${product.name}" không?`
      );
      if (confirmDelete) {
        products.splice(index, 1); // Xóa sản phẩm khỏi mảng
        renderProducts(); // Cập nhật lại bảng sau khi xóa
      }
    });

    tbody.appendChild(row);
  });
}

export { renderProducts };
