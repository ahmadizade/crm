<?php
function print_h($x)
{
    echo '<pre>';
    print_r($x);
    echo '</pre>';
}

function rowcount($result)
{
    $rowcount = mysqli_num_rows($result);
    printf($rowcount);
}

// Encrypt cookie
function encryptCookie( $value ) {
    $key = 'youkey';
    $newvalue = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $key ), $value, MCRYPT_MODE_CBC, md5( md5( $key ) ) ) );
    return( $newvalue );
}

// Decrypt cookie
function decryptCookie( $value ) {
    $key = 'youkey';
    $newvalue = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $key ), base64_decode( $value ), MCRYPT_MODE_CBC, md5( md5( $key ) ) ), "\0");
    return( $newvalue );
}


























?>