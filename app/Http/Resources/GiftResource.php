<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GiftResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request)
  {
    $result =  [
      'id' => $this->id,
      'name' => $this->name,
    ];

    if (count($this->children)) {
      $result['gifts'] = GiftResource::collection($this->children);
    }

    return $result;
  }
}
