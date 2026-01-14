<?php

namespace App\Models;

use App\Contracts\CommentableModelContract;
use App\Enums\Comment\CommentableTypeEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Fields:
 *
 * @property int                 id
 * @property int                 commentator_id
 * @property string              text
 * @property int                 commentable_id
 * @property CommentableTypeEnum commentable_type
 * @property Carbon              created_at
 * @property Carbon              updated_at
 */
class Comment extends Model implements CommentableModelContract
{
    protected $fillable = [
        'commentator_id',
        'text',
        'commentable_id',
        'commentable_type',
    ];

    protected $casts = [
        'commentable_type' => CommentableTypeEnum::class,
    ];

    public function commentator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'commentator_id');
    }
}
