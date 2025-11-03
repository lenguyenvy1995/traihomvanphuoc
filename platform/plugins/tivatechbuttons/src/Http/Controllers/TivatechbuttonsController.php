<?php

namespace Botble\Tivatechbuttons\Http\Controllers;

use Botble\Base\Http\Actions\DeleteResourceAction;
use Botble\Tivatechbuttons\Http\Requests\TivatechbuttonsRequest;
use Botble\Tivatechbuttons\Models\Tivatechbuttons;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Tivatechbuttons\Tables\TivatechbuttonsTable;
use Botble\Tivatechbuttons\Forms\TivatechbuttonsForm;

class TivatechbuttonsController extends BaseController
{
    public function __construct()
    {
        $this
            ->breadcrumb()
            ->add(trans(trans('plugins/tivatechbuttons::tivatechbuttons.name')), route('tivatechbuttons.index'));
    }

    public function index(TivatechbuttonsTable $table)
    {
        $this->pageTitle(trans('plugins/tivatechbuttons::tivatechbuttons.name'));

        return $table->renderTable();
    }

    public function create()
    {
        $this->pageTitle(trans('plugins/tivatechbuttons::tivatechbuttons.create'));

        return TivatechbuttonsForm::create()->renderForm();
    }

    public function store(TivatechbuttonsRequest $request)
    {
        $form = TivatechbuttonsForm::create()->setRequest($request);

        $form->save();

        return $this
            ->httpResponse()
            ->setPreviousUrl(route('tivatechbuttons.index'))
            ->setNextUrl(route('tivatechbuttons.edit', $form->getModel()->getKey()))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function edit(Tivatechbuttons $tivatechbuttons)
    {
        $this->pageTitle(trans('core/base::forms.edit_item', ['name' => $tivatechbuttons->name]));

        return TivatechbuttonsForm::createFromModel($tivatechbuttons)->renderForm();
    }

    public function update(Tivatechbuttons $tivatechbuttons, TivatechbuttonsRequest $request)
    {
        TivatechbuttonsForm::createFromModel($tivatechbuttons)
            ->setRequest($request)
            ->save();

        return $this
            ->httpResponse()
            ->setPreviousUrl(route('tivatechbuttons.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(Tivatechbuttons $tivatechbuttons)
    {
        return DeleteResourceAction::make($tivatechbuttons);
    }
}
