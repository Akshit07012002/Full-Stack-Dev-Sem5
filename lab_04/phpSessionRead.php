<?php
session_start();

if(isset($_SESSION["page_variable"])) {
    echo "<h3> Your page variable is ".$_SESSION["page_variable"]. "</h3>";
}
else{
    echo "<h3> Session variable not set </h3>";
}
?>