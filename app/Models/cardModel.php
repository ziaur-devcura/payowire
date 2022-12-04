<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cardModel extends Model
{
    use HasFactory;

    protected $table = 'card';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $fillable = [
        'card_number',
        'card_expire',
        'card_cvv',
        'type',
        'package',
        'refer',
        'load_amount',
        'gateway',
        'sid'


    ];
}
