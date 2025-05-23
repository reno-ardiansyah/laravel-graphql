<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookComment extends Model
{
    public function replies(): HasMany
    {
        return $this->hasMany(BookComment::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(BookComment::class, 'parent_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
