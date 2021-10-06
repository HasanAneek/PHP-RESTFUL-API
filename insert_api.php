<?php
header( 'Content-Type:application/json' );
header( 'Access-Control-Allow-Methods:POST' );
header( 'Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With' );
$data = json_decode( file_get_contents( "php://input" ), true );

$name = $data['sname'];
$age = $data['sage'];
$gender = $data['sgender'];
$country = $data['scountry'];

include "config.php";

$sql = "INSERT into students (name,age,gender,country) VALUES('{$name}','{$age}','{$gender}','{$country}')";

if ( mysqli_query( $conn, $sql ) ) {
    echo json_encode( array( 'message' => 'Successfully data Inserted', 'status' => true ) );
} else {
    echo json_encode( array( 'message' => 'No Record Found!', 'status' => false ) );
}