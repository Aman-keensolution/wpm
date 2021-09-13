<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'item_master';
    protected $primaryKey = 'item_id';
    public $timestamps = true;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        "item_no",
        "item_name",
        "cat_id",
        "item_avg_weight",
        "batch_no",
        "Plant_id",
        "manfactring_date",
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

    public function category()
    {
        return $this->hasOne(Category::class, 'cat_id', 'cat_id');
    }
    public function plant()
    {
        return $this->hasOne(Plant::class, 'plant_id', 'plant_id');
    }
}
