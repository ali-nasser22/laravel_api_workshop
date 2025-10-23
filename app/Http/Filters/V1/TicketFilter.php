<?php

namespace App\Http\Filters\V1;

use Illuminate\Database\Eloquent\Builder;

class TicketFilter extends QueryFilter
{
    public function include($value): Builder
    {
        if ($value === 'author') {
            $value = 'user';
        }
        return $this->builder->with($value);
    }

    public function status($value): Builder
    {
        return $this->builder->where('status', $value);
    }
}
