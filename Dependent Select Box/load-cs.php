<?php
$conn = mysqli_connect( "localhost", "root", "", "ajax_form" ) or die( "connection Failed" );
if ( $_POST['type'] == "" ) {
    $sql = "SELECT * FROM country_tb";
    $result = mysqli_query( $conn, $sql );

    $str = "";
    while ( $row = mysqli_fetch_assoc( $result ) ) {
        $str .= "<option value='{$row['cid']}'>{$row['cname']}</option>";
    }
} else if ( $_POST['type'] == "stateData" ) {
    $sql = "SELECT * FROM state_tb WHERE country={$_POST['id']}";
    $result = mysqli_query( $conn, $sql );

    $str = "";
    while ( $row = mysqli_fetch_assoc( $result ) ) {
        $str .= "<option value='{$row['sid']}'>{$row['sname']}</option>";
    }
}

echo $str;