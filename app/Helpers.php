<?

/*
* Collection for service expiry report
*/
function appointmentReportCollection($sdate = 0, $edate = 0, $all = 0, $search = null, $value = null, $user_branch = 1)
{
    if ( ! is_null($value))
    {
        if ($all == 1)
        {
            $appointment = \App\Model\Appointment::where('branch_id', $user_branch)->whereHas($search, function ($q) use ($value) {
                $q->get()->where('name', 'like', $value);
            })->get();
        }
        else
        {
            $appointment = \App\Model\Appointment::where('branch_id', $user_branch)->whereBetween('date', [
                $sdate,
                $edate
            ])->get();
        }
    }
    else
    {
        if ($all == 1)
        {
            $appointment = \App\Model\Appointment::where('branch_id', $user_branch)->get();
        }
        else
        {
            $appointment = \App\Model\Appointment::where('branch_id', $user_branch)->whereBetween('date', [
                $sdate,
                $edate
            ])->get();
        }
    }

    return $appointment;
}
