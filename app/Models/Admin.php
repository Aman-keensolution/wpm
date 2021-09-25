<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user_master';
    protected $primaryKey = 'user_id';
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'number',
        'role',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function plant()
    {
        return $this->hasOne(Plant::class, 'plant_id', 'plant_id');
    }
    public function bin()
    {
        return $this->hasOne(Bin::class, 'bin_id', 'bin_id');
    }
    public function item()
    {
        return $this->hasOne(Item::class, 'item_id', 'item_id');
    }
    public function user()
    {
        return $this->hasOne(Admin::class, 'user_id', 'user_id');
    }
    public function weightScale()
    {
        return $this->hasOne(WeightScale::class, 'weight_scale_id', 'weight_scale_id');
    }
    public function unit()
    {
        return $this->hasOne(Unit::class, 'unit_id', 'unit_id');
    }
    public function stock()
    {
        return $this->hasOne(Stock::class, 'stock_id', 'stock_id');
    }
    public function category()
    {
        return $this->hasOne(Category::class, 'cat_id', 'cat_id');
    }
}
