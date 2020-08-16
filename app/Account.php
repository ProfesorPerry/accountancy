<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'symbol',
    ];

    /**
     * @var string
     */
    protected $table = 'accounts';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function plusOperations()
    {
        return $this->belongsToMany('App\Operations\PlusOperation', 'accounts_plus_operations');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function minusOperations()
    {
        return $this->belongsToMany('App\Operations\MinusOperation', 'accounts_minus_operations');
    }
}
