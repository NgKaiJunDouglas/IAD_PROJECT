<?php
include_once "db.php";

$sql = "SELECT id, email, administrator FROM members";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
if (mysqli_error($db) == false) {
   echo "failed";
}

echo $_COOKIE["user"];
if ($_COOKIE["user"] == "admin@admin.com" && $row['administrator'] == 'yes' && $row['id'] == 2) {
   setcookie("adStatus", 'yes', null, "/");
} else {
   setcookie("adStatus", 'no', null, "/");
}
?>

<head>
   <script src="js/jquery-3.6.0.min.js" type="application/javascript"></script>
   <script type="module">
      import { getCookie } from "./js/cookies.js";

      $(document).ready(function() {
         if (getCookie("user") == 'admin%40admin.com') {
            <?php
            setcookie("adStatus", 'yes', null, "/");
            ?>
         } else {
            <?php
            setcookie("adStatus", 'no', null, "/");   
            ?>
         }
      });
      </script>
</head>