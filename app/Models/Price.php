<?php

namespace App\Models;

use Database\Factories\PriceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Price extends Model
{
    use HasFactory;

    /**
     * Boot method
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $post->{$post->getKeyName()} = (string)Str::uuid();
        });
    }

    /**
     * Disable AI
     * @return false
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Change type for id
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    /**
     * Connect factory for this model
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return PriceFactory::new();
    }
}
