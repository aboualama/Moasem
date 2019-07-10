<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cart;

class CartproductScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $ids = [];
        $items = Cart::content();
        if (is_array($items) || is_object($items))
        {       
            foreach ($items as $item)
            {
                $ids[] = $item->id;
            }
        }
        else
        {
            $ids[] = $items->id;
        }
        
        $builder->whereNotIn('id', $ids);
    }
}