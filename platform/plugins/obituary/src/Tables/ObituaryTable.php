<?php

namespace Botble\Obituary\Tables;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Obituary\Models\Obituary;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\Actions\EditAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\Columns\CreatedAtColumn;
use Botble\Table\Columns\IdColumn;
use Botble\Table\Columns\NameColumn;
use Botble\Table\Columns\StatusColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class ObituaryTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(Obituary::class)
            ->addActions([
                EditAction::make()
                    ->route('obituary.edit'),
                DeleteAction::make()
                    ->route('obituary.destroy'),
            ]);
    }

    public function columns(): array
    {
        return [
            IdColumn::make(),
            NameColumn::make()->route('obituary.edit'),
            CreatedAtColumn::make(),
            StatusColumn::make(),
        ];
    }

    public function buttons(): array
    {
        return $this->addCreateButton(route('obituary.create'));
    }

    public function bulkActions(): array
    {
        return [
            DeleteBulkAction::make()->permission('obituary.destroy'),
        ];
    }

    public function getFilters(): array
    {
        return [
            'name' => [
                'title' => trans('core/base::tables.name'),
                'type' => 'text',
                'validate' => 'required|string|max:120',
            ],
            'status' => [
                'title' => trans('core/base::tables.status'),
                'type' => 'select',
                'choices' => BaseStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', BaseStatusEnum::values()),
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type' => 'date',
            ],
        ];
    }
}