<?php

namespace App\Imports;

use App\Models\WoData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WoDataImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new WoData([
            'project' => $row['project'],
            'plant_group' => $row['plant_group'],
            'unit_type' => $row['unit_type'],
            'unit_code' => $row['unit_code'],
            'unit_model' => $row['unit_model'],
            'wo_status' => $row['wo_status'],
            'status_position' => $row['status_position'],
            'hour_meter' => $row['hour_meter'],
            'activity_code' => $row['activity_code'],
            'malfunction_date' => $this->convert_date($row['malfunction_date']),
            'malfunction_time' => $row['malfunction_time'],
            'days_of_breakdown' => $row['days_of_breakdown'],
            'notification_description' => $row['notification_description'],
            'job_category' => $row['job_category'],
            'wo_no' => $row['wo_no'],
            'call_id' => $row['call_id'],
            'last_operator_id' => $row['last_operator_id'],
            'wo_date' => $this->convert_date($row['wo_date']),
            'mr_no' => $row['mr_no'],
            'mr_date' => $this->convert_date($row['mr_date']),
            'mr_status' => $row['mr_status'],
            'first_mi_no' => $row['first_mi_no'],
            'first_mi_date' => $this->convert_date($row['first_mi_date']),
            'last_mi_no' => $row['last_mi_no'],
            'last_mi_date' => $this->convert_date($row['last_mi_date']),
            'pr_no' => $row['pr_no'],
            'pr_date' => $this->convert_date($row['pr_date']),
            'po_no' => $row['po_no'],
            'po_date' => $this->convert_date($row['po_date']),
            'po_status' => $row['po_status'],
            'po_rev_no' => $row['po_rev_no'],
            'eta_date' => $this->convert_date($row['eta_date']),
            'delivery_status' => $row['delivery_status'],
            'delivery_date' => $this->convert_date($row['delivery_date']),
            'grpo_no' => $row['grpo_no'],
            'grpo_date' => $this->convert_date($row['grpo_date']),
            'ito_no' => $row['ito_no'],
            'ito_date' => $this->convert_date($row['ito_date']),
            'iti_no' => $row['iti_no'],
            'iti_date' => $this->convert_date($row['iti_date']),
            'finish_date' => $this->convert_date($row['finish_date']),
            'finish_time' => $row['finish_time'],
            'last_activity_date' => $this->convert_date($row['last_activity_date']),
            'activity_text' => $row['activity_text'],
            'remarks' => $row['remarks'],
        ]);
    }

    public function convert_date($date)
    {
        if ($date) {
            $year = substr($date, 6, 4);
            $month = substr($date, 3, 2);
            $day = substr($date, 0, 2);
            $new_date = $year . '-' . $month . '-' . $day;
            return $new_date;
        } else {
            return null;
        }
    }
}
