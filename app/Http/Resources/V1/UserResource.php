<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
             // whenLoaded evita N+1: solo incluye profile si fue cargado con load()
            'profile' => $this->whenLoaded('profile', fn() => [
                'bio' => $this->profile->bio,
                'avatar' => $this->profile->avatar,
            ]),
            'created_at' => $this->created_at->toDateTimeString()
        ];
    }
}
