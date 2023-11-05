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

    /**
     * Apply a filter to the query based on the given filters.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param array $filters
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['name'] ?? false, fn ($query, $name) => 
            $query->where('name', 'like', '%' . $name . '%')
        );

        $query->when($filters['email'] ?? false, fn ($query, $email) => 
            $query->where('email', 'like', '%' . $email . '%')
        );

        $query->when($filters['cpf'] ?? false, fn ($query, $cpf) => 
            $query->where('cpf', 'like', '%' . $cpf . '%')
        );

        $query->when($filters['phone'] ?? false, fn ($query, $phone) => 
            $query->where('phone', 'like', '%' . $phone . '%')
        );

        $query->when($filters['validated'] ?? false, fn ($query, $validated) => 
            $query->where('validated', $validated)
        );

        return $query;
    }
}

