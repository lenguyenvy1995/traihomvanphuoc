<?php

namespace Botble\Obituary\Http\Controllers;

use Botble\Base\Http\Controllers\BaseController;
use Botble\Obituary\Models\Obituary;
use Botble\Obituary\Forms\ObituaryForm;
use Botble\Obituary\Http\Requests\ObituaryRequest;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Obituary\Tables\ObituaryTable;
class ObituaryController extends BaseController
{
    public function index(ObituaryTable $table)
    {
        $this->pageTitle(trans('plugins/foo::items.name'));

        return $table->renderTable();
    }


    public function create()
    {
        $this->pageTitle(trans('plugins/obituary::items.create'));

        return ObituaryForm::create()->renderForm();
    }

    public function store(ObituaryRequest $request, BaseHttpResponse $response)
    {
        $data = $request->validated();
        $item = Obituary::create($data);

        event(new CreatedContentEvent('obituary', $request, $item));

        return $response
            ->setPreviousUrl(route('obituary.index'))
            ->setNextUrl(route('obituary.edit', $item->id))
            ->setMessage('Tạo cáo phó thành công!');
    }

    public function edit(Obituary $obituary)
    {
        $this->pageTitle(trans('plugins/foo::items.edit') . ' "' . $obituary->name . '"');

        return ObituaryForm::createFromModel($obituary)->renderForm();
    }

    public function update(Obituary $obituary, ObituaryRequest $request, BaseHttpResponse $response)
    {
        $data = $request->validated();
        $obituary->update($data);

        event(new UpdatedContentEvent('obituary', $request, $obituary));

        return $response
            ->setPreviousUrl(route('obituary.index'))
            ->setMessage('Cập nhật cáo phó thành công!');
    }

    public function destroy(Obituary $obituary, BaseHttpResponse $response)
    {
        $obituary->delete();
        event(new DeletedContentEvent('obituary', request(), $obituary));
        return $response->setMessage('Xóa cáo phó thành công!');
    }
}