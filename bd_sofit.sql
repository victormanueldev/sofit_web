-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2018 a las 07:35:30
-- Versión del servidor: 5.7.18-log
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_sofit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_Asistencia` int(11) NOT NULL,
  `hora_Ingreso` time NOT NULL,
  `fecha_Asistencia` date NOT NULL,
  `id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_Asistencia`, `hora_Ingreso`, `fecha_Asistencia`, `id_Usuario`) VALUES
(1, '21:44:38', '2018-02-13', 28),
(2, '21:44:44', '2018-03-13', 27),
(3, '21:44:48', '2018-04-03', 32),
(4, '21:45:48', '2018-05-13', 26),
(5, '21:45:56', '2018-06-13', 28),
(6, '21:46:01', '2018-07-13', 27),
(7, '23:42:18', '2018-08-13', 28),
(8, '23:42:31', '2018-09-13', 27),
(9, '23:42:35', '2018-10-13', 28),
(10, '23:42:39', '2018-10-13', 32),
(11, '23:42:44', '2018-11-13', 28),
(12, '23:42:47', '2018-12-13', 27),
(13, '23:42:52', '2018-03-13', 32),
(14, '23:42:57', '2018-03-13', 28),
(15, '23:43:01', '2018-03-13', 27),
(16, '23:43:04', '2018-01-13', 32),
(17, '23:43:09', '2018-02-13', 27),
(18, '23:43:13', '2018-04-13', 28),
(19, '23:56:39', '2018-06-13', 28),
(20, '23:56:43', '2018-10-13', 27),
(21, '23:56:47', '2018-08-13', 32),
(22, '23:56:50', '2018-05-13', 28),
(23, '23:56:52', '2018-04-13', 28),
(24, '23:56:54', '2018-04-13', 28),
(25, '23:56:56', '2018-11-13', 27),
(26, '23:56:58', '2018-01-13', 27),
(27, '23:57:00', '2018-08-13', 27),
(28, '23:57:04', '2018-02-13', 27),
(29, '23:57:09', '2018-04-13', 27),
(30, '23:57:25', '2018-10-13', 27),
(31, '23:57:43', '2018-11-13', 27),
(32, '23:57:53', '2018-12-13', 28),
(33, '23:58:10', '2018-02-13', 28),
(34, '23:58:19', '2018-08-13', 28),
(35, '23:58:32', '2018-05-13', 28),
(36, '23:58:50', '2018-05-13', 27),
(37, '23:59:08', '2018-02-13', 27),
(38, '23:59:24', '2018-01-13', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistenciaevento`
--

CREATE TABLE `asistenciaevento` (
  `id_AsistenciaEvento` int(11) NOT NULL,
  `id_Evento` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `nombresAsistente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rolAsistente` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `calificacion` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `asistenciaevento`
--

INSERT INTO `asistenciaevento` (`id_AsistenciaEvento`, `id_Evento`, `id_Usuario`, `nombresAsistente`, `rolAsistente`, `calificacion`) VALUES
(2, 5, 32, 'Dayana Murillo', 'Aprendiz', 'Excelente'),
(3, 6, 32, 'Dayana Murillo', 'Aprendiz', 'Regular'),
(4, 7, 32, 'Dayana Murillo', 'Aprendiz', 'Regular'),
(5, 7, 32, 'Dayana Murillo', 'Aprendiz', 'Excelente'),
(6, 7, 28, 'Andres Stiven Medina', 'Aprendiz', 'Excelente'),
(7, 5, 28, 'Andres Stiven Medina', 'Aprendiz', 'Bueno'),
(8, 5, 28, 'Andres Stiven Medina', 'Aprendiz', 'Excelente'),
(9, 5, 28, 'Andres Stiven Medina', 'Aprendiz', 'Bueno'),
(10, 5, 28, 'Andres Stiven Medina', 'Aprendiz', 'Bueno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_Categoria` int(11) NOT NULL,
  `nombre_Categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_Categoria`, `nombre_Categoria`) VALUES
(1, 'Abdomen'),
(2, 'Biceps'),
(3, 'Espalda'),
(4, 'Hombros'),
(5, 'Pectoral'),
(6, 'Pierna'),
(7, 'Triceps');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro`
--

CREATE TABLE `centro` (
  `id_Centro` int(11) NOT NULL,
  `nombre_Centro` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `centro`
--

INSERT INTO `centro` (`id_Centro`, `nombre_Centro`) VALUES
(5, 'Centro de Servicios y Gestión Empresarial '),
(6, 'Centro Acuícola y Agroindustrial de Gaira'),
(7, 'Centro de Electricidad y Automatización Industrial'),
(8, 'Centro Agroempresarial y Desarrollo Pecuario del Huila'),
(9, 'Centro Agroindustrial y Fortalecimiento Empresarial de Casanare');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_Ciudad` int(11) NOT NULL,
  `nombre_Ciudad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_Ciudad`, `nombre_Ciudad`) VALUES
