<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityPlant extends Model
{
    use HasFactory;

    protected $table = 'cityplant_master';
    protected $primaryKey = 'cityplant_id';
    public $timestamps = true;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        "name",
        "address ",
        "short_code ",
        "is_active"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
    ];

    // public function category()
    // {
    //     return $this->hasOne(UserInfo::class, 'user_id', 'user_id');
    // }
}
