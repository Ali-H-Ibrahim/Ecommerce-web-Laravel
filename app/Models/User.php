<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements MustVerifyEmail, JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'admin',
        'image',
        'gender',
        'birth_date',
        'status',
        'user_points',
        'nickname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address() {
        return $this->hasOne(Address::class, 'user_id', 'id');
    }

    public function shoppingcart() {
        return $this->hasOne(ShoppingCart::class, 'user_id', 'id');
    }

    public function wishlist() {
        return $this->hasOne(Wishlist::class, 'user_id', 'id');
    }

    public function wantedProducts()
    {
        return $this->belongsToMany('App\Models\Product', 'App\Models\Wanted',
            'user_id', 'product_id', 'id', 'id');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\SystemNotification', 'App\Models\UserSystemNotification',
            'user_id', 'notification_id', 'id', 'id');
    }


    public function notificationsNewUser()
    {
        return $this->hasMany(UserSystemNotification::class, 'user_id', 'id');

    }

//    public function notificationsOnlyNew()
//    {
//        return $this->notifications->where('new',1)->get();
//    }


    public function reviews() {
        return $this->hasMany(Review::class, 'user_id', 'id');
    }

    public function messages()
    {
        return $this->belongsToMany('App\Models\User', 'App\Models\Message',
            'from_user_id', 'to_user_id', 'id', 'id');
    }

    /*********************** JWT Methods ***********************/
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
