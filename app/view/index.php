<html>

<head>
<title></title>
</head>
<body>
  <h1>Hello World</h1>
  <p>Hello to all the people of this world!</p>
  <a href="sign_in.html">Sign In!</a>
</body>

<?php
# This function reads your DATABASE_URL configuration automatically set by Heroku
# the return value is a string that will work with pg_connect
 function pg_connection_string() {
   // we will fill this out next
   }

    # Establish db connection
    $db = pg_connect(pg_connection_string());
    if (!$db) {
       echo "Database connection error."
    exit;
          }

           $result = pg_query($db, "SELECT statement goes here");
?>

</html>
