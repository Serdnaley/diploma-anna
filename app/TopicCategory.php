<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TopicCategory
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopicCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopicCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopicCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopicCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopicCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopicCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TopicCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TopicCategory extends Model
{

    protected $fillable = [
        'name',
    ];
}
