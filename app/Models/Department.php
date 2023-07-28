<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Laravel\Scout\Searchable;

class Department extends Model
{
    use HasFactory;
    use Searchable;

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
