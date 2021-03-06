<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    protected $fillable = [
        'project_name',
        'project_desription',
        'target_days',
        'achievement_days',
        //'tags'
    ];

    public function user(): BelongsTo
    {
        //「関連するテーブル名の単数形_id」になっている時、外部キー名を省略しても紐付けできる。
        return $this->belongsTo('App\User');
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User','likes')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool
    {
        return $user
            ?(bool)$this->likes->where('id',$user->id)->count():false;
    }
    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
