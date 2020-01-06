<?

/*
* Collection for service expiry report
*/
function appointmentReportCollection($sdate = 0, $edate = 0, $all = 0, $search = null, $value = null)
{
    if (!is_null($value))
    {
        if ($all == 0)
        {
            $appointment = \App\Model\Appointment::whereHas($search, function ($q) use ($value) {
                $q->get()->where('name', 'like', $value);
            })->get();
        } else {
            $appointment = \App\Model\Appointment::whereBetween('date', [ $sdate, $edate ])->get();
        }
    }
    else
    {
        if ($all == 0)
        {
            $appointment = \App\Model\Appointment::all();
        } else {
            $appointment = \App\Model\Appointment::whereBetween('date', [ $sdate, $edate ])->get();
        }
    }

    return $appointment;
}
