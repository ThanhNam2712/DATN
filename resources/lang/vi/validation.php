<?php

return [
    'required' => 'Trường :attribute là bắt buộc.',
    'email' => 'Địa chỉ email không hợp lệ.',
    'min' => [
        'string' => 'Trường :attribute phải có ít nhất :min ký tự.',
        'numeric' => 'Trường :attribute phải có giá trị ít nhất là :min.',
    ],
    'max' => [
        'string' => 'Trường :attribute không được quá :max ký tự.',
        'numeric' => 'Trường :attribute không được lớn hơn :max.',
    ],
    'confirmed' => 'Trường :attribute không khớp.',
    'unique' => 'Trường :attribute đã được sử dụng.',
    'numeric' => 'Trường :attribute phải là một số.',
    'string' => 'Trường :attribute phải là một chuỗi.',
    'date' => 'Trường :attribute phải là một ngày hợp lệ.',
    'boolean' => 'Trường :attribute phải là giá trị đúng/sai.',
    'in' => 'Trường :attribute không có giá trị hợp lệ.',
    'file' => 'Trường :attribute phải là một tệp tin.',
    'mimes' => 'Trường :attribute phải là một tệp có định dạng: :values.',
    'image' => 'Trường :attribute phải là một hình ảnh.',
    'size' => [
        'string' => 'Trường :attribute phải có độ dài bằng :size ký tự.',
        'numeric' => 'Trường :attribute phải có giá trị bằng :size.',
    ],
    'distinct' => 'Trường :attribute có giá trị trùng lặp.',
    'exists' => 'Trường :attribute không tồn tại.',
    'nullable' => 'Trường :attribute có thể bỏ trống.',
    'after' => 'Trường :attribute phải là ngày sau :date.',
    'before' => 'Trường :attribute phải là ngày trước :date.',
    'regex' => 'Trường :attribute không đúng định dạng.',
    'url' => 'Trường :attribute phải là một URL hợp lệ.',
];
