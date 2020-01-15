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
            $appointment = \App\Model\Appointment::where('branch_id', auth()->user()->branch_id)
                ->whereHas($search, function ($q) use ($value) {
                $q->get()->where('name', 'like', $value);
            })->get();
        } else {
            $appointment = \App\Model\Appointment::where('branch_id', auth()->user()->branch_id)
                ->whereBetween('date', [ $sdate, $edate ])->get();
        }
    }
    else
    {
        if ($all == 0)
        {
            $appointment = \App\Model\Appointment::where('branch_id', auth()->user()->branch_id)->get();
        } else {
            $appointment = \App\Model\Appointment::where('branch_id', auth()->user()->branch_id)
                ->whereBetween('date', [ $sdate, $edate ])->get();
        }
    }

    return $appointment;
}
