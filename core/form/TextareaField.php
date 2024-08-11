<?php

namespace app\core\form;

use app\core\Model;


class TextareaField extends BaseField
{
    public function renderInput(): string
    {
        return sprintf(
            '<textarea id="%s" name="%s" class="form-control %s" rows="3">%s</textarea>',
            $this->attribute,
            $this->attribute,
            $this->model->hasError($this->attribute) ? 'is-invalid' : '',
            $this->model->{$this->attribute}
        );
    }
}
