<?php

namespace Botble\ContactLinks\Tables;

use Botble\ContactLinks\Models\ContactLinks;
use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\Actions\EditAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\BulkChanges\CreatedAtBulkChange;
use Botble\Table\BulkChanges\NameBulkChange;
use Botble\Table\BulkChanges\StatusBulkChange;
use Botble\Table\Columns\CreatedAtColumn;
use Botble\Table\Columns\IdColumn;
use Botble\Table\Columns\NameColumn;
use Botble\Table\Columns\StatusColumn;
use Botble\Table\HeaderActions\CreateHeaderAction;
use Illuminate\Database\Eloquent\Builder;

class ContactLinksTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(ContactLinks::class)
            ->addHeaderAction(CreateHeaderAction::make()->route('contact-links.create'))
            ->addActions([
                EditAction::make()->route('contact-links.edit'),
                DeleteAction::make()->route('contact-links.destroy'),
            ])
            ->addColumns([
                IdColumn::make(),
                NameColumn::make()->route('contact-links.edit'),
                CreatedAtColumn::make(),
                StatusColumn::make(),
            ])
            ->addBulkActions([
                DeleteBulkAction::make()->permission('contact-links.destroy'),
            ])
            ->addBulkChanges([
                NameBulkChange::make(),
                StatusBulkChange::make(),
                CreatedAtBulkChange::make(),
            ])
            ->queryUsing(function (Builder $query) {
                $query->select([
                    'id',
                    'name',
                    'created_at',
                    'status',
                ]);
            });
    }
}
