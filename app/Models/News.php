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
 * @property string created_at
 * @property int category_id
 */
class News extends Model
{
    use HasFactory;

    protected $table = "news";
    public $timestamps = false;
    protected $fillable = ['title', 'text', 'category_id', 'created_at'];

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

    public static function rules()
    {
        return [
            'title' => ['required', 'max:255'],
            'text' => ['required']
        ];
    }

    public static function attributeName()
    {
        return [
            'title' => 'Название новости',
            'text' => 'Текст новости'
        ];
    }
}
