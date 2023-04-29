<?php

namespace App\Models\Horensou;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HorensouPriority extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'desc', 'priority'];

    public function horensouRequest(): HasMany
    {
        return $this->hasMany(HorensouRequest::class);
    }
}
