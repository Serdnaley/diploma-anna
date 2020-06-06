<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Chat
 *
 * @property int $id
 * @property string $title
 * @property int $author_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $author
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Chat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Chat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Chat query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Chat whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Chat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Chat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Chat whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Chat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Chat whereUserIds($value)
 * @mixin \Eloquent
 */
class Chat extends Model
{

    protected $fillable = [
        'title',
        'author_id',
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function author() {
        return $this->belongsTo(User::class);
    }
}
