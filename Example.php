<?php


try {
    // Code that may throw an exception
    $result = 10/0; // This will cause a division by zero error-
    echo "ssssssss".$result;
} catch (Exception $e) {
    // Catch the exception and handle it
    echo "Caught exception: " . $e->getMessage();
} finally {
    // Code that always runs, regardless of whether an exception occurred
    echo "\nFinally block executed.";
}


?>