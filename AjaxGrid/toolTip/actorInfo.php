<h5>Actor list:</h5>
<ul>
    <?php
        // Insert php code here
        $db = mysqli_connect("localhost","root", "inet2005","sakila");
        if (!$db)
        {
            die('Could not connect to the Sakila Database: ' . mysqli_error($db));
        }

        $currentFilm = $_GET['filmID'];

        /* remove the "film" from the front of the id */
        $currentFilmId = str_replace ("film", "", $currentFilm);

        $sqlStatement = "SELECT * FROM actor AS a";
        $sqlStatement .= " INNER JOIN film_actor AS fa";
        $sqlStatement .= " ON a.actor_id = fa.actor_id";
        $sqlStatement .= " WHERE fa.film_id = $currentFilmId";

        $result = mysqli_query($db,$sqlStatement);
        if(!$result)
        {
            die('Could not retrieve records from the Sakila Database: ' . mysqli_error($db));
        }


        while ($row = mysqli_fetch_assoc($result)):
    ?>

            <li><?php echo $row['first_name'] . " " . $row['last_name'];?></li>
    <?php
        endwhile;

        mysqli_close($db);
    ?>
</ul>