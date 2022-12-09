CREATE DATABASE SOCUnedl;

USE SOCUnedl;

CREATE TABLE
    IF NOT EXISTS congresounedl (
        id_convocatoria INT(11) NOT NULL AUTO_INCREMENT,
        tipo_evento VARCHAR(255) NULL DEFAULT NULL,
        descripcion VARCHAR(255) NULL DEFAULT NULL,
        ubicacion VARCHAR(255) NULL DEFAULT NULL,
        telefono VARCHAR(15) NULL DEFAULT NULL,
        fecha VARCHAR(255) NULL DEFAULT NULL,
        img_convo TEXT NULL DEFAULT NULL,
        estado INT(11) NULL DEFAULT NULL,
        PRIMARY KEY (id_convocatoria)
    ) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARACTER SET = latin1;

CREATE TABLE
    IF NOT EXISTS invitado (
        id_invitado INT(11) NOT NULL AUTO_INCREMENT,
        tipoe VARCHAR(255) NOT NULL,
        tema_prop VARCHAR(255) NULL DEFAULT NULL,
        descripcion VARCHAR(255) NULL DEFAULT NULL,
        requesito VARCHAR(255) NULL DEFAULT NULL,
        nombres VARCHAR(255) NULL DEFAULT NULL,
        apellidoP VARCHAR(255) NULL DEFAULT NULL,
        apellidoM VARCHAR(255) NULL DEFAULT NULL,
        email VARCHAR(255) NULL DEFAULT NULL,
        compania VARCHAR(255) NULL DEFAULT NULL,
        ocupacion VARCHAR(255) NULL DEFAULT NULL,
        resenia TEXT NULL DEFAULT NULL,
        estado INT(11) NULL DEFAULT NULL,
        PRIMARY KEY (id_invitado)
    ) ENGINE = InnoDB AUTO_INCREMENT = 8 DEFAULT CHARACTER SET = latin1;

CREATE TABLE
    IF NOT EXISTS participantes (
        id_partic INT(11) NOT NULL AUTO_INCREMENT,
        evento VARCHAR(255) NULL DEFAULT NULL,
        tema_selec VARCHAR(255) NULL DEFAULT NULL,
        nombres VARCHAR(255) NULL DEFAULT NULL,
        apellido_p VARCHAR(255) NULL DEFAULT NULL,
        apellido_m VARCHAR(255) NOT NULL,
        email VARCHAR(255) NULL DEFAULT NULL,
        horario VARCHAR(255) NOT NULL,
        ubicacion VARCHAR(255) NOT NULL,
        pago_total TEXT NULL DEFAULT NULL,
        pago_parcial1 TEXT NOT NULL,
        pago_parcial2 TEXT NOT NULL,
        estado INT(11) NULL DEFAULT NULL,
        PRIMARY KEY (id_partic)
    ) ENGINE = InnoDB AUTO_INCREMENT = 10 DEFAULT CHARACTER SET = latin1;

CREATE TABLE
    IF NOT EXISTS tb_usuarios (
        id INT(11) NOT NULL AUTO_INCREMENT,
        nombres VARCHAR(512) NULL DEFAULT NULL,
        apellido_p VARCHAR(512) NULL DEFAULT NULL,
        apellido_m VARCHAR(512) NULL DEFAULT NULL,
        foto_perfil TEXT NULL DEFAULT NULL,
        email VARCHAR(512) NULL DEFAULT NULL,
        password VARCHAR(512) NULL DEFAULT NULL,
        token VARCHAR(512) NULL DEFAULT NULL,
        cargo VARCHAR(512) NULL DEFAULT NULL,
        user_creacion VARCHAR(512) NULL DEFAULT NULL,
        user_actualizacion VARCHAR(512) NULL DEFAULT NULL,
        user_eliminacion VARCHAR(512) NULL DEFAULT NULL,
        fyh_creacion DATETIME NULL DEFAULT NULL,
        fyh_actualizacion DATETIME NULL DEFAULT NULL,
        fyh_eliminacion DATETIME NULL DEFAULT NULL,
        estado VARCHAR(255) NULL DEFAULT NULL,
        PRIMARY KEY (id)
    ) ENGINE = InnoDB AUTO_INCREMENT = 36 DEFAULT CHARACTER SET = latin1;

CREATE TABLE
    IF NOT EXISTS tema_taller (
        id_taller INT(11) NOT NULL AUTO_INCREMENT,
        tipo VARCHAR(255) NOT NULL,
        tema VARCHAR(255) NULL DEFAULT NULL,
        descripcion TEXT NULL DEFAULT NULL,
        img_taller TEXT NULL DEFAULT NULL,
        nombre_tallerista VARCHAR(255) NULL DEFAULT NULL,
        cupos INT(11) NULL DEFAULT NULL,
        horario_entrada VARCHAR(255) NOT NULL,
        horario_salida VARCHAR(255) NOT NULL,
        herramientas TEXT NULL DEFAULT NULL,
        ubicacion VARCHAR(255) NULL DEFAULT NULL,
        estado VARCHAR(50) NOT NULL,
        PRIMARY KEY (id_taller)
    ) ENGINE = InnoDB AUTO_INCREMENT = 15 DEFAULT CHARACTER SET = latin1;