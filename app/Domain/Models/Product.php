<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property string $id
 * @property integer $price
 * @property string $name
 * @property string $currency
 * @property string $created_at
 * @property string $updated_at
 */
class Product extends Model
{
    use HasFactory;


    public function productLines()
    {
        return $this->hasMany(InvoiceProductLine::class);
    }


    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price / 100,
            'currency' => $this->currency,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
