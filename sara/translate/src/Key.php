<?php

namespace Sara\Translate;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function translations()
    {
        return $this->hasMany(Translation::class);
    }
}
