<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'email', 'cpf', 'validated', 'validated_at'];

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    /**
     * Get the 'validated_at' attribute in the "DD:MM:YYYY HH:MM" format.
     *
     * @param  string|null  $value
     * @return string|null
     */
    public function getValidatedAtAttribute($value)
    {
        return $value ? date('d-m-Y H:i', strtotime($value)) : null;
    }

    /**
     * Get the 'validated' attribute as a string 'true' or 'false'.
     *
     * @param  bool  $value
     * @return string
     */
    public function getValidatedAttribute($value)
    {
        return $value ? true : false;
    }
}
