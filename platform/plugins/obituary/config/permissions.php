<?php

return [
    ['name' => 'Cáo Phó: Xem danh sách', 'flag' => 'obituary.index'],
    ['name' => 'Cáo Phó: Thêm mới', 'flag' => 'obituary.create', 'parent_flag' => 'obituary.index'],
    ['name' => 'Cáo Phó: Sửa', 'flag' => 'obituary.edit', 'parent_flag' => 'obituary.index'],
    ['name' => 'Cáo Phó: Cập nhật', 'flag' => 'obituary.update', 'parent_flag' => 'obituary.index'],
    ['name' => 'Cáo Phó: Xóa', 'flag' => 'obituary.destroy', 'parent_flag' => 'obituary.index'],
];