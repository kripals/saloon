<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'cost_per',
        'price',
        'branch_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function appointment()
    {
        return $this->belongsToMany(Appointment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
