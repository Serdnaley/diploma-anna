<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

/**
 * App\Topic
 *
 * @property int $id
 * @property string $title
 * @property int $author_id
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $author
 * @property-read \App\TopicCategory $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Topic whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Topic extends Model
{

    protected $fillable = [
        'title',
        'author_id',
        'category_id',
    ];

    protected $append = [
        'thumbnail',
    ];

    public function author() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(TopicCategory::class);
    }

    public function getThumbnailAttribute() {
        $json = File::get(database_path('factories/photos/unsplash-array.json'));
        $array = json_decode($json);
        $index = $this->id - round($this->id / count($array))*count($array);
        $key = $array[$index];

        return '//source.unsplash.com/' . $key;
    }
}
