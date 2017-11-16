<?php
namespace Modules\Health\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Health\Traits\Userstamps;

/**
 * Created by PhpStorm.
 * User: Antoan
 * Date: 2.10.2017 г.
 * Time: 19:51
 */

class BaseModel extends Model
{
    use SoftDeletes;
    use Userstamps;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}