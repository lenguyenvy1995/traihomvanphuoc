<?php

namespace Botble\Tivatechbuttons\Forms;

use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\StatusFieldOption;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormAbstract;
use Botble\Tivatechbuttons\Http\Requests\TivatechbuttonsRequest;
use Botble\Tivatechbuttons\Models\Tivatechbuttons;

class TivatechbuttonsForm extends FormAbstract
{
    public function setup(): void
    {
        $this
            ->model(Tivatechbuttons::class)
            ->setValidatorClass(TivatechbuttonsRequest::class)
            ->add('name', TextField::class, NameFieldOption::make()->required())
            ->add('status', SelectField::class, StatusFieldOption::make())
            ->setBreakFieldPoint('status');
    }
}
