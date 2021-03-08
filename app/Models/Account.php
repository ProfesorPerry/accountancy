<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{

    use SoftDeletes;

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
     * @return BelongsToMany
     */
    public function operations()
    {
        return $this
            ->belongsToMany('App\Models\Operation', 'account_operation')
            ->withPivot('side', 'sign')
            ->withTimestamps()
            ->orderBy('created_at', 'desc');
    }
}
