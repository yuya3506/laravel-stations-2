<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // モデルに関連付けるテーブル
    protected $table = 'movies';

    // テーブルに関連付ける主キー
    protected $primaryKey = 'id';

    // 登録・更新可能なカラムの指定
    protected $fillable = [
        'id',
        'title',
        'image_url',
        'published_year',
        'is_showing',
        'description'
    ];

    /**
     * 一覧画面表示用にmoviesテーブルから全てのデータを取得
     */
    public function findAllMovies()
    {
        return Movie::all();
    }

    public function InsertMovie($data)
    {
        return $this->create($data);
    }


}