<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'company_name',
        'address',
        'region',
        'phone',
        'mobile_prefix',
        'mobile',
        'language',
        'default_map',
        'time_zone',
        'landing_page',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
