<?php

namespace root_rzbn\translate;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name','flag','direction'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function translations()
    {
        return $this->hasMany(Translation::class);
    }



}
