<?php

$table_data = "";
include './controller/controller_retrieve.php';

$column_array = array();

if ($table_data && $mode == 'create') {

    $count = 0;

    $heading = mysqli_fetch_fields($table_data);

    if (!($location =='project')) {
        echo "<form id='createForm' action='?location=" . $location . "&mode=create&id=" . $id . "&action=submit' method='POST'>";
    } else {
        echo "<form id='createForm' action='?location=" . $location . "&mode=create&action=submit' method='POST'>";
    }

    foreach ($heading As $h) {
        $column_array[$count] = $h->name;
        //echo "<tr><td class='dataLabel'>". $h->name ."</td>";
        //echo "<td><input class='formInput' id='".$h->name."Input' type='text'></input>";

        $input_name = str_replace(' ', '', $h->name);

        if (!($h->name === 'Project Code') && !($h->name === 'Risk ID') && !($h->name === 'Score') &&
                !($h->name === 'Risk Title') && !($h->name === 'Status') && !($h->name === 'Action ID')) {
            echo "<label class='dataLabel'>" . $h->name . "</label>";

            if (($h->name === 'Go Live') || ($h->name === 'Due Date')) {
                echo "<input class='formInput' id='datepicker' name='" . $input_name . "' type='text'></input><br/><br/>";
            } else {
                echo "<input class='formInput' name='" . $input_name . "' type='text'></input><br/><br/>";
            }
        }
        $count++;
    }
    echo "<input id='createButton' type='submit' value='Create'></input>";
    echo "<input id='closeButton' type='button' value='Cancel' onclick='goBack();'></input>";
    echo "</form>";


    include './controller/controller_create.php';
}
