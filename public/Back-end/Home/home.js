const links = [
  { text: 'Thống kê doanh thu', href: 'thongke' },
  { text: 'Quản lí người dùng', href: 'User' },
  { text: 'Quản lí sản phẩm', href: 'products' },
  { text: 'Danh mục', href: 'category' },
  { text: 'Quản lí đơn hàng', href: 'manager' },
  { text: 'Quản lí bình luận', href: 'comment' },
  { text: 'Quản lí Shipper', href: 'shipper' }
];

const container = document.getElementById('menu-links');

// Nội dung cho các mục quản lí
      const thongke = `
        <div id="content">
          <h2>Thống kê doanh thu</h2>
        </div>
      `;

      const User = `
        <div id="content">
        
          <h2>Quản lí người dùng</h2>
            <p>Thông tin quản lí người dùng sẽ hiển thị ở đây.</p>
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
links.forEach(link => {
  const anchor = document.createElement('a');
  anchor.textContent = link.text;
  anchor.href = link.href || '#';
      
      if (link.text === 'Quản lí người dùng') {
        anchor.addEventListener('click', function(event) {
          event.preventDefault();
          document.getElementById('dynamic-content').innerHTML = User;
        });
      } else if (link.text === 'Quản lí sản phẩm') {
        anchor.addEventListener('click', function(event) {
          event.preventDefault();
          document.getElementById('dynamic-content').innerHTML = products;
        });
      } else if (link.text === 'Danh mục') {
        anchor.addEventListener('click', function(event) {
          event.preventDefault();
          document.getElementById('dynamic-content').innerHTML = category;
        });
      }else if (link.text === 'Thống kê doanh thu') {
        anchor.addEventListener('click', function(event) {
          event.preventDefault();
          document.getElementById('dynamic-content').innerHTML = thongke;
        });
      }else if (link.text === 'Quản lí đơn hàng') {
        anchor.addEventListener('click', function(event) {
          event.preventDefault();
          document.getElementById('dynamic-content').innerHTML = manager;
        });
      }else if (link.text === 'Quản lí bình luận') {
        anchor.addEventListener('click', function(event) {
          event.preventDefault();
          document.getElementById('dynamic-content').innerHTML = comment;
        });
      }else if (link.text === 'Quản lí Shipper') {
        anchor.addEventListener('click', function(event) {
          event.preventDefault();
          document.getElementById('dynamic-content').innerHTML = shipper;
        });
      }

  container.appendChild(anchor);
});


