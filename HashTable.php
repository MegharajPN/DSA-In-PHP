<?php

/*

A hash table, also known as an associative array in PHP, is a data structure that stores key-value pairs. 
In PHP, you can create a hash table using the associative array syntax, where keys are unique identifiers
mapped to their corresponding values.

In this example:

We create a hash table with keys "name", "age", and "city", mapped to their respective values.
We access values using their keys.
We modify values using their keys.
We add a new key-value pair ("country").
We remove a key-value pair ("city").
We iterate through the hash table using a foreach loop.
Hash tables are efficient for storing and retrieving data because they use a hashing function to map keys to indices in an array. 
This allows for constant-time (O(1)) average-case performance for insertion, deletion, and lookup operations. However, 
it's important to note that the worst-case time complexity for these operations can degrade to O(n) 
if there are many collisions (i.e., different keys mapping to the same index). PHP's hash table implementation handles 
collisions internally, so you don't need to worry about them in most cases.

*/

// Creating a hash table (associative array)
$hashTable = array(
    "name" => "John",
    "age" => 30,
    "city" => "New York"
);

// Accessing values using keys
echo "Name: " . $hashTable["name"] . "<br>";
echo "Age: " . $hashTable["age"] . "<br>";
echo "City: " . $hashTable["city"] . "<br>";

// Modifying values
$hashTable["age"] = 35;

// Adding a new key-value pair
$hashTable["country"] = "USA";

// Removing a key-value pair
unset($hashTable["city"]);

// Iterating through the hash table
foreach ($hashTable as $key => $value) {
    echo "$key: $value <br>";
}


?>