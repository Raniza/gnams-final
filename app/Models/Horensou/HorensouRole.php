<?php

namespace App\Models\Horensou;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Admin\Section;
use App\Models\User;

class HorensouRole extends Model
{
    use HasFactory;

    protected $fillable = ['section_id', 'user_id'];

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
