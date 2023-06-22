<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Source extends Model
{
    use HasFactory;

    protected $table = "sources";
    public $timestamps = false;
    protected $fillable = ['name'];

    //Связь с таблицей news
    public function news()
    {
        return $this->hasMany(News::class,'source_id', 'id');
    }
}
