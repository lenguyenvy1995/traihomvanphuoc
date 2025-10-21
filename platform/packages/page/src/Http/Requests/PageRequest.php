<?php

namespace Botble\Page\Http\Requests;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Rules\MediaImageRule;
use Botble\Page\Supports\Template;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class PageRequest extends Request
{  protected function prepareForValidation(): void
    {
        $this->merge([
            'outstanding' => $this->has('outstanding') ? 1 : 0,
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string', 'max:400'],
            'content' => ['nullable', 'string'],
            'template' => [Rule::in(array_keys(Template::getPageTemplates()))],
            'status' => [Rule::in(BaseStatusEnum::values())],
            'outstanding' => ['nullable', 'numeric'],
            'image' => ['nullable', 'string', new MediaImageRule()],
        ];
    }
}
