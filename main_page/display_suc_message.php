
<?php if(isset($_GET['meg']) && @is_null($_GET['meg'])) {
        echo '<div  class="alert alert-success" role="alert">';
        echo "Thank You! I will be in touch soon.";
        echo '</div>';
    } else { 
        echo '';
    }
?> 