<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'photo' => $this->image ? url("storage/{$this->image}") : '',
            'online' => false,
            'isMyFavorite' => $this->favorite->count() > 0,
            'unreadMessages' => $this->unreadMessages->count(),
            'preference' => [
                'me_notify' => isset($this->preference) ? $this->preference->me_notify : true,
                'background_chat' => isset($this->preference) && $this->preference->image_background_chat ? url("storage/{$this->preference->image_background_chat}") : '',
            ]
        ];
    }
}
