<?php
class Shutdown
{
    public function endScript()
    {
        if(error_get_last())
        {
             echo '<pre>';
             print_r(error_get_last());
             echo '</pre>';
        }
        file_put_contents('/Users/Spirit_xc/Desktop/web/php/app/error/testError.txt','this is a test');
        die('end script');
    }
}

register_shutdown_function(array(new Shutdown(),'endScript'));
echo md6();
?>
