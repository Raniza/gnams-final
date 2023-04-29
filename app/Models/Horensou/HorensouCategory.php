<?php

namespace App\Models\Horensou;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HorensouCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function horensouRequest(): HasMany
    {
        return $this->hasMany(HorensouRequest::class);
    }
}
