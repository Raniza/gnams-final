<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Horensou\HorensouRequest;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['section_id', 'name'];

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function horensouRequests(): HasMany
    {
        return $this->hasMany(HorensouRequest::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function horensouRequest(): HasMany
    {
        return $this->hasMany(HorensouRequest::class);
    }
}
