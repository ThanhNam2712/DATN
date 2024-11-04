import { renderUsers } from "../Admin-User/User.js";
import { renderProducts } from "../Admin-Sanpham/sanpham.js";
import { renderCategorys } from "../Admin-danhmuc/danhmuc.js";

const links = [
  { text: "Thống kê doanh thu", href: "thongke" },
  { text: "Quản lí người dùng", href: "#" },
  { text: "Quản lí sản phẩm", href: "products" },
  { text: "Danh mục", href: "category" },
  { text: "Quản lí đơn hàng", href: "manager" },
  { text: "Quản lí bình luận", href: "comment" },
  { text: "Quản lí Shipper", href: "shipper" },
];

const container = document.getElementById("menu-links");

const thongke = `
        <div id="content">
          <h2>Thống kê doanh thu</h2>
        </div>
      `;


const products = `
        <div id="content">
          <h2>Quản lí sản phẩm</h2>
        </div>
      `;

const category = `
        <div id="content">
          <h2>Danh mục</h2>
        </div>
      `;

const manager = `
        <div id="content">
          <h2>Quản lí đơn hàng</h2>
        </div>
      `;

const comment = `
        <div id="content">
          <h2>Quản lí bình luận</h2>
        </div>
      `;

const shipper = `
      <div id="content">
        <h2>Quản lí Shipper</h2>
      </div>
      `;

// Xử lý click để xổ nội dung
links.forEach((link) => {
  const anchor = document.createElement("a");
  anchor.textContent = link.text;

  anchor.href = link.href || "#";

  if (link.text === "Quản lí người dùng") {
    anchor.addEventListener("click", function (event) {
      event.preventDefault();
      fetch("../Admin-User/User.html") // Đường dẫn đến User.html
        .then((response) => response.text())
        .then((html) => {
          document.getElementById("dynamic-content").innerHTML = html;
          renderUsers(); // Gọi hàm renderUsers từ User.js để hiển thị dữ liệu
        })
        .catch((error) => {
          console.error("Error loading user management HTML:", error);
        });
    });

  } else if (link.text === "Quản lí sản phẩm") {
    anchor.addEventListener("click", function (event) {
      event.preventDefault();
      fetch("../Admin-Sanpham/sanpham.html") // Đường dẫn đến User.html
        .then((response) => response.text())
        .then((html) => {
          document.getElementById("dynamic-content").innerHTML = html;
          renderProducts(); // Gọi hàm renderUsers từ User.js để hiển thị dữ liệu
        })
        .catch((error) => {
          console.error("Error loading user management HTML:", error);
        });
    });
  } else if (link.text === "Danh mục") {
    anchor.addEventListener("click", function (event) {
      event.preventDefault();
      fetch("../Admin-danhmuc/danhmuc.html") // Đường dẫn đến User.html
        .then((response) => response.text())
        .then((html) => {
          document.getElementById("dynamic-content").innerHTML = html;
          renderCategorys(); // Gọi hàm renderUsers từ User.js để hiển thị dữ liệu
        })
        .catch((error) => {
          console.error("Error loading user management HTML:", error);
        });
    });
  } else if (link.text === "Thống kê doanh thu") {
    anchor.addEventListener("click", function (event) {
      event.preventDefault();
      document.getElementById("dynamic-content").innerHTML = thongke;
    });
  } else if (link.text === "Quản lí đơn hàng") {
    anchor.addEventListener("click", function (event) {
      event.preventDefault();
      document.getElementById("dynamic-content").innerHTML = manager;
    });
  } else if (link.text === "Quản lí bình luận") {
    anchor.addEventListener("click", function (event) {
      event.preventDefault();
      document.getElementById("dynamic-content").innerHTML = comment;
    });
  } else if (link.text === "Quản lí Shipper") {
    anchor.addEventListener("click", function (event) {
      event.preventDefault();
      document.getElementById("dynamic-content").innerHTML = shipper;
    });
  }

  container.appendChild(anchor);
});
