<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CakeResource extends JsonResource
{
    public static function mapCakeResponse($cake)
    {
        return [
            'name' => $cake->name,
            'weight' => $cake->weight,
            'value' => $cake->value,
            'inventory' => $cake->inventory,
            'created_at'  => date('d/m/Y h:m', strtotime($cake->created_at)),
            'updated_at'  => date('d/m/Y h:m', strtotime($cake->updated_at)),
        ];
    }
}
