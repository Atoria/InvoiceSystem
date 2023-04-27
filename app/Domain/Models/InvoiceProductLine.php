<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $invoice_id
 * @property string $product_id
 * @property integer $quantity
 * @property string $created_at
 * @property string $updated_at
 */
class InvoiceProductLine extends Model
{
    use HasFactory;


    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
