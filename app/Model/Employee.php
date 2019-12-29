<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'in_time',
        'out_time',
        'phone_number',
        'address'
    ];

    /**
     * The attributes appended in the JSON form.
     *
     * @var array
     */
    protected $appends = [
        'name'
    ];

    /**
     * Append display name to JSON form
     * @return string
     */
    public function getNameAttribute()
    {
        return ucwords($this->first_name) . ' ' . ucwords($this->last_name);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
}
