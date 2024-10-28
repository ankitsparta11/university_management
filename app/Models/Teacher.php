<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Add any other attributes you have in your Teacher table
        'email', // Example of other attributes
        // ... other attributes as needed
    ];
}
