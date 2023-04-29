<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Models\User;
use App\Models\Horensou\HorensouRequest;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }

    public function shops(): HasManyThrough
    {
        return $this->hasManyThrough(Shop::class, Section::class);
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
