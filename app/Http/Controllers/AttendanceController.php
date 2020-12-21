<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class AttendanceController extends Controller
{
    /**
     * calculates salary of an employee
     * 
     * @return Response
     */
    public function salaryCalculator()
    {
        $path = storage_path() . "/jsonRequests/UserAttendance.json";
        
        $attendanceInfo = json_decode(file_get_contents($path), true)['data'];

        $perDaySalary = $attendanceInfo['salary']/$attendanceInfo['working_days'];
        $loginTime = date('H:i',strtotime($attendanceInfo['office_in_time']));
        $daysWorked = count($attendanceInfo['attendances']);
        $daysLate = 0;
        $daysEarly = 0;
        
        foreach ($attendanceInfo['attendances'] as $attendance) {
            if (date('H:i',strtotime($attendanceInfo['office_in_time'])) > $loginTime) {
                $daysLate++;
            } else if (date('H:i',strtotime($attendanceInfo['office_in_time'])) < $loginTime) {
                $daysEarly ++;
            }
        }

        if($daysLate > 2) {
            $daysWorked --;
        } else if ($daysEarly > 10) {
            $daysWorked ++;
        }
        
        $salary = $perDaySalary * $daysWorked;

        $response = [
            "success" => true,
            "messasge" => "success 200",
            "data" => ["salary" => $salary],
        ];

        return response()->json($response, 200);
    }
}
