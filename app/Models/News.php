<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

/**
 * Class News
 * @package App
 *
 * @property string title
 * @property string text
 */
class News extends Model
{
    use HasFactory;

    protected $table = "news";
    public $timestamps = false;
    protected $fillable = ['title', 'text', 'category_id'];

    //Связь с таблицей category

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }
}
