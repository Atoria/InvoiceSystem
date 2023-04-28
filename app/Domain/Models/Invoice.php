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

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'id' => 'string',
        'company_id' => 'string',
    ];


    public function productLines()
    {
        return $this->hasMany(InvoiceProductLine::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
