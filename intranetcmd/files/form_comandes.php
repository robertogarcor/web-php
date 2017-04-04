<?php
    if(!isset($_SESSION["user"])){
        header('Location:error.php');
        exit();
    }
    
    print '<h2>'.ASK_CMD_TITLE.'</h2><br/>';
    $html_formCmd = '<form name="cmd" action="intranet.php" method="POST" >'.    
                        '<input type="text" name="command" value="'.ASK_CMD_FORM.'" style="width:250px;" />'.
                        '<br/><br/>'.
                        '<input type="submit" name="saved_cmd" value="'.SAVED_FORM.'" />'.
                    '</form>';    
?>

<div>
    <?php echo $html_formCmd; ?>
</div>
