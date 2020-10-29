<?php
//Aquí hago uso de las variables de sessión
//------------------------------------------
session_start(); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
//------------------------------------------
require_once('helpers/dd.php');

//Función poara validar los datos del usuario que se registra en la página
function validarUsuario($datos,$imagen){
    //dd($datos);
    $errores = [];
    
    $nombre = trim($datos['first_name']);
    if(empty($nombre)){
        $errores['first_name'] = "El campo 'Nombre' no puede quedar vacio...";
    }
    $apellido = trim($datos['last_name']);
    if($apellido == ""){    
        $errores['last_name'] = "El campo 'Apellido' no puede quedar vacio...";
    }
    $email = trim($datos['email']);
    if(empty($email)){    
        $errores['email'] = "El campo 'Email' no puede quedar vacio...";
    }elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
        $errores['email'] = "El email es inválido...";
    }
    //Para el validar el password: is_numeric - empty - strlen  
    $password = trim($datos['password']);
    if(empty($password)){
        $errores['password'] = "El campo 'Contraseña' no puede quedar vacio...";
    } else {
        if(!is_numeric($password)){
            $errores['password'] = "La contraseña debe ser numerica";
        } else {
            if(strlen($password)<6){
                $errores['password'] = 'La contraseña debe tener como mínimo 6 caracteres';
            }
        }
    }
    $cpassword = trim($datos['confirm_password']);
    if ($password !== $cpassword){
        $errores['confirm_password'] = 'Las contraseñas no coinciden';
    }
    if(isset($imagen)){
        $avatar = $imagen['avatar']['name'];
        $ext = pathinfo($avatar,PATHINFO_EXTENSION);
        if($imagen['avatar']['error'] !=0){
            $errores['avatar'] = 'Debe subir su imagen';
        }elseif ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
            $errores['avatar'] = 'Sólo debe subir archivos con formatos jpg - jpeg - png ';
        }
    }


    return $errores;
}
        
//Función para armar la imagen a ser guardada en el servidor
function armarAvatar($imagen){
    $nombreArchivo = $imagen['avatar']['name'];
    $ext = pathinfo($nombreArchivo,PATHINFO_EXTENSION);
    $archivoOrigen = $imagen['avatar']['tmp_name'];
    $archivoDestino = dirname(__DIR__).'/imagenes/';
    $avatar = uniqid('avatar-').'.'.$ext;
    $archivoDestino = $archivoDestino.$avatar;
    move_uploaded_file($archivoOrigen, $archivoDestino);
    return $avatar;
}
//Función para guardar los datos del usuario
function guardarUsuario($bd,$tabla,$datos,$avatar){
    //Organizar los datos a ser guardados
    $first_name = $datos['first_name'];
    $last_name = $datos['last_name'];
    $email = $datos['email'];
    $password = password_hash($datos["password"], PASSWORD_DEFAULT);
    $perfil = 1;
    
    //Armar la consulta
    $sql = "insert into $tabla (first_name,last_name,email,password,perfil,avatar) values (:first_name,:last_name,:email,:password,:perfil,:avatar)";
    //Preparar la consulta
    $query = $bd->prepare($sql);
    $query->bindValue(':first_name', $first_name);
    $query->bindValue(':last_name', $last_name);
    $query->bindValue(':email', $email);
    $query->bindValue(':password', $password);
    $query->bindValue(':perfil', $perfil);
    $query->bindValue(':avatar',$avatar);
    $query->execute();
}
//Función para efectiuar la conexión a la Base de Datos
function conexion($host,$dbname,$user,$password){
    try {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $bd = new PDO($dsn, $user, $password);
        return $bd   ;
    } catch (PDOException $error) {
        echo "Ha ocurrido un error en la conexión ". $error->getMessage();
        exit;
    }
    
}
//Función para listar los datos del usuario
function listarUsuarios($bd, $tabla){
    //Armar la consulta
    $sql = "select *from $tabla";
    //Preparar la consulta
    $query= $bd->prepare($sql);
    //Ejecutar la consulta
    $query->execute();
    //Traer los datos de la consulta
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    return $usuarios;

}

//Función para modificar los datos del usuario
function modificarUsuario($bd, $tabla, $datos){

    //Recopilación datos $_POST
    $id= intval($datos['id']);
    $first_name = $datos['first_name'];
    $last_name = $datos['last_name'];
    $email = $datos['email'];
    //Armado del update
    
    $sql = "update $tabla set id= :id,first_name= :first_name,last_name= :last_name ,email= :email  where id= :id";
    //Inserción de datos en la sentencia
    
    $query = $bd->prepare($sql);
    $query->bindvalue(':id', $id);
    $query->bindValue(':first_name', $first_name);
    $query->bindValue(':last_name', $last_name);
    $query->bindValue(':email', $email);
    $query->execute();
    
}

