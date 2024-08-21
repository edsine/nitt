<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DrivingTestRecordResource extends JsonResource
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'state' => $this->state,
            'year' => $this->year,
            'renewal_count' => $this->renewal_count,
            'fresh_count' => $this->fresh_count,
            '3y_count' => $this->3y_count,
            '5y_count' => $this->5y_count,
            'failure' => $this->failure,
            'collected' => $this->collected,
            'due_for' => $this->due_for,
            'lp' => $this->lp,
            'total_captured' => $this->total_captured
        ];
    }
}
