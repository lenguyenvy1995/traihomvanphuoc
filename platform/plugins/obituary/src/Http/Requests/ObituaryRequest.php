<?php

namespace Botble\Obituary\Http\Requests;

use Botble\Support\Http\Requests\Request;
use Illuminate\Support\Str;

class ObituaryRequest extends Request
{
    public function rules(): array
    {
        $obituaryId = $this->route('obituary') ? $this->route('obituary')->id : null;
    
        return [
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:obituaries,slug,' . $obituaryId,
            'avatar' => 'nullable|string|max:255',
            'funeral_host' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'funeral_program' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'date_of_death' => 'nullable|date',
            'place' => 'nullable|string|max:255',
            'status' => 'required|in:published,draft,pending',
            'account_holder' => 'nullable|string|max:191',
            'bank_name' => 'nullable|string|max:191',
            'account_number' => 'nullable|string|max:191',
            'wreath' => 'nullable|string|max:191',
        ];
    }
    public function prepareForValidation(): void
    {
        if (!$this->filled('slug') && $this->filled('name')) {
            $this->merge([
                'slug' => Str::slug($this->input('name')),
            ]);
        }
    }

    /**
     * Thông báo lỗi bằng tiếng Việt
     */
    public function messages(): array
    {
        return [
            'name.required'  => 'Vui lòng nhập tên người mất.',
            'name.max'       => 'Tên người mất không được vượt quá 255 ký tự.',
            'slug.unique'    => 'Đường dẫn (slug) đã tồn tại, vui lòng chọn giá trị khác.',
            'date_of_birth.date' => 'Ngày sinh không hợp lệ.',
            'date_of_death.date' => 'Ngày mất không hợp lệ.',
        ];
    }

    /**
     * Tên trường hiển thị thân thiện hơn
     */
    public function attributes(): array
    {
        return [
            'name' => 'tên người mất',
            'slug' => 'đường dẫn',
            'place' => 'nơi tổ chức / quê quán',
            'content' => 'nội dung cáo phó',
        ];
    }
}