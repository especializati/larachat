<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'message' => $this->message,
            'receiver' => new UserResource($this->receiver),
            'sender' => new UserResource($this->sender),
            'date' => Carbon::make($this->created_at)->format('Y-m-d'),
            'me' => auth()->user()->id == $this->sender_id,
        ];
    }
}
