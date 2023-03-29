<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $slug = Str::lower(str_replace(' ', '-', $request->titel));
        $usre_id = auth()->user()->id;
        $image = $request->file('image')->store('public/post_images');

        return [
            'id' => $request->id,
            'titel' => $request->titel,
            'content' => $request->content,
            'bio' => $request->bio,
            'image' => $image,
        ];
    }
}
