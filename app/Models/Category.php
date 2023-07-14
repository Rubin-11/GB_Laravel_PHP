<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
/**
 * Class Category
 * @package App
 *
 * @property string name

 */

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    public $timestamps = false;
    protected $fillable = ['name'];

    //Связь с таблицей news

    /**
     * @return HasMany
     */
    public function news(){
        return $this->hasMany(News::class,'category_id', 'id');
    }
}
