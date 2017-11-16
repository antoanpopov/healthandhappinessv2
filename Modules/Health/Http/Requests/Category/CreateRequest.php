<?php

namespace Modules\Health\Http\Requests\Category;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateRequest extends BaseFormRequest
{
    public function translationRules()
    {
        return [
            'title' => 'required',
            'abstract' => 'required',
            'content' => 'required',
        ];
    }

    public function rules()
    {
        return [
//            'namespace' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }
}
