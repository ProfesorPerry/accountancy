<?php

namespace App\Operations;

use Illuminate\Database\Eloquent\Model;

class MinusOperation extends Model
{

    /**
     * @var string $table
     */
    protected $table = 'minus_operations';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function accounts()
    {
        return $this->belongsToMany('App\Account', 'accounts_minus_operations');
    }
}
