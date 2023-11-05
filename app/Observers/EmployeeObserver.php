<?php

namespace App\Observers;

use App\Models\Employee;

class EmployeeObserver
{

    /**
     * Handle the Employee "updating" event.
     */
    public function updating(Employee $employee)
    {
        if ($employee->validated == 1) {
            $employee->validated_at = now();
        }
    }

}
