<?php

namespace Modules\Itask\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdatePriorityRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [];
    }

    public function getValidator(){
        return $this->getValidatorInstance();
    }
}
