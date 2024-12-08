document.addEventListener("DOMContentLoaded", function () {
  // Tạo phần Header
  const header = document.createElement("header");
  header.innerHTML = `
    <div class="logo">
      <a href="../Home/Home.html">
        <img src="../../anh/logo.png" alt="Logo" />
      </a>
    </div>
    <nav>
      <ul>
        <li><a href="../../Home/Home.html">Trang chủ</a></li>
        <li><a href="../../gioithieu/gioithieu.html">Giới thiệu</a></li>
        <li><a href="../../lienhe/lienhe.html">Liên hệ</a></li>
        <li class="dropdown">
          <a href="#">Bộ sưu tập</a>
          <ul class="dropdown-menu">
            <li><a href="../polo/polo.html">Áo polo</a></li>
            <li><a href="../phong/phong.html">Áo phông</a></li>
            <li><a href="../quanaobo/quanaobo.html">Quần áo bộ</a></li>
            <li><a href="../somi/somi.html">Sơ mi</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <div class="header-icons">
      <form id="searchForm" onsubmit="return searchProduct()" style="display: flex; align-items: center; gap: 10px; border: 1px solid #ddd; padding: 8px; border-radius: 5px;">
        <input type="text" id="searchInput" placeholder="Tìm kiếm sản phẩm..." style="border: none; outline: none" />
        <button type="submit" style="background: none; border: none; cursor: pointer">🔍</button>
        <a href="../../Register/register.html" style="display: flex; align-items: center; justify-content: center">
          <svg width="24" height="24" fill="#007bff" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.86 0-7 3.14-7 7 0 .553.447 1 1 1h12c.553 0 1-.447 1-1 0-3.86-3.14-7-7-7z" />
          </svg>
        </a>
        <a href="../../DonHang/donhang.html" style="display: flex; align-items: center; justify-content: center">
          <svg width="24" height="24" fill="#007bff" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 18c-1.104 0-2 .897-2 2s.896 2 2 2 2-.897 2-2-.896-2-2-2zm10 0c-1.104 0-2 .897-2 2s.896 2 2 2 2-.897 2-2-.896-2-2-2zM7 6h13c.553 0 1 .447 1 1s-.447 1-1 1h-1.333l-1.085 4.86c-.168.754-.855 1.285-1.625 1.285h-5.358c-.77 0-1.457-.531-1.625-1.285L5.333 8H4C3.447 8 3 7.553 3 7s.447-1 1-1h3c.48 0 .897.34.98.807L7 6zm0 0z" />
          </svg>
        </a>
      </form>
    </div>
  `;
  const logoDiv = document.createElement("div");
  logoDiv.classList.add("logo");
  const logoLink = document.createElement("a");
  logoLink.href = "../../Home/Home.html";
  const logoImg = document.createElement("img");
  logoImg.src = "../../anh/logo.png";
  logoImg.alt = "Logo";
  logoLink.appendChild(logoImg);
  logoDiv.appendChild(logoLink);

  const nav = document.createElement("nav");
  const navList = document.createElement("ul");

  const navItems = [];

  navItems.forEach((item) => {
    const li = document.createElement("li");
    const a = document.createElement("a");
    a.href = item.href;
    a.textContent = item.text;
    li.appendChild(a);
    navList.appendChild(li);
  });

  // Thêm header vào body
  document.body.appendChild(header);

  // Tạo phần banner
  const bannerSection = document.createElement("section");
  bannerSection.classList.add("banner");

  const bannerContainer = document.createElement("div");
  bannerContainer.classList.add("banner-container");

  const bannerImages = [
    "../../../anh/banner/banner1.jpg",
    "../../..//anh/banner/banner2.jpg",
    "../../..//anh/banner/banner3.jpg",
    "../../..//anh/banner/banner4.jpg",
    "../../..//anh/banner/banner5.jpg",
    "../../..//anh/banner/banner6.jpg",
    "../../..//anh/banner/banner7.jpg",
    "../../..//anh/banner/banner8.jpg",
    "../../..//anh/banner/banner9.jpg",
    "../../..//anh/banner/banner10.jpg",
  ];

  bannerImages.forEach((src) => {
    const bannerSlide = document.createElement("div");
    bannerSlide.classList.add("banner-slide");
    const img = document.createElement("img");
    img.src = `../anh/banner/${src}`;
    img.alt = `Banner ${src}`;
    bannerSlide.appendChild(img);
    bannerContainer.appendChild(bannerSlide);
  });

  const bannerControls = document.createElement("div");
  bannerControls.classList.add("banner-controls");

  const prevButton = document.createElement("button");
  prevButton.classList.add("prev");
  prevButton.innerHTML = "&#10094;";
  prevButton.onclick = () => changeSlide(-1);

  const nextButton = document.createElement("button");
  nextButton.classList.add("next");
  nextButton.innerHTML = "&#10095;";
  nextButton.onclick = () => changeSlide(1);

  bannerControls.appendChild(prevButton);
  bannerControls.appendChild(nextButton);

  bannerSection.appendChild(bannerContainer);
  bannerSection.appendChild(bannerControls);

  // Thêm banner vào body
  document.body.appendChild(bannerSection);

  // Tạo phần sản phẩm mới
  const newProductsSection = document.createElement("section");
  newProductsSection.classList.add("new-products");

  const productTitle = document.createElement("h3");
  productTitle.textContent = "Áo Polo";

  const productHr = document.createElement("hr");

  const productContainer = document.createElement("div");
  productContainer.classList.add("product-container");

  const productImages = [
    {
      src: "../../anh/1.1.jpg",
      name: "Áo Polo LV trắng LikeAuth",
      price: 850000,
    },
    {
      src: "../../anh/2.1.jpg",
      name: "Áo Polo LV đen LikeAuth",
      price: 850000,
    },
    {
      src: "../../anh/3.1.jpg",
      name: "Áo Polo BBR xanh kẻ ô LikeAuth",
      price: 830000,
    },
    {
      src: "../../anh/5.1.jpg",
      name: "Áo Polo BBR xanh kẻ sọc ",
      price: 830000,
    },
  ];

  productImages.forEach((product, index) => {
    const productImageDiv = document.createElement("div");
    productImageDiv.classList.add("product-image");
    productImageDiv.id = `product-image-${index + 1}`;

    const img = document.createElement("img");
    img.src = `../anh/${product.src}`;
    img.alt = `Hình sản phẩm ${index + 1}`;
    productImageDiv.appendChild(img);

    // Tạo div chứa tên và giá sản phẩm
    const productInfoDiv = document.createElement("div");
    productInfoDiv.classList.add("product-info");

    const productName = document.createElement("p");
    productName.textContent = product.name;

    const productPrice = document.createElement("p");
    productPrice.textContent = `${product.price.toLocaleString()} đ`;

    productInfoDiv.appendChild(productName);
    productInfoDiv.appendChild(productPrice);
    productImageDiv.appendChild(productInfoDiv);

    // Tạo div chứa icon giỏ hàng
    const iconsDiv = document.createElement("div");
    iconsDiv.classList.add("icons");

    const cartButton = document.createElement("button");
    cartButton.classList.add("cart-icon");
    cartButton.onclick = () => addToCart(product.name, product.price);

    const cartImg = document.createElement("img");
    cartImg.src = "../../anh/cart.png";
    cartImg.alt = "Giỏ hàng";
    cartImg.width = 20;
    cartImg.height = 20;
    cartImg.addEventListener("click", function () {
      window.location.href = "../../ChiTietSp/chitiet.html"; // Thay đường dẫn này bằng URL bạn muốn chuyển đến
    });
    cartButton.appendChild(cartImg);
    iconsDiv.appendChild(cartButton);
    productImageDiv.appendChild(iconsDiv);

    productContainer.appendChild(productImageDiv);
  });

  newProductsSection.appendChild(productTitle);
  newProductsSection.appendChild(productHr);
  newProductsSection.appendChild(productContainer);

  // Thêm phần sản phẩm mới vào body
  document.body.appendChild(newProductsSection);

  // Tạo phần footer
  const footer = document.createElement("footer");

  const footerHr = document.createElement("hr");
  const footerContainer = document.createElement("div");
  footerContainer.classList.add("footer-container");

  const footerItems = [
    {
      title: "Shop AE Boutique",
      content:
        "Shop AE Boutique chuyên buôn, sỉ, lẻ, order hàng thời trang, giá tốt nhất thị trường. Nơi mua sắm mới nhất cho những khách hàng yêu quý.",
      socialIcons: [
        {
          href: "https://www.facebook.com/aeboutique69",
          src: "../../anh/fb.png",
          alt: "Facebook",
        },
        { href: "#", src: "../../anh/youtube.png", alt: "YouTube" },
      ],
    },
    {
      title: "Liên kết nhanh",
      links: [
        "Hướng dẫn đặt hàng",
        "Hướng dẫn thanh toán",
        "Chính sách đổi trả hàng",
        "Liên hệ với chúng tôi",
      ],
    },
    {
      title: "Chấp nhận thanh toán",

      paymentIcons: [{ src: "../../anh/momo.png", alt: "Momo" }],
    },
  ];

  // Xử lý từng phần tử footer
  footerItems.forEach((item) => {
    const footerItemDiv = document.createElement("div");
    footerItemDiv.classList.add("footer-item");

    const title = document.createElement("h5");
    title.textContent = item.title;
    footerItemDiv.appendChild(title);

    if (item.content) {
      const content = document.createElement("h6");
      content.textContent = item.content;
      footerItemDiv.appendChild(content);
    }

    if (item.socialIcons) {
      const socialIconsDiv = document.createElement("div");
      socialIconsDiv.classList.add("social-icons");

      item.socialIcons.forEach((icon) => {
        const a = document.createElement("a");
        a.href = icon.href;
        const img = document.createElement("img");
        img.src = icon.src;
        img.alt = icon.alt;
        a.appendChild(img);
        socialIconsDiv.appendChild(a);
      });

      footerItemDiv.appendChild(socialIconsDiv);
    }

    if (item.links) {
      const ul = document.createElement("ul");
      item.links.forEach((linkText) => {
        const li = document.createElement("li");
        const a = document.createElement("a");
        a.href = "#";
        a.textContent = linkText;
        li.appendChild(a);
        ul.appendChild(li);
      });
      footerItemDiv.appendChild(ul);
    }

    if (item.paymentIcons) {
      const paymentIconsDiv = document.createElement("div");
      paymentIconsDiv.classList.add("payment-icons");

      item.paymentIcons.forEach((icon) => {
        const img = document.createElement("img");
        img.src = icon.src;
        img.alt = icon.alt;
        paymentIconsDiv.appendChild(img);
      });

      footerItemDiv.appendChild(paymentIconsDiv);
    }

    footerContainer.appendChild(footerItemDiv);
  });

  footer.appendChild(footerHr);
  footer.appendChild(footerContainer);

  // Thêm footer vào body
  document.body.appendChild(footer);
});

// Hàm tạo icon
function createIconLink(href, src, alt) {
  const a = document.createElement("a");
  a.href = href;
  const img = document.createElement("img");
  img.src = src;
  img.alt = alt;
  a.appendChild(img);
  return a;
}

// Hàm chuyển slide
function changeSlide(direction) {
  console.log("Chuyển slide theo hướng:", direction);
}

// Hàm thêm vào giỏ hàng
function addToCart(productName, price) {
  console.log(
    `Sản phẩm: ${productName}, Giá: ${price} đã được thêm vào giỏ hàng`
  );
}
