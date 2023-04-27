<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $updated_at
 * @property string $created_at
 * @property string $status
 * @property string $due_date
 * @property string $id
 * @property string $number
 * @property string $date
 * @property string $company_id
 */
class Invoice extends Model
{
    use HasFactory;

    public function productLines()
    {
        return $this->hasMany(InvoiceProductLine::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function toArray()
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'date' => $this->date,
            'due_date' => $this->due_date,
            'company_id' => $this->company_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
