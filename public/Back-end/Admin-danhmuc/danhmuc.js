const category = [
  {
    id: "1",
    name: "Áo Polo",
    quantity: "100",
    size: "20M, 20L, 10XL, 50XXL",
  },
  {
    id: "2",
    name: "Áo Phông",
    quantity: "20",
    size: "2M, 10L, 5XL, 8XXL",
  },
  {
    id: "3",
    name: "Quần Âu",
    quantity: "120",
    size: "20M, 40L, 10XL, 50XXL",
  },
];

function renderCategorys() {
  const tbody = document.getElementById("category-table-body");
  tbody.innerHTML = ""; // Xóa nội dung cũ

  category.forEach((categoryItem, index) => {
    const row = document.createElement("tr");
    row.innerHTML = `
          <td>${categoryItem.id}</td>
          <td>${categoryItem.name}</td>
          <td>${categoryItem.quantity}</td>      
          <td>${categoryItem.size}</td>  
          <td><button class="rejected">Delete</button></td>
      `;

    // Thêm sự kiện xóa danh mục
    const deleteButton = row.querySelector(".rejected");
    deleteButton.addEventListener("click", () => {
      const confirmDelete = confirm(
        `Bạn có chắc chắn muốn xóa danh mục "${categoryItem.name}" không?`
      );
      category.splice(index, 1); // Xóa danh mục khỏi mảng
      renderCategorys(); // Cập nhật lại bảng sau khi xóa
    });

    tbody.appendChild(row);
  });
}

export { renderCategorys };