(9, 'Cali'),
(10, 'Neiva'),
(11, 'Medellín'),
(12, 'Popayán'),
(13, 'Santa Marta'),
(14, 'Manizales'),
(29, 'Cúcuta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `id_Ejercicio` int(11) NOT NULL,
  `nombre_Ejercicio` varchar(150) NOT NULL,
  `foto_Ejercicio` varchar(150) NOT NULL,
  `id_Categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`id_Ejercicio`, `nombre_Ejercicio`, `foto_Ejercicio`, `id_Categoria`) VALUES
(80, 'Abdominales en máquina', 'app/img/Ejercicios/Abdomen/abdominale_ en_maquina.jpg', 1),
(81, 'Bicicleta', 'app/img/Ejercicios/Abdomen/bicicleta.jpg', 1),
(82, 'Crunch con piernas elevadas', 'app/img/Ejercicios/Abdomen/Crunch_con_piernas_elevadas.jpg', 1),
(83, 'Crunch con rotación', 'app/img/Ejercicios/Abdomen/Crunch_con_rotacion.jpg', 1),
(84, 'Crunch', 'app/img/Ejercicios/Abdomen/Crunch.jpg', 1),
(85, 'Elevación con piernas en maquina', 'app/img/Ejercicios/Abdomen/elevacion_de_piernas_en_maquina.jpg', 1),
(86, 'Elevación de piernas', 'app/img/Ejercicios/Abdomen/Elevacion_de_piernas.jpg', 1),
(87, 'Plancha a una pierna', 'app/img/Ejercicios/Abdomen/plancha_a_una_pierna.jpg', 1),
(88, 'Plancha lateral', 'app/img/Ejercicios/Abdomen/plancha_lateral.jpg', 1),
(89, 'Plancha', 'app/img/Ejercicios/Abdomen/plancha.jpg', 1),
(90, 'Rotaciones con peso', 'app/img/Ejercicios/Abdomen/Rotaciones_Con_Peso.jpg', 1),
(91, 'Curl concentrado', 'app/img/Ejercicios/Biceps/Curl_concentrado.jpg', 2),
(92, 'Curl de bíceps con barra', 'app/img/Ejercicios/Biceps/Curl_de_biceps_con_barra.jpg', 2),
(93, 'Curl de bíceps con mancuernas', 'app/img/Ejercicios/Biceps/Curl_de_biceps_con_mancuernas.jpg', 2),
(94, 'Predicador con barra', 'app/img/Ejercicios/Biceps/Predicador_con_barra.jpg', 2),
(95, 'Jalón al pecho', 'app/img/Ejercicios/Espalda/jalon_al_pecho.jpg', 3),
(96, 'Remo Unilateral', 'app/img/Ejercicios/Espalda/Remo_Unilateral.jpg', 3),
(97, 'Elevación frontal con mancuernas', 'app/img/Ejercicios/Hombros/Elevacion_frontal_con_mancuernas.jpg', 4),
(98, 'Elevación lateral con mancuernas', 'app/img/Ejercicios/Hombros/Elevacion_lateral_con_mancuernas.jpg', 4),
(99, 'Aperturas con mancuernas en banco plano', 'app/img/Ejercicios/Pectoral/Aperturas_con_mancuernas_en_banco_plano.jpg', 5),
(100, 'Aperturas en máquina', 'app/img/Ejercicios/Pectoral/Aperturas_en_maquina.jpg', 5),
(101, 'Flexiones de pecho con piernas en banco plano', 'app/img/Ejercicios/Pectoral/Flexiones_de_pecho_con_piernas_en_banco_plano.jpg', 5),
(102, 'Flexiones de pecho', 'app/img/Ejercicios/Pectoral/Flexiones_de_pecho.jpg', 5),
(103, 'Fondos en barras paralelas', 'app/img/Ejercicios/Pectoral/fondos_en_barras_paralelas.jpg', 5),
(104, 'Press de banca inclinado', 'app/img/Ejercicios/Pectoral/Press_de_banca_inclinado.jpg', 5),
(105, 'Press de banca plano', 'app/img/Ejercicios/Pectoral/Press_de_banca_plano.jpg', 5),
(106, 'Press inclinado con mancuernas', 'app/img/Ejercicios/Pectoral/press_inclinado_con_mancuernas.jpg', 5),
(107, 'Pull over', 'app/img/Ejercicios/Pectoral/pull_over.jpg', 5),
(108, 'Curl de cuádriceps', 'app/img/Ejercicios/Pierna/Curl_de_cuadriceps.jpg', 6),
(109, 'Elevación de talón', 'app/img/Ejercicios/Pierna/Elevacion_de_talon.jpg', 6),
(110, 'Prensa', 'app/img/Ejercicios/Pierna/Prensa.jpg', 6),
(111, 'Sentadilla barra libre', 'app/img/Ejercicios/Pierna/Sentadilla_barra_libre.jpg', 6),
(112, 'Sentadilla con mancuernas', 'app/img/Ejercicios/Pierna/Sentadilla_con_mancuernas.jpg', 6),
(113, 'Sentadilla hack', 'app/img/Ejercicios/Pierna/sentadilla_hack.jpg', 6),
(114, 'Tijeras', 'app/img/Ejercicios/Pierna/Tijeras.jpg', 6),
(115, 'Extensión de codo por encima de la cabeza con barra', 'app/img/Ejercicios/Triceps/Extension_de_codo_por_encima_de_la_cabeza_con_barra.jpg', 7),
(116, 'Extensión de codo por encima de la cabeza con mancuerna', 'app/img/Ejercicios/Triceps/Extension_de_codo_por_encima_de_la_cabeza_con_mancuerna.jpg', 7),
(119, 'Acostado', 'app/img/Ejercicios/1000px-Centos-logo-light.svg.png', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento`
--

CREATE TABLE `elemento` (
  `id_Elemento` int(11) NOT NULL,
  `nombre_Elemento` varchar(30) NOT NULL,
  `foto_Elemento` varchar(255) DEFAULT NULL,
  `fecha_Elemento` date NOT NULL,
  `cantidad_Elemento` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `elemento`
--

INSERT INTO `elemento` (`id_Elemento`, `nombre_Elemento`, `foto_Elemento`, `fecha_Elemento`, `cantidad_Elemento`) VALUES
(1, 'Mancuerna Hexagonal 5Kg', 'app/img/elementos/mancuerna hexagonal 5kg.jpg', '2017-12-20', 15),
(2, 'Disco con agarre 5 Kg', 'app/img/elementos/disco5kg.jpg', '2018-02-02', 45),
(3, 'Lazo para fitness', 'app/img/elementos/lazo para fitness.jpg', '2018-02-21', 4),
(4, 'Barra romana 1 mt', 'app/img/elementos/barra romana 1mt.jpg', '2018-02-09', 12),
(5, 'Bicilcleta', 'app/img/elementos/bicileta.jpg', '2018-03-03', 12),
(6, 'Pelotas para fitness', 'app/img/elementos/pelotas.jpg', '2018-03-03', 1),
(7, 'Multifuncioncal 4 estaciones', 'app/img/elementos/MULTIFUNCIONAL 4 ESTACIONES.jpg', '2018-03-06', 2),
(8, 'Sissy squat', 'app/img/elementos/sissy-squat.jpg', '2018-03-12', 2),
(10, 'Barra Cromada 1mt', 'app/img/elementos/450_1000.jpg', '2018-03-20', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `epicrisis`
--

CREATE TABLE `epicrisis` (
  `id_Epicrisis` int(11) NOT NULL,
  `hipertension` int(11) NOT NULL DEFAULT '0',
  `enfermedad_Cardiaca` int(11) NOT NULL DEFAULT '0',
  `cancer` int(11) NOT NULL DEFAULT '0',
  `sida` int(11) DEFAULT '0',
  `hepatitis` int(11) DEFAULT '0',
  `epilepsia` int(11) NOT NULL DEFAULT '0',
  `alergias` int(11) NOT NULL DEFAULT '0',
  `asma` int(11) NOT NULL DEFAULT '0',
  `convulsiones` int(11) DEFAULT '0',
  `anticuagulante` int(11) NOT NULL DEFAULT '0',
  `hipoglicemia` int(11) NOT NULL DEFAULT '0',
  `embarazo` int(11) NOT NULL DEFAULT '0',
  `diabetes` int(11) NOT NULL DEFAULT '0',
  `otro` varchar(150) DEFAULT NULL,
  `id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `epicrisis`
--

INSERT INTO `epicrisis` (`id_Epicrisis`, `hipertension`, `enfermedad_Cardiaca`, `cancer`, `sida`, `hepatitis`, `epilepsia`, `alergias`, `asma`, `convulsiones`, `anticuagulante`, `hipoglicemia`, `embarazo`, `diabetes`, `otro`, `id_Usuario`) VALUES
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Ninguna', 32),
(4, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 1, 'Ninguna', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacionantropometrica`
--

CREATE TABLE `evaluacionantropometrica` (
  `id_EvaluacionAntropometrica` int(11) NOT NULL,
  `tipo_Rh` varchar(3) NOT NULL,
  `estatura` decimal(10,2) NOT NULL,
  `peso` int(3) NOT NULL,
  `medidaBrazoIzquierda` int(3) NOT NULL,
  `medidaBrazoDerecha` int(3) NOT NULL,
  `medidaPecho` int(3) NOT NULL,
  `medidaPiernaDerecha` int(3) NOT NULL,
  `medidaPiernaIzquierda` int(3) NOT NULL,
  `medidaPantorrillaIzquierda` int(3) NOT NULL,
  `medidaPantorrillaDerecha` int(3) NOT NULL,
  `medidaCintura` int(3) NOT NULL,
  `medidaCuello` int(3) NOT NULL,
  `gluteos` int(3) NOT NULL,
  `antebrazoIzquierdo` int(3) NOT NULL,
  `antebrazoDerecho` int(3) NOT NULL,
  `imc` decimal(10,2) NOT NULL,
  `clasificacion` varchar(45) NOT NULL,
  `id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evaluacionantropometrica`
--

INSERT INTO `evaluacionantropometrica` (`id_EvaluacionAntropometrica`, `tipo_Rh`, `estatura`, `peso`, `medidaBrazoIzquierda`, `medidaBrazoDerecha`, `medidaPecho`, `medidaPiernaDerecha`, `medidaPiernaIzquierda`, `medidaPantorrillaIzquierda`, `medidaPantorrillaDerecha`, `medidaCintura`, `medidaCuello`, `gluteos`, `antebrazoIzquierdo`, `antebrazoDerecho`, `imc`, `clasificacion`, `id_Usuario`) VALUES
(1, 'O+', '1.78', 82, 30, 30, 45, 50, 50, 30, 30, 60, 20, 40, 25, 25, '25.88', 'Sobrepeso', 26),
(3, 'O-', '1.68', 48, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, '17.01', 'Delgadez Aceptable', 32),
(5, 'A-', '1.78', 66, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, '20.83', 'Normal', 28),
(9, 'A-', '1.78', 78, 45, 45, 45, 45, 45, 45, 45, 45, 45, 45, 45, 45, '24.62', 'Normal', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_Evento` int(11) NOT NULL,
  `codigo_Evento` varchar(6) NOT NULL,
  `nombre_Evento` varchar(45) NOT NULL,
  `descripcion_Evento` varchar(150) NOT NULL,
  `hora_Evento` time NOT NULL,
  `fecha_Evento` date NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `foto_Evento` varchar(100) DEFAULT NULL,
  `estado_Evento` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_Evento`, `codigo_Evento`, `nombre_Evento`, `descripcion_Evento`, `hora_Evento`, `fecha_Evento`, `id_Usuario`, `foto_Evento`, `estado_Evento`) VALUES
(4, 'JGPWKH', 'Zumba', '1 hora de zumba', '00:00:00', '2018-03-21', 26, 'app/img/logoSena.png', 0),
(5, '38V3KN', 'Spinning', 'Clase de Spinning', '17:59:00', '2018-02-26', 26, 'app/img/logoSena.png', 1),
(6, 'OMH4S7', 'Aero Rumba', 'Clase de Aerorumba de 7 horas', '07:00:00', '2018-03-15', 26, 'app/img/logoSena.png', 0),
(7, '7MAC2W', 'Clase de Baile', 'Clase de Salsa', '14:00:00', '2018-03-05', 26, 'app/img/logoSena.png', 1),
(8, '0EAH01', 'Campeonato de atletismo femenino', 'Atletismo 200 mts planos', '04:00:00', '2018-03-20', 26, 'app/img/eventos/logoSena.png', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_Inventario` int(11) NOT NULL,
  `fecha_Inventario` date NOT NULL,
  `hora_Inventario` time NOT NULL,
  `id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_Inventario`, `fecha_Inventario`, `hora_Inventario`, `id_Usuario`) VALUES
(1, '2018-03-05', '09:56:00', 26),
(2, '2018-03-05', '13:50:00', 27),
(3, '2018-03-14', '00:51:00', 27),
(8, '2018-03-18', '20:56:00', 27),
(9, '2018-03-19', '22:11:00', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_elemento`
--

CREATE TABLE `inventario_elemento` (
  `id_Inventario` int(11) NOT NULL,
  `id_Elemento` int(11) NOT NULL,
  `total_Elemento_Inventario` int(11) NOT NULL,
  `observacion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inventario_elemento`
--

INSERT INTO `inventario_elemento` (`id_Inventario`, `id_Elemento`, `total_Elemento_Inventario`, `observacion`) VALUES
(1, 1, 15, 'OK'),
(1, 2, 45, 'Ok'),
(1, 3, 4, 'OK'),
(1, 4, 12, 'OK'),
(1, 5, 12, 'Ok'),
(1, 6, 1, 'OK'),
(2, 1, 15, 'OK'),
(2, 2, 45, 'Ok'),
(2, 3, 4, 'OK'),
(2, 4, 11, 'Falta 1'),
(2, 5, 12, 'Ok'),
(2, 6, 1, 'OK'),
(3, 1, 15, 'OK'),
(3, 2, 45, 'OK'),
(3, 3, 4, 'OK'),
(3, 4, 12, 'OK'),
(3, 5, 12, 'Ok'),
(3, 6, 1, 'OK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad`
--

CREATE TABLE `novedad` (
  `id_Novedad` int(11) NOT NULL,
  `asunto_Novedad` varchar(45) NOT NULL,
  `descripcion_Novedad` varchar(150) NOT NULL,
  `estado_Novedad` varchar(25) NOT NULL,
  `fecha_Novedad` date NOT NULL,
  `hora_Novedad` time NOT NULL,
  `id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `novedad`
--

INSERT INTO `novedad` (`id_Novedad`, `asunto_Novedad`, `descripcion_Novedad`, `estado_Novedad`, `fecha_Novedad`, `hora_Novedad`, `id_Usuario`) VALUES
(1, 'Eliptica Dañada', 'Hay una Eliptica en mal estado sin reparar', 'Revisado', '2018-03-04', '15:00:00', 27),
(2, 'Elemento en mal estado', 'Hay una bicicleta oxidada que no deja realizar el ejercicio correctamente', 'Revisado', '2018-03-05', '13:00:00', 27),
(3, 'Techo en mal estado', 'El techo del gimnasio presenta una grieta y caen goteras', 'Enviado', '2018-03-13', '16:00:00', 26),
(4, 'lampara dañada', 'Se daño un a lampara', 'Enviado', '2018-03-20', '01:00:42', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id_Programa` int(11) NOT NULL,
  `nombre_Programa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`id_Programa`, `nombre_Programa`) VALUES
(6, 'Tecnólogo en Animación 3D'),
(7, 'Tecnólogo en Automatización Industrial'),
(8, 'Tecnólogo en Análisis y Desarrollo de SI'),
(9, 'Técnico en Programación de Software'),
(10, 'Tecnólogo en Contabilidad y Finanzas'),
(11, 'Tecnólogo en Comunicación Comercial'),
(12, 'Tecnólogo en Control Ambiental'),
(13, 'Tecnólogo en Desarrollo de Videojuegos'),
(14, 'Tecnólogo en Dirección de Ventas'),
(15, 'Tecnólogo en Electricidad Industrial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regional`
--

CREATE TABLE `regional` (
  `id_Regional` int(11) NOT NULL,
  `nombre_Regional` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `regional`
--

INSERT INTO `regional` (`id_Regional`, `nombre_Regional`) VALUES
(7, 'Regional Valle'),
(8, 'Regional Antioquia'),
(9, 'Regional Caldas'),
(10, 'Regional Huila'),
(11, 'Regional Magdalena'),
(12, 'Regional Cauca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_Rol` int(11) NOT NULL,
  `descripcion_Rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_Rol`, `descripcion_Rol`) VALUES
(1, 'Entrenador'),
(2, 'Usuario'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutina`
--

CREATE TABLE `rutina` (
  `id_Rutina` int(11) NOT NULL,
  `nombre_Rutina` varchar(45) NOT NULL,
  `fecha_Creacion` date NOT NULL,
  `fecha_Actualizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rutina`
--

INSERT INTO `rutina` (`id_Rutina`, `nombre_Rutina`, `fecha_Creacion`, `fecha_Actualizacion`) VALUES
(5, 'Rutina de Cuerpo', '2018-03-20', '2018-03-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutina_ejercicio`
--

CREATE TABLE `rutina_ejercicio` (
  `id_Rutina` int(11) NOT NULL,
  `id_Ejercicio` int(11) NOT NULL,
  `series` int(11) DEFAULT NULL,
  `repeticiones` int(11) DEFAULT NULL,
  `tiempo` int(11) DEFAULT NULL,
  `dia` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rutina_ejercicio`
--

INSERT INTO `rutina_ejercicio` (`id_Rutina`, `id_Ejercicio`, `series`, `repeticiones`, `tiempo`, `dia`) VALUES
(5, 89, 4, 5, 6, 2),
(5, 80, 6, 5, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `id_TipoDocumento` int(11) NOT NULL,
  `tipo_Documento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`id_TipoDocumento`, `tipo_Documento`) VALUES
(2, 'Cedula Ciudadanía'),
(4, 'Cedula Extranjeria'),
(3, 'Registro Civil'),
(1, 'Tarjeta de Identidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_Usuario` int(11) NOT NULL,
  `id_TipoDocumento` int(11) NOT NULL,
  `numeroId_Usuario` double NOT NULL,
  `nombres_Usuario` varchar(45) NOT NULL,
  `apellidos_Usuario` varchar(45) NOT NULL,
  `genero_Usuario` varchar(10) NOT NULL,
  `telefono_Usuario` varchar(17) NOT NULL,
  `celular_Usuario` varchar(23) NOT NULL,
  `email` varchar(45) NOT NULL,
  `fechaNacimiento_Usuario` date NOT NULL,
  `foto_Usuario` varchar(100) NOT NULL,
  `password` varchar(130) NOT NULL,
  `last_session` datetime DEFAULT NULL,
  `token` varchar(40) NOT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT '0',
  `activacion` int(12) NOT NULL DEFAULT '1',
  `id_Rol` int(11) NOT NULL DEFAULT '2',
  `id_Regional` int(11) NOT NULL,
  `id_Ciudad` int(11) NOT NULL,
  `id_Centro` int(11) NOT NULL,
  `id_Programa` int(11) NOT NULL,
  `cargo` varchar(25) NOT NULL,
  `numeroFicha_Usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_Usuario`, `id_TipoDocumento`, `numeroId_Usuario`, `nombres_Usuario`, `apellidos_Usuario`, `genero_Usuario`, `telefono_Usuario`, `celular_Usuario`, `email`, `fechaNacimiento_Usuario`, `foto_Usuario`, `password`, `last_session`, `token`, `token_password`, `password_request`, `activacion`, `id_Rol`, `id_Regional`, `id_Ciudad`, `id_Centro`, `id_Programa`, `cargo`, `numeroFicha_Usuario`) VALUES
(26, 2, 123, 'Victor Manuel', 'Arenas Lopez', 'Masculino', '123456', '3103195394', 'vmarenas36@misena.edu.co', '1998-03-01', 'app/img/avatar8.jpg', '$2y$10$YcJ8MEGA3LaV5yDRHxx9sOhEmALjLXMZ.SUi2thgudlk/magP99G6', '2018-03-20 00:27:10', '637238383af7f2417c47b7ca660f90f7', '', 1, 1, 3, 7, 9, 7, 8, 'Instructor', 1278987),
(27, 2, 456, 'Juan Sebastian', 'Garcia Murillo', 'Masculino', '123456', '3103111111', 'juan@gmail.com', '1996-01-01', 'app/img/a4.jpg', '$2y$10$xzLPNnteYZVXWG3w7.c5Y.MJ6JUYCXxgwydQtgfMGfSIomn7Py0e.', '2018-03-19 22:12:44', '8155cea4069102b3590ad94738ea54bb', '', 1, 1, 1, 7, 9, 7, 8, 'Instructor', 1261817),
(28, 2, 789, 'Andres Stiven', 'Medina', 'Masculino', '123456', '31111111', 'andres@gmail.com', '1997-01-01', 'app/img/a1.jpg', '$2y$10$T/3rgnWVYi.DYczIQbQ/2O.7G7/44lvpuQMn1WUyxv58ORi2ENub.', '2018-03-20 01:22:51', '292a825e3ec361412673b479fc558c82', '', 1, 1, 2, 7, 9, 7, 8, 'Aprendiz', 1261817),
(32, 2, 1144194315, 'Dayana', 'Murillo', 'Femenino', '123456', '3123121212', 'cdmurillo51@misena.edu.co', '1996-02-21', 'app/img/user/13.jpg', '$2y$10$C3JBO2yyt9nbQOKpsf2Isu1REM6QxK./hJhftuqDnSlIlO4MKBY2G', '2018-03-13 22:35:08', '691f926a8b4469a5f6826e858e964cd3', '', 1, 1, 2, 7, 9, 7, 8, 'Aprendiz', 1261817);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rutina`
--

CREATE TABLE `usuario_rutina` (
  `id_Usuario` int(11) NOT NULL,
  `id_Rutina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_rutina`
--

INSERT INTO `usuario_rutina` (`id_Usuario`, `id_Rutina`) VALUES
(28, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_Asistencia`),
  ADD KEY `fk_Asistencia_Usuario1_idx` (`id_Usuario`);

--
-- Indices de la tabla `asistenciaevento`
--
ALTER TABLE `asistenciaevento`
  ADD PRIMARY KEY (`id_AsistenciaEvento`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Evento` (`id_Evento`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_Categoria`);

--
-- Indices de la tabla `centro`
--
ALTER TABLE `centro`
  ADD PRIMARY KEY (`id_Centro`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_Ciudad`);

--
-- Indices de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD PRIMARY KEY (`id_Ejercicio`),
  ADD KEY `fk_Ejercicio_Categoria1_idx` (`id_Categoria`);

--
-- Indices de la tabla `elemento`
--
ALTER TABLE `elemento`
  ADD PRIMARY KEY (`id_Elemento`);

--
-- Indices de la tabla `epicrisis`
--
ALTER TABLE `epicrisis`
  ADD PRIMARY KEY (`id_Epicrisis`),
  ADD KEY `fk_Epicrisis_Usuario1_idx` (`id_Usuario`);

--
-- Indices de la tabla `evaluacionantropometrica`
--
ALTER TABLE `evaluacionantropometrica`
  ADD PRIMARY KEY (`id_EvaluacionAntropometrica`),
  ADD KEY `fk_EvaluacionAntropometrica_Usuario1_idx` (`id_Usuario`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_Evento`),
  ADD KEY `fk_Evento_Usuario1_idx` (`id_Usuario`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_Inventario`),
  ADD KEY `fk_Inventario_Usuario1_idx` (`id_Usuario`);

--
-- Indices de la tabla `inventario_elemento`
--
ALTER TABLE `inventario_elemento`
  ADD KEY `id_Inventario` (`id_Inventario`),
  ADD KEY `id_Elemento` (`id_Elemento`);

--
-- Indices de la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD PRIMARY KEY (`id_Novedad`),
  ADD KEY `fk_Novedad_Usuario1_idx` (`id_Usuario`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id_Programa`);

--
-- Indices de la tabla `regional`
--
ALTER TABLE `regional`
  ADD PRIMARY KEY (`id_Regional`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_Rol`);

--
-- Indices de la tabla `rutina`
--
ALTER TABLE `rutina`
  ADD PRIMARY KEY (`id_Rutina`);

--
-- Indices de la tabla `rutina_ejercicio`
--
ALTER TABLE `rutina_ejercicio`
  ADD KEY `fk_Rutina_has_Ejercicio_Ejercicio1_idx` (`id_Ejercicio`),
  ADD KEY `fk_Rutina_has_Ejercicio_Rutina1_idx` (`id_Rutina`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`id_TipoDocumento`),
  ADD UNIQUE KEY `tipo_Documento_UNIQUE` (`tipo_Documento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_Usuario`),
  ADD UNIQUE KEY `numeroId_Usuario_UNIQUE` (`numeroId_Usuario`),
  ADD KEY `fk_Usuario_TipoDocumento1_idx` (`id_TipoDocumento`),
  ADD KEY `fk_Usuario_Centro1_idx` (`id_Centro`),
  ADD KEY `fk_Usuario_Ciudad1_idx` (`id_Ciudad`),
  ADD KEY `fk_Usuario_Rol1_idx` (`id_Rol`),
  ADD KEY `fk_Usuario_Programa1_idx` (`id_Programa`),
  ADD KEY `fk_Usuario_Regional1_idx` (`id_Regional`);

--
-- Indices de la tabla `usuario_rutina`
--
ALTER TABLE `usuario_rutina`
  ADD KEY `fk_Usuario_has_Rutina_Rutina1_idx` (`id_Rutina`),
  ADD KEY `fk_Usuario_has_Rutina_Usuario1_idx` (`id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_Asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `asistenciaevento`
--
ALTER TABLE `asistenciaevento`
  MODIFY `id_AsistenciaEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `centro`
--
ALTER TABLE `centro`
  MODIFY `id_Centro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_Ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `id_Ejercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT de la tabla `elemento`
--
ALTER TABLE `elemento`
  MODIFY `id_Elemento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `epicrisis`
--
ALTER TABLE `epicrisis`
  MODIFY `id_Epicrisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `evaluacionantropometrica`
--
ALTER TABLE `evaluacionantropometrica`
  MODIFY `id_EvaluacionAntropometrica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_Evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_Inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `novedad`
--
ALTER TABLE `novedad`
  MODIFY `id_Novedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id_Programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `regional`
--
ALTER TABLE `regional`
  MODIFY `id_Regional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `rutina`
--
ALTER TABLE `rutina`
  MODIFY `id_Rutina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `id_TipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `fk_Asistencia_Usuario1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asistenciaevento`
--
ALTER TABLE `asistenciaevento`
  ADD CONSTRAINT `asistenciaevento_ibfk_1` FOREIGN KEY (`id_Evento`) REFERENCES `evento` (`id_Evento`),
  ADD CONSTRAINT `asistenciaevento_ibfk_2` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`);

--
-- Filtros para la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD CONSTRAINT `fk_Ejercicio_Categoria1` FOREIGN KEY (`id_Categoria`) REFERENCES `categoria` (`id_Categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `epicrisis`
--
ALTER TABLE `epicrisis`
  ADD CONSTRAINT `fk_Epicrisis_Usuario1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evaluacionantropometrica`
--
ALTER TABLE `evaluacionantropometrica`
  ADD CONSTRAINT `fk_EvaluacionAntropometrica_Usuario1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_Evento_Usuario1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_Inventario_Usuario1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventario_elemento`
--
ALTER TABLE `inventario_elemento`
  ADD CONSTRAINT `inventario_elemento_ibfk_1` FOREIGN KEY (`id_Inventario`) REFERENCES `inventario` (`id_Inventario`),
  ADD CONSTRAINT `inventario_elemento_ibfk_2` FOREIGN KEY (`id_Elemento`) REFERENCES `elemento` (`id_Elemento`);

--
-- Filtros para la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD CONSTRAINT `fk_Novedad_Usuario1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rutina_ejercicio`
--
ALTER TABLE `rutina_ejercicio`
  ADD CONSTRAINT `fk_Rutina_has_Ejercicio_Ejercicio1` FOREIGN KEY (`id_Ejercicio`) REFERENCES `ejercicio` (`id_Ejercicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Rutina_has_Ejercicio_Rutina1` FOREIGN KEY (`id_Rutina`) REFERENCES `rutina` (`id_Rutina`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Centro1` FOREIGN KEY (`id_Centro`) REFERENCES `centro` (`id_Centro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_Ciudad1` FOREIGN KEY (`id_Ciudad`) REFERENCES `ciudad` (`id_Ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_Programa1` FOREIGN KEY (`id_Programa`) REFERENCES `programa` (`id_Programa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_Regional1` FOREIGN KEY (`id_Regional`) REFERENCES `regional` (`id_Regional`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_Rol1` FOREIGN KEY (`id_Rol`) REFERENCES `rol` (`id_Rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_TipoDocumento1` FOREIGN KEY (`id_TipoDocumento`) REFERENCES `tipodocumento` (`id_TipoDocumento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_rutina`
--
ALTER TABLE `usuario_rutina`
  ADD CONSTRAINT `fk_Usuario_has_Rutina_Rutina1` FOREIGN KEY (`id_Rutina`) REFERENCES `rutina` (`id_Rutina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_has_Rutina_Usuario1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
