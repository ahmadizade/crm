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



























?>