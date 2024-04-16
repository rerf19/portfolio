
<?php
    if(isset($_GET['mg'])){
        $var=$_GET['mg'];
        if($var == 't') {
            echo '<div  class="alert alert-success" role="alert">';
            echo "Thank You! I will be in touch soon.";
            echo '</div>';
        } if($var == 'f') { 
            echo '<div  class="alert alert-danger" role="alert">';
            echo "Something went wrong. Please try again later.";
            echo '</div>';
        }
    }
    
?> 