<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasTimestamps;

    protected $table = 'operations';
    protected $fillable = ['name', 'amount', 'creation_day'];

    public function accounts()
    {
        return $this
            ->belongsToMany('App\Models\Account', 'account_operation')
            ->withPivot('side', 'sign')
            ->withTimestamps();
    }
}
