<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_bank extends Model
{
    use HasFactory;

    protected $table = 'payment_bank';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'bank_type',
        'bank_country',
        'recipient_type',
        'ben_firstname',
        'ben_lastname',
        'ben_city',
        'ben_postal',
        'ben_state',
        'bank_name',
        'account_number',
        'routing_number',
        'ben_address',
        'iban',
        'swift_code',
        'refer'
    ];
}
