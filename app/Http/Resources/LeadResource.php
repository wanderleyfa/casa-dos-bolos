<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LeadResource extends JsonResource
{
    public static function mapLeadResponse($lead)
    {
        return [
            'name' => $lead->name,
            'email' => $lead->email,
            'cake_id' => $lead->cake_id,
            'created_at'  => date('d/m/Y h:m', strtotime($lead->created_at)),
            'updated_at'  => date('d/m/Y h:m', strtotime($lead->updated_at)),
        ];
    }
}
