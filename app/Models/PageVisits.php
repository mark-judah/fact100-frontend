<?php

namespace App\Models;

use App\Traits\UsesUuid as uniqueId;
use Illuminate\Database\Eloquent\Model;

class PageVisits extends Model
{
    use uniqueId;

    protected $fillable = [
        'method', 'url', 'referer',
        'languages', 'useragent',
        'device', 'platform', 'browser', 'ip', 'visitor_id',
    ];

}
