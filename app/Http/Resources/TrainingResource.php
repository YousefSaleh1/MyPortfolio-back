<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'training_name'=>$this->training_name,
            'company_name'=>$this->company_name,
            'description'=>$this->description,
            'company_logo'=>$this->company_logo,
            'company_link'=>$this->company_link,
            'certificate_link'=>$this->certificate_link,
            'recomendation_letter_link'=>$this->recomendation_letter_link,
        ];
    }
}
