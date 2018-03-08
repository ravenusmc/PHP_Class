<?php
//set default values
$name = '';
$email = '';
$phone = '';
$message = 'Enter some data and click on the Submit button.';

//process
$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'process_data':
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');

        /*************************************************
         * validate and process the name
         ************************************************/
        // 1. make sure the user enters a name
        if (empty($name)) {
            $message = 'Buddy, you must enter a name!!';
            break;
        }
        // 2. display the name with only the first letter capitalized
        //Ensuring that the string is all lower case:
        $name = strtolower($name);
        //Now ensuring that only the first letter, in the name, is capitalized
        $name = ucfirst($name);

        //I need to get the first name if the person enters the whole name. 
        $i = strpos($name, ' ');
        if ($i === false) {
            $f_name = $name;
        } else {
            $f_name = substr($name, 0, $i);
        }


        /*************************************************
         * validate and process the email address
         ************************************************/
        // 1. make sure the user enters an email
        if (empty($email)){
            $message = 'Buddy, you must enter an email!!';
        // 2. make sure the email address has at least one @ sign and one dot character
        }else if(strpos($email, '@') === false) {
            $message = 'Your email address does not contain an @ sign!!!';
            break;
        } else if(strpos($email, '.') === false) {
            $message = 'Your email address does not contain a . character!!!';
            break;
        }

        /*************************************************
         * validate and process the phone number
         ************************************************/
        //Here I 'clean' the phone number getting rid of special characters. 
        $phone = str_replace('(', '', $phone);
        $phone = str_replace(')', '', $phone);
        $phone = str_replace('-', '', $phone);
        $phone = str_replace(' ', '', $phone);
        $phone = str_replace('.', '', $phone);
        // 1. make sure the user enters at least seven digits, not including formatting characters
        if (strlen($phone) < 7){
            $message = 'Phone number to short!!!';
            break;
        }
        // 2. format the phone number like this 123-4567 or this 123-456-7890
        //Page 267 had an example of this which was very helpful!!!
        if (strlen($phone) == 7){
            $part1 = substr($phone, 0,3);
            $part2 = substr($phone, 3);
            $phone = $part1 . '-' . $part2;
            //echo $phone;
        }else {
            $part1 = substr($phone, 0,3);
            $part2 = substr($phone, 3,3);
            $part3 = substr($phone, 6);
            $phone = $part1 . '-' . $part2 . '-' . $part3;
            //echo $phone;
        }

        /*************************************************
         * Display the validation message
         ************************************************/
        $message = "Hello" . ' ' . $f_name . "\n" . "\n Thank you Entering this data: " . "\n" .
        "\n" . "Name:" . ' ' . $name . "\n" . "Email:" . ' ' . $email . "\n" . "Phone:" . ' ' . $phone;

        break;
}
include 'string_tester.php';
?>