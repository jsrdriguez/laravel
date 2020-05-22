<?php

namespace App\Http\Resources;

use App\Http\Resources\Json\ClientJson;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PaginatedCollection extends ResourceCollection
{
    private $resourceClass;

    public function __construct($resource, $resourceParse)
    {
        parent::__construct($resource);
        $this->resource = $this->collectResource($resource);
        $this->resourceClass = $resourceParse;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->resourceClass::collection($this->collection),
            'meta' => [
                "current_page" => $this->resource->currentPage(),
                "from" => 1,
                "last_page" => $this->resource->lastPage(),
                "path" => $this->resource->path(),
                "per_page" => $this->resource->perPage(),
                "total" => $this->resource->total()
            ]
        ];
    }
}
