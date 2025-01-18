<?php

namespace App\Adapters;

use App\Http\Resources\DefaultResource;
use App\Http\Resources\SupportResource;
use App\Repositories\PaginationInterface;

class ApiAdapter
{

    public static function supportToJson(
        PaginationInterface $data
    ) {
    return SupportResource::collection($data->items())
            ->additional([
                'meta' => [
                    'total' => $data->total(),
                    'page' => $data->currentPage(),
                    'per_page' => $data->perPage(),
                    'last_page' => $data->isLastPage(),
                ]
            ]);
    }

    public static function defaultToJson(
        PaginationInterface $data
    ) {
    return DefaultResource::collection($data->items())
            ->additional([
                'meta' => [
                    'total' => $data->total(),
                    'page' => $data->currentPage(),
                    'per_page' => $data->perPage(),
                    'last_page' => $data->isLastPage(),
                ]
            ]);
    }
}
