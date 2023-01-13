<?php
        if($session->hasGet("errors")){ 
                foreach($session->get("errors") as $error):
        ?>

        <div class="alert alert-danger"><?php echo $error ?></div>
        
        <?php endforeach;  }
        $session->remove("errors");
        ?>