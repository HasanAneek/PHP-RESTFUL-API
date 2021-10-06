<?php
header( 'Content-Type:application/json' );

//For POST API//
// $data = json_decode( file_get_contents( "php://input" ), true );
// $search_value = $data['search'];

//For GET Api//
$search_value = isset( $_GET['search'] ) ? $_GET['search'] : "";
include "config.php";

$sql = "SELECT * FROM students WHERE name LIKE '%{$search_value}%'";
$result = mysqli_query( $conn, $sql ) or die( "Query Failed" );

if ( mysqli_num_rows( $result ) > 0 ) {
    $output = mysqli_fetch_all( $result, MYSQLI_ASSOC );
    echo json_encode( $output, JSON_PRETTY_PRINT );
} else {
    echo json_encode( array( 'message' => 'Search Not Found!', 'status' => false ) );
}