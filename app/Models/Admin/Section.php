<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;
use App\Models\Horensou\HorensouRequest;
use App\Models\Horensou\HorensouRole;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['department_id', 'name'];

    public function horensouRole(): HasOne
    {
        return $this->hasOne(HorensouRole::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    
    public function shops(): HasMany
    {
        return $this->hasMany(Shop::class);
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
