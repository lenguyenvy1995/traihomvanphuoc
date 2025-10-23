<?php

namespace Botble\ContactLinks\Forms;

use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\StatusFieldOption;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormAbstract;
use Botble\ContactLinks\Http\Requests\ContactLinksRequest;
use Botble\ContactLinks\Models\ContactLinks;

class ContactLinksForm extends FormAbstract
{
    public function setup(): void
    {
        $this
            ->model(ContactLinks::class)
            ->setValidatorClass(ContactLinksRequest::class)
            ->add('name', TextField::class, NameFieldOption::make()->required())
            ->add('status', SelectField::class, StatusFieldOption::make())
            ->setBreakFieldPoint('status');
    }
}
