<?php

namespace Aaran\BMS\Billing\Common\Models;

use Aaran\BMS\Billing\Common\Database\Factories\DepartmentFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $guarded = [];

    public $timestamps = false;

    public function scopeActive(Builder $query, $status = '1'): Builder
    {
        return $query->where('active_id', $status);
    }

    public function scopeSearchByName(Builder $query, string $search): Builder
    {
        return $query->where('vname', 'like', "%$search%");
    }


    protected static function newFactory(): DepartmentFactory
    {
        return new DepartmentFactory();
    }

}
