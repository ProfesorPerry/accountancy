<?php

namespace App\Operations;

use Illuminate\Database\Eloquent\Model;

class PlusOperation extends Model
{

    /**
     * @var string
     */
    protected $table = 'plus_operations';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function accounts()
    {
        return $this->belongsToMany('App\Account', 'accounts_plus_operations');
    }
}
