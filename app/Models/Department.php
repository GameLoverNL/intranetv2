<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

use Laravel\Scout\Searchable;

class Department extends Model
{
    use HasFactory, Searchable;

    public function manager(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
