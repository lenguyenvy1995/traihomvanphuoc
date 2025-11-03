<?php

namespace Botble\ContactLinks\Forms;

use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\StatusFieldOption;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormAbstract;
use Botble\ContactButtons\Http\Requests\ContactButtonsRequest;
use Botble\ContactButtons\Models\ContactButton;

class ContactButtonForm extends FormAbstract
{
    public function setup(): void
    {
        $this
            ->model(ContactButton::class)
            ->setValidatorClass(ContactButtonsRequest::class)
            ->add('name', TextField::class, NameFieldOption::make()->required())
            ->add('status', SelectField::class, StatusFieldOption::make())
            ->setBreakFieldPoint('status');
    }
}
