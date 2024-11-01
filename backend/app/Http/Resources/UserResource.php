<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var User $user */
        $user = $this;
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'profile_image_path' => $user->profile_image_path,
            'role' => $user->roles()->first() ? $user->roles()->first()->name : '',
            'role_id' => $user->roles()->first() ? $user->roles()->first()->id : '',
            'created_at' => $user->created_at->toISOString(),
            'updated_at' => $user->updated_at->toISOString(),
            'deleted_at' => $user->deleted_at
        ];
    }
}
