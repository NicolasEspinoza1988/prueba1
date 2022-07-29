<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html;"> 
        <title>:: Colegio Saint Germaine Intranet ::</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1, maximum-scale=1,minimum-scale=1">
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <link rel="stylesheet" type="text/css" href="css/CSSlogin.css">
        
    </head>
    <body>
            <form action="login.php"  name="myForm"   method="post">
                <img src="img/logo_sg_25.jpg">
                <label for="user">Rut</label>
                <input type="text" id="user" name="user" placeholder="15052720-K" pattern="[0-9]{1,2}[.]{0,1}[0-9]{3}[.]{0,1}[0-9]{3}-{0,1}[0-9kK]{1}" autofocus required>
                <label for="pass">Contrase&ntilde;a</label>
                <input type="password" id="pass" name="pass" value="" required>
                <input type="submit" value="Ingresar">
            </form> 
    </body>
</html>