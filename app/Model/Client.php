<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'mobile_number',
        'address',
        'branch_id'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
