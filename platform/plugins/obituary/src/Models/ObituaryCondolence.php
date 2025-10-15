<?php
namespace Botble\Obituary\Models;

use Botble\Base\Models\BaseModel;

class ObituaryCondolence extends BaseModel
{
    protected $table = 'obituary_condolences';

    protected $fillable = [
        'obituary_id',
        'name',
        'password',
        'message',
    ];

    public function obituary()
    {
        return $this->belongsTo(Obituary::class);
    }
}