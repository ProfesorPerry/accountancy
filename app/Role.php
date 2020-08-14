<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'role_user');
    }
}
