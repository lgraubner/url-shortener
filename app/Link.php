<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\UserScope;

class Link extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'domain', 'hash', 'long_url'
    ];

    protected $visible= [
      'id', 'long_url', 'short_url', 'created_at', 'clicks'
    ];

    protected $appends = [
      'short_url'
    ];

    protected $dates = ['deleted_at'];

    public function getShortUrlAttribute()
    {
        return $this->domain . $this->hash;
    }

    public function setDomainAttribute($value)
    {
        $un = new \URL\Normalizer($value);
        $this->attributes['domain'] = $un->normalize();
    }

    public function clicks()
    {
        return $this->hasMany('App\Click');
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new UserScope());
    }
}
