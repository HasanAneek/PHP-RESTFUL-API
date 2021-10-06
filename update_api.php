<?php

header( 'Content-Type:application/json' );
header( 'Access-Control-Allow-Methods:PUT' );
header( 'Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With' );

$data = json_decode( file_get_contents( "php://input" ), true );
$id = $data['sid'];
$name = $data['sname'];
$age = $data['sage'];
$gender = $data['sgender'];
$country = $data['scountry'];

include "config.php";

$sql = "UPDATE students SET name='{$name}',age='{$age}',gender='{$gender}',country='{$country}' WHERE id={$id} ";

if ( mysqli_query( $conn, $sql ) ) {
    echo json_encode( array( 'message' => 'Successfully data Updated', 'status' => true ) );
} else {
    echo json_encode( array( 'message' => 'No data Updated!', 'status' => false ) );
}