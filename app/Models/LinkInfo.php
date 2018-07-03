<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkInfo extends Model
{
    protected $visible = [
        'http_status', 'url', 'url_fetched', 'domain', 'html_title', 'content_type', 'content_length'
    ];
}
