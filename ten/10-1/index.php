<?php
//set default value
$message = '';

//get value from POST array
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action =  'start_app';
}

//process
switch ($action) {
    case 'start_app':

        // set default invoice date 1 month prior to current date
        $interval = new DateInterval('P1M');
        $default_date = new DateTime();
        $default_date->sub($interval);
        $invoice_date_s = $default_date->format('n/j/Y');

        // set default due date 2 months after current date
        $interval = new DateInterval('P2M');
        $default_date = new DateTime();
        $default_date->add($interval);
        $due_date_s = $default_date->format('n/j/Y');

        $message = 'Enter two dates and click on the Submit button.';
        break;
    case 'process_data':
        $invoice_date_s = filter_input(INPUT_POST, 'invoice_date');
        $due_date_s = filter_input(INPUT_POST, 'due_date');

        // make sure the user enters both dates
        if (empty($invoice_date_s)) {
            $message = "Please enter a starting date!!";
            break;
        }else if (empty($due_date_s)){
            $message = "Please enter a due date!!";
            break;
        }

        // convert date strings to DateTime objects
        // and use a try/catch to make sure the dates are valid
        try {
            $invoice_date_o = new DateTime($invoice_date_s);
            $due_date_o = new DateTime($due_date_s);
        } catch (Exception $e) {
            $message = 'Dates must be in valid format: month/day/year';
            break;
        }

        // make sure the due date is after the invoice date
        if ($due_date_o < $invoice_date_o) {
            $message = 'Hey, due date is before invoice date!!';
            break;
        }

        // format both dates
        $time_format = 'F j, Y';

        $invoice_date_f = $invoice_date_o->format($time_format);
        $due_date_f = $due_date_o->format($time_format);
        
        // get the current date and time and format it
        $current_date = new DateTime();
        $current_date_f = $current_date->format($time_format);
        $current_time_f = $current_date->format('g:i:s a');
        
        // get the amount of time between the current date and the due date
        // and format the due date message
        $length_of_time = $current_date->diff($due_date_o);
        if ($due_date_o < $current_date) {
            $due_date_message = $length_of_time->format(
                'This invoice is %y years, %m months, and %d days overdue.');
        } else {
            $due_date_message = $length_of_time->format(
                'This invoice is due in %y years, %m months, and %d days.');
        }

        break;
}
include 'date_tester.php';
?>