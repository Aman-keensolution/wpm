<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stock_master';
    protected $primaryKey = 'stock_id';
    public $timestamps = true;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        "assign_date",
        "batch_id",
        "total_weight",
        "net_weight",
        "bin_weight",
        "counted_quantity",
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

    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id', 'user_id');
    }

    public function weightScale()
    {
        return $this->hasOne(WeightScale::class, 'weight_scale_id', 'weight_scale_id');
    }
}
