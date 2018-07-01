<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\UserScope;

class Link extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'domain', 'hash', 'long_url', 'title'
    ];

    protected $visible= [
      'id', 'long_url', 'short_url', 'created_at', 'clicks', 'title'
    ];

    protected $appends = [
      'short_url'
    ];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'is_safe' => 'boolean'
    ];

    public function getShortUrlAttribute()
    {
        return 'https://' . $this->domain . '/' . $this->hash;
    }

    public function setDomainAttribute($value)
    {
        $un = new \URL\Normalizer($value);
        $this->attributes['domain'] = $un->normalize();
    }

    public function clicks()
    {
        return $this->hasMany('App\Models\Click');
    }

    public function scopeUser($query)
    {
        $user = Auth::user();

        return $query->where('user_id', $user->id);
    }

    public function scopeDomain($query)
    {
        $domain = host(request()->root());
        return $query->where('domain', $domain);
    }
}
