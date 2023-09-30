<?php

namespace App\Actions;

use App\Http\Requests\ElementIndexRequest;
use App\Models\Element;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class GetElementsAction
{
    public function run(ElementIndexRequest $request): Collection
    {
        $prices = $request->only('min_price', 'max_price');
        $filters = $request->except('min_price', 'max_price', '_url');

        return Element
            ::when($prices, static function (Builder $query) use ($request): void {
                $request->min_price && $query->whereRelation('prices', 'price', '>=', $request->min_price);
                $request->max_price && $query->whereRelation('prices', 'price', '<=', $request->max_price);
            })
            ->when($filters, static function (Builder $query) use ($filters): void {
                foreach ($filters as $key => $value) {
                    $query->whereRelation('properties', function (Builder $builder) use ($key, $value): void {
                        $builder
                            ->where('name', $key)
                            ->where('element_property.value', $value);
                    });
                }
            })
            ->with('prices', 'properties')
            ->get();
    }
}
