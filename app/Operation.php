<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Operation extends Model
{

    /**
     * @var string
     */
    protected $table = 'operations';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'amount'
    ];

    /**
     * @return BelongsToMany
     */
    public function accounts()
    {
        return $this
            ->belongsToMany('App\Account', 'account_operation')
            ->withPivot('side', 'sign')
            ->withTimestamps();
    }
}
