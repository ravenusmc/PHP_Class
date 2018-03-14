<?php

//get tasklist array from POST
$task_list = filter_input(INPUT_POST, 'tasklist', 
        FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
if ($task_list === NULL) {
    $task_list = array();
    
//    add some hard-coded starting values to make testing easier
//    $task_list[] = 'Write chapter';
//    $task_list[] = 'Edit chapter';
//    $task_list[] = 'Proofread chapter';
}

//get action variable from POST
$action = filter_input(INPUT_POST, 'action');

//initialize error messages array
$errors = array();

//process
switch( $action ) {
    case 'Add Task':
        $new_task = filter_input(INPUT_POST, 'newtask');
        if (empty($new_task)) {
            $errors[] = 'The new task cannot be empty.';
        } else {
            //new code
            array_push($task_list, $new_task);
            //$task_list[] = $new_task;
        }
        break;
    case 'Delete Task':
        $task_index = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        if ($task_index === NULL || $task_index === FALSE) {
            $errors[] = 'The task cannot be deleted.';
        } else {
            unset($task_list[$task_index]);
            $task_list = array_values($task_list);
        }
        break;
    case 'Modify Task':
        $taskid = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        $task_to_modify = $task_list[$taskid];
        break;  
    case 'Save Changes':
        $value = filter_input(INPUT_POST, 'modifiedtaskid', FILTER_VALIDATE_INT);
        $modified_task = filter_input(INPUT_POST, 'modifiedtask');
        $task_list[$value] = $modified_task;
        break;
    case 'Cancel Changes':
        $modified_task = '';
        break;
    case 'Promote Task':
        $taskid = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        if ($taskid == 0){
            $errors[] = 'Sorry, cant promote first task.';
        }else {
            //Getting the value of the current element
            $task_value = $task_list[$taskid];
            //Getting the value of the element one spot up
            $old_value = $task_list[$taskid - 1];
            //Now the two items have to be swapped
            $task_list[$taskid - 1] = $task_value;
            $task_list[$taskid] = $old_value;
        }
        break;    
    case 'Sort Tasks':
        sort($task_list);
        break;
}

include('task_list.php');
?>