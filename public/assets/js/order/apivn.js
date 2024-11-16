fetch('https://provinces.open-api.vn/api/')
  .then(response => response.json())
  .then(data => {
    console.log(data);
  })
  .catch(error => {
    console.error('lỗi khi gọi api', error)
  }
  )