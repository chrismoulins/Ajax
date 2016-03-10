<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

 $dbConnection;
 $result;

 function connectToDB()
 {
      global $dbConnection;
      $dbConnection = mysqli_connect("localhost","root", "inet2005","sakila");
      if (!$dbConnection)
      {
            die('Could not connect to the Sakila Database: ' .
                    mysqli_error($dbConnection));
      }
 }

 function closeDB()
 {
      global $dbConnection;
      mysqli_close($dbConnection);
 }
 
 function selectFilmsCount()
 {
    global $dbConnection;
    $locResult;
    $locResult = mysqli_query($dbConnection,"SELECT COUNT(*) AS count FROM film"); 
    $row = mysqli_fetch_assoc($locResult); 
    $count = $row['count']; 
    return $count;

 }


 function selectFilms($order1,$order2,$start,$limit)
 {
    global $dbConnection;
    global $result;
    $sqlStatement = "SELECT film_id, title, description, rental_rate, length, rating FROM film ORDER BY $order1 $order2 LIMIT $start , $limit"; 
    $result = mysqli_query($dbConnection,$sqlStatement);
    if(!$result)
    {
            die('Could not retrieve records from the Sakila Database: ' .
                    mysqli_error($dbConnection));
    }

 }

 function fetchFilms()
 {
    global $dbConnection;
    global $result;
    if(!$result)
    {
            die('No records in the result set: ' .
                    mysqli_error($dbConnection));
    }
    return mysqli_fetch_assoc($result);
 }
?>
