# 🎫 TicketFlow - Sistema de Fila Virtual

Sistema básico de fila virtual para conciertos, desarrollado en PHP puro + MySQL para XAMPP.

---

## 📁 Estructura de archivos

```
ticketflow/
│
├── conexion.php       → Conexión a la base de datos MySQL
├── index.php          → Página principal con los 3 conciertos
├── registro.php       → Formulario para crear cuenta
├── login.php          → Inicio de sesión
├── logout.php         → Cierra la sesión
├── fila.php           → Sistema de fila virtual
├── ticketflow.sql     → Script para crear la base de datos
└── README.md          → Este archivo
```

---

## 🚀 Instrucciones para correrlo en XAMPP

### PASO 1 — Copiar la carpeta en htdocs

Copiá la carpeta `ticketflow` dentro de:

```
C:\xampp\htdocs\ticketflow\        (Windows)
/Applications/XAMPP/htdocs/ticketflow/  (Mac)
```

### PASO 2 — Iniciar XAMPP

Abrí el Panel de Control de XAMPP y activá:
- ✅ **Apache**
- ✅ **MySQL**

### PASO 3 — Crear la base de datos

1. Abrí el navegador y entrá a: `http://localhost/phpmyadmin`
2. Hacé clic en **"Nueva"** (lado izquierdo) o en **"Importar"** (arriba)
3. Si usás **Importar**: seleccioná el archivo `ticketflow.sql` y hacé clic en **Continuar**
4. Si preferís manual, copiá y pegá el contenido de `ticketflow.sql` en la pestaña **SQL** y ejecutalo

### PASO 4 — Abrir la aplicación

Entrá a:
```
http://localhost/ticketflow/
```

¡Listo! La aplicación debería funcionar.

---

## 🧪 Usuario de prueba (incluido en el SQL)

| Email         | Contraseña |
|---------------|------------|
| demo@demo.com | password   |

---

## 📋 Páginas disponibles

| URL                                      | Descripción                      |
|------------------------------------------|----------------------------------|
| `http://localhost/ticketflow/`            | Inicio - Lista de conciertos     |
| `http://localhost/ticketflow/registro.php`| Crear cuenta nueva               |
| `http://localhost/ticketflow/login.php`   | Iniciar sesión                   |
| `http://localhost/ticketflow/logout.php`  | Cerrar sesión                    |
| `http://localhost/ticketflow/fila.php?evento=The+Midnight` | Entrar a la fila |

---

## 🗄️ Base de datos

**Tabla `usuarios`**
| Campo      | Tipo         | Descripción              |
|------------|--------------|--------------------------|
| id_usuario | INT (PK)     | ID único del usuario     |
| email      | VARCHAR(150) | Email único              |
| password   | VARCHAR(255) | Contraseña hasheada      |

**Tabla `fila_virtual`**
| Campo       | Tipo         | Descripción                      |
|-------------|--------------|----------------------------------|
| id_fila     | INT (PK)     | ID único del registro            |
| id_usuario  | INT (FK)     | Referencia al usuario            |
| evento      | VARCHAR(150) | Nombre del concierto             |
| numero_fila | INT          | Posición en la fila              |
| estado      | VARCHAR(50)  | esperando / llamado / ingresado  |

---

## ⚙️ Tecnologías usadas

- PHP (versión 7.4 o superior)
- MySQL / MariaDB (XAMPP)
- MySQLi (extensión PHP para MySQL)
- Sesiones PHP
- Bootstrap 5 (CDN, necesita internet)
- HTML5 / CSS3

---

## 🔧 Solución de problemas comunes

**Error de conexión a la base de datos:**
- Verificá que MySQL esté corriendo en XAMPP
- Verificá que creaste la base de datos `ticketflow`
- En `conexion.php` confirmá que el usuario sea `root` y la contraseña esté vacía (por defecto en XAMPP)

**La página no carga:**
- Verificá que Apache esté corriendo en XAMPP
- Confirmá que la carpeta se llama `ticketflow` en htdocs

**No se ve el diseño (Bootstrap):**
- El diseño usa Bootstrap desde CDN, necesitás conexión a internet
- Si no tenés internet, podés descargar Bootstrap y referenciarlo localmente
