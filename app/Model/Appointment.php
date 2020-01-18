<?php

namespace App\Model;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'client_id',
        'employee_id',
        'date',
        'time',
        'duration',
        'branch_id'
    ];

    /**
     * The attributes appended in the JSON form.
     *
     * @var array
     */
    protected $appends = [
        'appointment',
        'amount'
    ];

    /**
     * Append display name to JSON form
     * @return string
     * @throws \Exception
     */
    public function getAppointmentAttribute()
    {
        $date = new DateTime($this->date);

        return $date->format('M d, Y, H:i');
    }

    /**
     * Append display name to JSON form
     * @return string
     * @throws \Exception
     */
    public function getAmountAttribute()
    {
        $amount = $this->service->sum('price');

        return $amount;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function service()
    {
        return $this->belongsToMany(Service::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