//Función para validar el usuario a ser modificado
function validarUsuarioModificado($datos){
    //dd($datos);
    $errores = [];
    
    $nombre = trim($datos['first_name']);
    if(empty($nombre)){
        $errores['first_name'] = "El campo 'Nombre' no puede quedar vacio...";
    }
    $apellido = trim($datos['last_name']);
    if($apellido == ""){    
        $errores['last_name'] = "El campo 'Apellido' no puede quedar vacio...";
    }
    $email = trim($datos['email']);
    if(empty($email)){    
        $errores['email'] = "El campo 'Email' no puede quedar vacio...";
    }elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
        $errores['email'] = "El email es inválido...";
    }
    return $errores;
} 


function eliminarUsuario($bd,$tabla,$datos){
    //Recopilación de datos del $_POST
    $id=intval($datos['id']);
    //Armado el delete
    $sql= "delete from $tabla where id= :id";
    //Inserción de datos en la sentencia
    $query=$bd->prepare($sql);
    $query->bindvalue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    if($query->rowCount()>0){
        echo "<h2 style='text-align:center'>Registro eliminado</h2>";
    }else{
        echo "<h2 style='text-align:center'>No se pudo elimiar el registro</h2>";
    }
}


//------------------------------
//Funciones usadas en el Login
//------------------------------
function validarLogin($datos){
    //dd($datos);
    $errores = [];
    
    $email = trim($datos['email']);
    if(empty($email)){    
        $errores['email'] = "El campo 'Email' no puede quedar vacio...";
    }elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
        $errores['email'] = "El email es inválido...";
    }
    //Para el validar el password: is_numeric - empty - strlen  
    $password = trim($datos['password']);
    if(empty($password)){
        $errores['password'] = "El campo 'Contraseña' no puede quedar vacio...";
    } else {
        if(!is_numeric($password)){
            $errores['password'] = "La contraseña debe ser numerica";
        } else {
            if(strlen($password)<6){
                $errores['password'] = 'La contraseña debe tener como mínimo 6 caracteres';
            }
        }
    }

    return $errores;
}

//Función para buscar al usuario por Email
function buscarPorEmail($bd, $tabla, $email){
    $sql = "select *from $tabla where email = '$email'";
    $query= $bd->prepare($sql);
    $query->execute();
    $usuario = $query->fetch(PDO::FETCH_ASSOC);
    return $usuario;
 }

//Función para setear el ingreso del usuario - $_SESSION
function seteoUsuario($usuario,$datos){
    $_SESSION['nombre'] = $usuario['first_name'];
    $_SESSION['apellido'] = $usuario['last_name'];
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['perfil'] = $usuario['perfil'];
    $_SESSION['avatar'] = $usuario['avatar']; 
    if(isset($datos['recordarme'])){
        //                                  time()+60*60*24*365*10 
        setcookie('email', $datos['email'], time()+3600);
        setcookie('password',$datos['password'],time()+3600);
    }
}

//Esta función valida si el usuario está logueado o no.
function ingresoUsuario(){
    if(isset($_SESSION['email'])){
        return true;
    }elseif ($_COOKIE['email']) {
        $_SESSION['email'] = $_COOKIE['email'];
        return true;
    }else {
        return false;
    }
}

//Función para enviar correo al usuario
function enviarCorreo($datos){
    $nombre = $datos['first_name'];
    $apellido = $datos['last_name'];
    $nombreCompleto = $nombre .' '.$apellido;
    $email = $datos['email'];

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'angel.daniel.fuentes.segura@gmail.com';                     // SMTP username
        //Aquí deben colocar la clave de su correo electrónico
        $mail->Password   = 'estaesmiclavesupersecreta';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('angel.daniel.fuentes.segura@gmail.com', 'Angel Daniel Fuentes');
        $mail->addAddress($email, $nombreCompleto);     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Gracias por registrarte en nuestro sitio web';
        $mail->Body    = 'Muy pronto nos estaremos contactando y te haremos llegar nuevos recursos y eventos que vamos a realizar <b>Muchas gracias por preferirnos!</b>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Correo enviado de manera satisfactoria';
        //exit;
    } catch (Exception $e) {
        echo "El correo no se logro enviar: {$mail->ErrorInfo}";
        //exit;
    }
}

