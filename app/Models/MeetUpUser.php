<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetUpUser extends Model
{
    use HasFactory;

    public $fillable = [
        "email_address",
        "phone_number"
    ];
}
