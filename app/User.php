<?php

namespace App;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function products($operator,$time)
    {
        //$operator = '=';
        //$time = Carbon::now()->format('Y-m-d');
        return $this->belongsToMany(Product::class)->withPivot('weight','id')->whereDate('product_user.created_at',$operator,$time)->select('products.name','products.calories','products.proteins','products.fats','products.carbohydrates','product_user.weight');
    }
    public function allProducts()
    {
        return $this->belongsToMany(Product::class)->withPivot('weight','id')->whereDate('product_user.created_at','>',Carbon::now()->subYears(5)->format('Y-m-d'))->select('products.name','products.calories','products.proteins','products.fats','products.carbohydrates','product_user.weight','product_user.created_at');
    }
}
