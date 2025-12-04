<?php

namespace Botble\Obituary\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Botble\Base\Models\BaseModel;
use Botble\Base\Models\Concerns\HasSlug;
use Botble\LanguageAdvanced\Models\LanguageMeta;

class Obituary extends BaseModel
{
    use HasSlug;

    protected $table = 'obituaries';
    protected $fillable = [
        'name',
        'slug',
        'avatar',
        'Obituary',
        'funeral_host',
        'content',
        'funeral_program',
        'condolence_message',
        'date_of_birth',
        'date_of_death',
        'place',
        'account_holder',   // ✅ Thêm dòng này
        'bank_name',        // ✅
        'account_number', 
        'wreath', 
        'status',
    ];
    protected static function booted(): void
    {
        self::saving(function (self $model): void {
            $model->slug = self::createSlug($model->slug ?: $model->name, $model->getKey());
        });
    }
    public function condolences()
    {
        return $this->hasMany(ObituaryCondolence::class);
    }
    public function translations()
    {
        return $this->hasMany(ObituaryTranslation::class);
    }
}
