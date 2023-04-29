<?php

namespace App\Models\Horensou;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enums\ShopStatusEnum;
use App\Models\Admin\Department;
use App\Models\Admin\Section;
use App\Models\Admin\Shop;
use App\Models\User;

class HorensouRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'doc_no',
        'department_id',
        'section_id',
        'shop_id',
        'category_id',
        'priority_id',
        'point_problem',
        'detail_problem',
        'part_name',
        'request_by',
        'approve_by',
        'shop_status',
    ];

    protected $cast = [
        'shop_status' => ShopStatusEnum::class,
    ];
    
    protected function partName(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => strtoupper($value),
        );
    }

    protected function pointProblem(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => ucwords($value),
        );
    }

    protected function shopStatus(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(HorensouCategory::class);
    }

    public function priority(): BelongsTo
    {
        return $this->belongsTo(HorensouPriority::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function approveBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approve_by');
    }

    public function requestBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'request_by');
    }
}
