// Modificadores para parametros GET, vindos de dentro do WordPress da Still 
     <?php 
        
        if(isset($_GET['login'])){
            $redirect = $_GET['redirect_to'];
            
            echo "
                <style>
                    #sombra{
                        display: block;
                    }
                </style>
            ";
        }else{
            echo "
                <style>
                    #sombra{
                        display: none;
                    }
                </style>
            ";
        }
        if(isset($_GET['validate'])){
            $redirect = $_GET['redirect_to'];
            
            echo "
                <style>
                    #sombraValidate{
                        display: block;
                    }
                </style>
            ";
        }else{
            echo "
                <style>
                    #sombraValidate{
                        display: none;
                    }
                </style>
            ";
        }
         if(isset($_GET['passwordRecovery'])){
            $redirect = $_GET['redirect_to'];
            
            echo "
                <style>
                    #sombraRecover{
                        display: block;
                    }
                </style>
            ";
        }else{
            echo "
                <style>
                    #sombraRecover{
                        display: none;
                    }
                </style>
            ";
        }
        if(isset($_GET['login'])){
            echo "
                <style>
                    #wrongCredentials{
                        display: block;
                    }
                </style>
            ";
        }else{
            echo "
                <style>
                    #wrongCredentials{
                        display: none;
                    }
                </style>
            ";
        }
    ?>
