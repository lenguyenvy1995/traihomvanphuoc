<?php 
namespace Botble\Obituary\Models;

use Illuminate\Database\Eloquent\Model;

class ObituaryTranslation extends Model
{
    protected $table = 'obituaries_translations';

    protected $fillable = [
        'obituary_id',
        'lang_code',
        'name',
        'description',
        'content',
    ];

    public $timestamps = true;
}
