TicketFlow - Sistema de Fila Virtual

Sistema simple hecho en PHP + MySQL usando XAMPP.
Simula una fila virtual para comprar entradas de conciertos.

Estructura del proyecto
ticketflow/
│
├── conexion.php
├── index.php
├── registro.php
├── login.php
├── logout.php
├── fila.php
├── ticketflow.sql
Cómo usarlo en XAMPP
1. Copiar el proyecto

Copiar la carpeta ticketflow dentro de:

C:\xampp\htdocs\ticketflow
2. Encender XAMPP

Iniciar:

Apache
MySQL
3. Crear base de datos

Entrar a:

http://localhost/phpmyadmin

Luego:

Crear base de datos llamada ticketflow
Importar el archivo ticketflow.sql
4. Ejecutar el proyecto

Abrir en el navegador:

http://localhost/ticketflow
Usuario de prueba

Email: demo@demo.com
Password: password

Páginas del sistema
/index.php → página principal con conciertos
/registro.php → registro de usuario
/login.php → inicio de sesión
/logout.php → cerrar sesión
/fila.php?evento=duki → ingresar a la fila de un evento
Base de datos

Tabla usuarios:

id_usuario
email
password

Tabla fila_virtual:

id_fila
id_usuario
evento
numero_fila
estado
Tecnologías usadas
PHP
MySQL
XAMPP
HTML
CSS
Bootstrap
Problemas comunes

No conecta la base:

verificar que MySQL esté encendido
revisar nombre de base de datos

No carga la página:

verificar que el proyecto esté en htdocs

No hay estilos:

Bootstrap usa internet (CDN)
