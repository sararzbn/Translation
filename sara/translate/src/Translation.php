<?php

namespace Sara\Translate;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['key_id','language_id','name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function key()
    {
        return $this->belongsTo(Key::class);
    }
}
