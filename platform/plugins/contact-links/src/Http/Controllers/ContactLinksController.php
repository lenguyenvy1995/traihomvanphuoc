<?php

namespace Botble\ContactLinks\Http\Controllers;

use Botble\Base\Http\Actions\DeleteResourceAction;
use Botble\ContactLinks\Http\Requests\ContactLinksRequest;
use Botble\ContactLinks\Models\ContactLinks;
use Botble\Base\Http\Controllers\BaseController;
use Botble\ContactLinks\Tables\ContactLinksTable;
use Botble\ContactLinks\Forms\ContactLinksForm;

class ContactLinksController extends BaseController
{
    public function __construct()
    {
        $this
            ->breadcrumb()
            ->add(trans(trans('plugins/contact links::contact-links.name')), route('contact-links.index'));
    }

    public function index(ContactLinksTable $table)
    {
        $this->pageTitle(trans('plugins/contact links::contact-links.name'));

        return $table->renderTable();
    }

    public function create()
    {
        $this->pageTitle(trans('plugins/contact links::contact-links.create'));

        return ContactLinksForm::create()->renderForm();
    }

    public function store(ContactLinksRequest $request)
    {
        $form = ContactLinksForm::create()->setRequest($request);

        $form->save();

        return $this
            ->httpResponse()
            ->setPreviousUrl(route('contact-links.index'))
            ->setNextUrl(route('contact-links.edit', $form->getModel()->getKey()))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function edit(ContactLinks $contactLinks)
    {
        $this->pageTitle(trans('core/base::forms.edit_item', ['name' => $contactLinks->name]));

        return ContactLinksForm::createFromModel($contactLinks)->renderForm();
    }

    public function update(ContactLinks $contactLinks, ContactLinksRequest $request)
    {
        ContactLinksForm::createFromModel($contactLinks)
            ->setRequest($request)
            ->save();

        return $this
            ->httpResponse()
            ->setPreviousUrl(route('contact-links.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    public function destroy(ContactLinks $contactLinks)
    {
        return DeleteResourceAction::make($contactLinks);
    }
}
