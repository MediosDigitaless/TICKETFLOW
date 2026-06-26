-- ============================================
-- TicketFlow - Script SQL para phpMyAdmin
-- Ejecutar en phpMyAdmin o en la terminal MySQL
-- ============================================

CREATE DATABASE IF NOT EXISTS ticketflow CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE ticketflow;

-- Tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Tabla de fila virtual
CREATE TABLE IF NOT EXISTS fila_virtual (
    id_fila INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    evento VARCHAR(150) NOT NULL,
    numero_fila INT NOT NULL,
    estado VARCHAR(50) DEFAULT 'esperando',
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

-- Datos de ejemplo (opcional)
INSERT INTO usuarios (email, password) VALUES
('demo@demo.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
-- La contraseña del usuario demo es: "password"
