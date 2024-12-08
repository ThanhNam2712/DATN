document.getElementById('fileInput').addEventListener('change', function(event) {
    const files = Array.from(event.target.files);
    const previewContainer = document.getElementById('previewContainer');

    previewContainer.innerHTML = '';  // Xóa nội dung cũ
    if (files.length > 5){
        alert('You are allowed a maximum of 5 photo')
        document.getElementById('fileInput').value = '';
        return
    }
    files.forEach((file, index) => {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imageWrapper = document.createElement('div');
                imageWrapper.classList.add('border', 'rounded', 'border-slate-200', 'p-2', 'relative');

                const imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                imgElement.alt = file.name;
                imgElement.style.width = '100px';
                imgElement.style.height = '100px';
                imgElement.classList.add('object-cover');

                const fileName = document.createElement('p');
                fileName.textContent = file.name;
                fileName.classList.add('text-xs', 'mt-2', 'text-center');

                const fileSize = document.createElement('p');
                fileSize.textContent = `${(file.size / 1024).toFixed(1)} KB`;
                fileSize.classList.add('text-xs', 'text-center');

                // Thêm nút xóa cho từng ảnh
                const removeButton = document.createElement('button');
                removeButton.textContent = 'Xóa';
                removeButton.classList.add('bg-red-500', 'text-white', 'text-xs', 'mt-2', 'px-2', 'py-1');
                removeButton.addEventListener('click', () => {
                    previewContainer.removeChild(imageWrapper); // Xóa ảnh khỏi giao diện
                    files.splice(index, 1); // Xóa ảnh từ danh sách file
                    updateFileInput(files); // Cập nhật lại dữ liệu trong input file
                });

                imageWrapper.appendChild(imgElement);
                imageWrapper.appendChild(fileName);
                imageWrapper.appendChild(fileSize);
                imageWrapper.appendChild(removeButton);

                previewContainer.appendChild(imageWrapper);
            };
            reader.readAsDataURL(file);
        }
    });
});

// Hàm cập nhật lại file input mà không xóa hết dữ liệu
function updateFileInput(files) {
    // Tạo một đối tượng DataTransfer để thao tác với input file
    const dataTransfer = new DataTransfer();

    files.forEach(file => {
        dataTransfer.items.add(file); // Thêm từng file vào đối tượng DataTransfer
    });

    // Cập nhật lại file input với dữ liệu mới
    document.getElementById('fileInput').files = dataTransfer.files;
}
