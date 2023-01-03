<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
            'downloads' => sprintf('%d %s', $this->downloads_count, str('download')->plural($this->downloads_count)),
            'user' => new UserResource($this->whenLoaded('user')),
            'previewImage' => $this->getFirstMediaUrl('previews'),
            'previewImages' => $this->getMedia('previews'),
            'products' => ProductResource::collection($this->whenLoaded('products')),
            'ratings' => [
                'value' => $this->rating,
                'floor' => floor($this->rating),
                'remaining' => 5 - floor($this->rating),
            ]
        ];
    }
}
