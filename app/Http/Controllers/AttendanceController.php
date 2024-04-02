<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('date')) {
            $date = $request->input('date');

            $attendances = Attendance::whereDate('created_at', $date)
                ->get()
                ->groupBy(function ($attendance) {
                    return $attendance->employee->first_name . ' ' . $attendance->employee->last_name;
                })
                ->map(function ($attendances) {

                    $status = 'Absent';
                    foreach ($attendances as $attendance) {
                        if ($attendance->check_status == 0 && strtotime($attendance->created_at->format('H:i:s')) <= strtotime('08:00:00')) {
                            $status = 'Present';
                            break;
                        } elseif ($attendance->check_status == 0) {
                            $status = 'Late';
                        }
                    }
                    return $status;
                });

            return view('admin.attendance.index', compact('attendances'));
        }

        return view('admin.attendance.index');
    }
}
