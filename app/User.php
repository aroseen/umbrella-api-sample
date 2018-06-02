<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

/**
 * Class User.
 *
 * @property int    $id
 * @property string $name
 * @property string $email
 * @property bool   $can_share
 * @property int    $short_urls_count
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'can_share',
        'api_token',
        'short_urls_count',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'can_share' => 'bool',
    ];

    /**
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
}
