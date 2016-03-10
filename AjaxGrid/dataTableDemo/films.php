<!DOCTYPE html>
<html>
    <head>
          <title>Film Data</title>
          <meta charset="UTF-8" />
          <link href="styles.css" rel="stylesheet" type="text/css" />
          <link href="css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
          <script src="js/jquery.js" type="text/javascript"></script>
          <script src="js/jquery.dataTables.js" type="text/javascript"></script>
          <script src="myCode.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
        </header>
        <section>
           <table id="grid">
               <thead>
                   <tr>
                       <th colspan="3">Film Data</th>
                   </tr>
                   <tr>
                       <th>Film ID</th>
                       <th>Film Title</th>
                       <th>Film Description</th>
                   </tr>
                </thead>
               <tbody>
            <?php
                // Insert php code here
                $db = mysqli_connect("localhost","root", "inet2005","sakila");
                if (!$db)
                {
                    die('Could not connect to the Sakila Database: ' . mysqli_error($db));
                }

                $result = mysqli_query($db,"SELECT * FROM film;"); // no limit
                if(!$result)
                {
                    die('Could not retrieve records from the Sakila Database: ' . mysqli_error($db));
                }


                while ($row = mysqli_fetch_assoc($result)):
            ?>
                    <tr>
                        <td><?php echo $row['film_id'];?></td>
                        <td><?php echo $row['title'];?></td>
                        <td><?php echo $row['description'];?></td>
                    </tr>
            <?php
                endwhile;

                mysqli_close($db);
            ?>
                </tbody>
            </table>

        </section>
        <footer>
        </footer>
    </body>
</html>