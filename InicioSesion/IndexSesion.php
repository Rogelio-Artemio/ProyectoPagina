<?php
    //solicitar el archivo de conexion a la base de datos
    //Incluir cambios 
    //include 'Conexion.php';
    require_once "../conexion.php";
    session_start();
    if($_POST){
        $email = $_POST['CorreoElectronico'];
        $password = $_POST['Contraseña'];
    
        $sql = "SELECT id_admin, CorreoElectronico, Contraseña, NombreCompleto FROM administradores WHERE CorreoElectronico='$email'";
        echo $sql;
    
        $resultado = $conecta->query($sql);
        $num = $resultado->num_rows;
    
        if($num>0){
            $row = $resultado->fetch_assoc();
            $password_bd = $row['Contraseña'];        
    
            if($password_bd == $password){
                $_SESSION['id_admin'] = $row['id_admin'];
                $_SESSION['CorreoElectronico'] = $row['CorreoElectronico'];           
    
                header("Location: ../administrador/admin.php");
                exit;
    
            }else{
                echo "La contraseña no coincide";
    
            }
    
        }else{
            echo"No existe el usuario";
        }   
    }
    //$sql = "SELECT * FROM administradores "; /imgsesion/coexion.
?>
<!--Esta es una prueba para ver si se realzian bien los cambios-->
<!--Esta es una segunda prueba para ver si se realzian bien los cambios-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">    
    
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Login & Register</title>
</head>
<body>
    <header class="header">        
        <nav class="nav">
            <a href="#" class="nav_logo">Logotipo</a>
            
            <ul class="nav_items">
                <li class="nav_item">
                    <a href="#" class="nav_link">Inicio</a>
                    <a href="#" class="nav_link">Productos</a>
                    <a href="#" class="nav_link">Servicios</a>
                    <a href="#" class="nav_link">Contactos</a>
                </li>                
            </ul>

            <button class="button" id="form-open">Login</button>        
        </nav>
    </header>
    <!--Primer Cambio En Git 2-->    
    <section class="home">
        <div class="form_container">
            <i class="uil uil-times form_close"></i>   
            
            <!--LO0GIN-->
            <div class="form login_form">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <h2>Login</h2>
                        
                    <div class="input_box">
                        <!-- ingresar Email y poner un Icono en el TextBox -->
                        <input type="email" name="CorreoElectronico" placeholder="Ingresa tu Email" required>
                        <i class="uil uil-envelope-alt email"></i><!-- Icono -->                        
                    </div>

                    <div class="input_box">
                        <!-- ingresar Contraseña y poner un Icono en el TextBox -->
                        <input type="password" name="Contraseña" placeholder="Ingresa tu Contraseña" required>
                        <i class="uil uil-lock password"></i><!-- Icono -->
                        <i class="uil uil-eye-slash pw_hide"></i><!-- Icono Para ocultar y ver Contraseña -->
                    </div>

                    <div class="option_field">
                        <span class="checkbox">
                            <input type="checkbox" id="check">
                            <label for="check">Recordarme</label>
                        </span>

                        <a href="#" class="forgot_pw">¿Olvidaste tu Contraseña?</a>
                    </div>

                    <button class="button" name="boton">Iniciar Sesión</button>
                    <div class="login_signup">¿No Tienes Cuenta? <a href="" id="signup">Registrarse</a></div>
                </form>                  
            </div>
                       
            
            
            <!--REGISTROS-->
            <div class="form signup_form">
                <form action="#">
                    <h2>Registro</h2>

                    <div class="input_box">                        
                        <!-- ingresar Email y poner un Icono en el TextBox -->
                        <input type="nombre" placeholder="Ingresa tu Nombre" required>
                        <i class=" uil-user-circle nombre"></i><!-- Icono -->
                    </div>

                    <div class="input_box">                        
                        <!-- ingresar Email y poner un Icono en el TextBox -->
                        <input type="appaterno" placeholder="Ingresa tu Apellido Paterno" required>
                        <i class=" uil-user-circle appaterno"></i><!-- Icono -->
                    </div>

                    <div class="input_box">                        
                        <!-- ingresar Email y poner un Icono en el TextBox -->
                        <input type="apmaterno" placeholder="Ingresa tu Apellido Materno" required>
                        <i class=" uil-user-circle apmaterno"></i><!-- Icono -->
                    </div>                    

                    <div class="input_box">                        
                        <!-- ingresar Email y poner un Icono en el TextBox -->
                        <input type="email" placeholder="Ingresa tu Email" required>
                        <i class="uil uil-envelope-alt email"></i><!-- Icono -->
                    </div>

                    <div class="input_box">
                        <!-- ingresar Contraseña y poner un Icono en el TextBox -->
                        <input type="password" placeholder="Ingresa tu Contraseña" required>
                        <i class="uil uil-lock password"></i><!-- Icono -->
                        <i class="uil uil-eye-slash pw_hide"></i><!-- Icono Para ocultar y ver Contraseña -->
                    </div>        
                    
                    <div class="input_box">
                        <!-- ingresar Contraseña y poner un Icono en el TextBox -->
                        <input type="password" placeholder="Confirmar Contraseña" required>
                        <i class="uil uil-lock password"></i><!-- Icono -->
                        <i class="uil uil-eye-slash pw_hide"></i><!-- Icono Para ocultar y ver Contraseña -->
                    </div>

                    <button class="button">Registrarse</button>
                    <div class="login_signup">¿Tienes una Cuenta? <a href="#" id="login">Login</a></div>
                </form>
            </div>
        </div>
    </section>
    <script src="app.js"></script>
</body>
</html>