<?php

namespace Aaran\Core\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        if (session()->has('tenant_id')){

        $builder->where('tenant_id',session()->get('tenant_id'));
        }
    }
}


