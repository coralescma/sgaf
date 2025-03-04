-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2025 a las 01:54:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` int(3) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `id_representante` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellido`, `edad`, `correo`, `id_representante`, `fecha_nacimiento`, `sexo`) VALUES
(1, 'Ana', 'García', 16, 'ana.garcia@email.com', 1, '2007-03-15', 'F'),
(2, 'Luis', 'Pérez', 17, 'luis.perez@email.com', 2, '2006-07-20', 'M'),
(3, 'María', 'López', 15, 'maria.lopez@email.com', 3, '2008-11-08', 'F'),
(4, 'Carlos', 'Rodríguez', 18, 'carlos.rodriguez@email.com', 4, '2005-04-01', 'M'),
(5, 'Sofía', 'Martínez', 16, 'sofia.martinez@email.com', 1, '2007-08-22', 'F'),
(6, 'Pedro', 'Sánchez', 17, 'pedro.sanchez@email.com', 2, '2006-02-10', 'M'),
(7, 'Laura', 'Gómez', 15, 'laura.gomez@email.com', 3, '2008-09-03', 'F'),
(8, 'Javier', 'Díaz', 18, 'javier.diaz@email.com', 4, '2005-12-25', 'M'),
(9, 'Ana', 'García', 16, 'ana.garcia@email.com', 1, '2007-03-15', 'F'),
(10, 'Luis', 'Pérez', 17, 'luis.perez@email.com', 2, '2006-07-20', 'M'),
(11, 'María', 'López', 15, 'maria.lopez@email.com', 3, '2008-11-08', 'F'),
(12, 'Carlos', 'Rodríguez', 18, 'carlos.rodriguez@email.com', 4, '2005-04-01', 'M'),
(13, 'Sofía', 'Martínez', 16, 'sofia.martinez@email.com', 1, '2007-08-22', 'F'),
(14, 'Pedro', 'Sánchez', 17, 'pedro.sanchez@email.com', 2, '2006-02-10', 'M'),
(15, 'Laura', 'Gómez', 15, 'laura.gomez@email.com', 3, '2008-09-03', 'F'),
(16, 'Javier', 'Díaz', 18, 'javier.diaz@email.com', 4, '2005-12-25', 'M'),
(17, 'Ricardo', 'Corales', 16, 'ricardo.corales@email.com', 5, '2007-05-10', 'M'),
(18, 'Valentina', 'Martinez', 17, 'valentina.martinez@email.com', 6, '2006-12-03', 'F'),
(19, 'Santiago', 'Jimenez', 15, 'santiago.jimenez@email.com', 7, '2008-01-28', 'M'),
(20, 'Isabella', 'Rodriguez', 18, 'isabella.rodriguez@email.com', 8, '2005-09-14', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id_aula` int(11) NOT NULL,
  `nombre_aula` varchar(255) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id_aula`, `nombre_aula`, `capacidad`) VALUES
(1, 'Aula 101', 30),
(2, 'Aula 102', 25),
(3, 'Aula 103', 35),
(4, 'Aula 104', 28),
(5, 'Aula 105', 32),
(6, 'Aula 106', 26),
(7, 'Aula 107', 31),
(8, 'Aula 108', 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario_escolar`
--

CREATE TABLE `calendario_escolar` (
  `id_evento` int(11) NOT NULL,
  `nombre_evento` varchar(255) DEFAULT NULL,
  `fecha_evento` date DEFAULT NULL,
  `hora_evento` time DEFAULT NULL,
  `descripcion_evento` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `calendario_escolar`
--

INSERT INTO `calendario_escolar` (`id_evento`, `nombre_evento`, `fecha_evento`, `hora_evento`, `descripcion_evento`) VALUES
(1, 'Inicio de clases', '2023-09-01', '08:00:00', 'Inicio del año escolar 2023-2024'),
(2, 'Exámenes parciales', '2023-11-15', '09:00:00', 'Exámenes del primer trimestre'),
(3, 'Vacaciones de invierno', '2023-12-20', '12:00:00', 'Inicio de las vacaciones de invierno'),
(4, 'Día del Estudiante', '2024-05-15', '10:00:00', 'Celebración del Día del Estudiante'),
(5, 'Fin de clases', '2024-06-30', '16:00:00', 'Fin del año escolar 2023-2024'),
(6, 'Inicio de clases', '2023-09-01', '08:00:00', 'Inicio del año escolar 2023-2024'),
(7, 'Exámenes parciales', '2023-11-15', '09:00:00', 'Exámenes del primer trimestre'),
(8, 'Vacaciones de invierno', '2023-12-20', '12:00:00', 'Inicio de las vacaciones de invierno'),
(9, 'Día del Estudiante', '2024-05-15', '10:00:00', 'Celebración del Día del Estudiante'),
(10, 'Fin de clases', '2024-06-30', '16:00:00', 'Fin del año escolar 2023-2024');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo_escolar`
--

CREATE TABLE `ciclo_escolar` (
  `id_ciclo` int(11) NOT NULL,
  `nombre_ciclo` varchar(255) DEFAULT NULL,
  `fecha_inicial` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ciclo_escolar`
--

INSERT INTO `ciclo_escolar` (`id_ciclo`, `nombre_ciclo`, `fecha_inicial`, `fecha_final`) VALUES
(1, '2023-2024', '2023-09-01', '2024-06-30'),
(2, '2024-2025', '2024-09-01', '2025-06-30'),
(3, '2025-2026', '2025-09-01', '2026-06-30'),
(4, '2023-2024', '2023-09-01', '2024-06-30'),
(5, '2024-2025', '2024-09-01', '2025-06-30'),
(6, '2025-2026', '2025-09-01', '2026-06-30'),
(7, '2026-2027', '2026-09-01', '2027-06-30'),
(8, '2027-2028', '2027-09-01', '2028-06-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `id_contenido` int(11) NOT NULL,
  `descripcion_contenido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`id_contenido`, `descripcion_contenido`) VALUES
(1, 'Álgebra, geometría básica'),
(2, 'Estructura celular, ecosistemas'),
(3, 'Análisis de textos, redacción de ensayos'),
(4, 'Primera y Segunda Guerra Mundial, Guerra Fría'),
(5, 'Variables, bucles, funciones'),
(6, 'Álgebra, geometría básica'),
(7, 'Estructura celular, ecosistemas'),
(8, 'Análisis de textos, redacción de ensayos'),
(9, 'Primera y Segunda Guerra Mundial, Guerra Fría'),
(10, 'Variables, bucles, funciones'),
(15, 'Ejercicios de calentamiento, deportes en equipo'),
(16, 'Pintura, dibujo, escultura'),
(17, 'Teoría musical, práctica de instrumentos'),
(18, 'Gramática inglesa, conversación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nombre_curso` varchar(255) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `id_profesor` int(11) DEFAULT NULL,
  `id_ciclo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre_curso`, `id_materia`, `id_profesor`, `id_ciclo`) VALUES
(1, 'Matemáticas I', 1, 1, 1),
(2, 'Ciencias Naturales I', 2, 3, 1),
(3, 'Lenguaje I', 3, 2, 1),
(4, 'Historia I', 4, 2, 1),
(5, 'Programación I', 5, 4, 1),
(6, 'Matemáticas I', 1, 1, 1),
(7, 'Ciencias Naturales I', 2, 3, 1),
(8, 'Lenguaje I', 3, 2, 1),
(9, 'Historia I', 4, 2, 1),
(10, 'Programación I', 5, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `titulo_especialidad` varchar(255) DEFAULT NULL,
  `nombre_especialidad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `titulo_especialidad`, `nombre_especialidad`) VALUES
(1, 'Ciencias Exactas', 'Matemáticas'),
(2, 'Ciencias Naturales', 'Biología'),
(3, 'Humanidades', 'Lenguaje'),
(4, 'Ciencias Sociales', 'Historia'),
(5, 'Tecnología', 'Programación'),
(6, 'Ciencias Exactas', 'Matemáticas'),
(7, 'Ciencias Naturales', 'Biología'),
(8, 'Humanidades', 'Lenguaje'),
(9, 'Ciencias Sociales', 'Historia'),
(10, 'Tecnología', 'Programación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `nombre_materia`) VALUES
(1, 'Matemáticas'),
(2, 'Ciencias Naturales'),
(3, 'Lenguaje'),
(4, 'Historia'),
(5, 'Programación'),
(6, 'Matemáticas'),
(7, 'Ciencias Naturales'),
(8, 'Lenguaje'),
(9, 'Historia'),
(10, 'Programación'),
(11, 'Educación Física'),
(12, 'Arte'),
(13, 'Música'),
(14, 'Inglés');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id_matricula` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Curso` text NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_ciclo` int(11) DEFAULT NULL,
  `id_aula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`id_matricula`, `Fecha`, `Curso`, `id_alumno`, `id_ciclo`, `id_aula`) VALUES
(1, '2023-09-01', 'Matemáticas I', 1, 1, 1),
(2, '2023-09-01', 'Ciencias Naturales I', 2, 1, 2),
(3, '2023-09-01', 'Lenguaje I', 3, 1, 3),
(4, '2023-09-01', 'Historia I', 4, 1, 4),
(5, '2023-09-02', 'Programación I', 5, 1, 5),
(6, '2023-09-02', 'Educación Física I', 6, 1, 6),
(7, '2023-09-02', 'Arte I', 7, 1, 7),
(8, '2023-09-02', 'Música I', 8, 1, 8),
(9, '2024-09-01', 'Matemáticas II', 9, 2, 1),
(10, '2024-09-01', 'Ciencias Naturales II', 10, 2, 2),
(11, '2024-09-01', 'Lenguaje II', 11, 2, 3),
(12, '2024-09-01', 'Historia II', 12, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `nota` decimal(5,2) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_matricula` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `id_profesor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`id_nota`, `nota`, `descripcion`, `id_curso`, `id_alumno`, `id_matricula`, `id_materia`, `id_profesor`) VALUES
(1, 8.50, 'Buen desempeño', 1, 1, 1, 1, 1),
(2, 7.00, 'Aprobado', 2, 2, 2, 2, 3),
(3, 9.00, 'Excelente trabajo', 3, 3, 3, 3, 2),
(4, 6.50, 'Necesita mejorar', 4, 4, 4, 4, 2),
(5, 9.50, 'Destacado', 5, 5, 5, 5, 4),
(6, 8.50, 'Buen desempeño', 1, 1, 1, 1, 1),
(7, 7.00, 'Aprobado', 2, 2, 2, 2, 3),
(8, 9.00, 'Excelente trabajo', 3, 3, 3, 3, 2),
(9, 6.50, 'Necesita mejorar', 4, 4, 4, 4, 2),
(10, 9.50, 'Destacado', 5, 5, 5, 5, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivos`
--

CREATE TABLE `objetivos` (
  `id_objetivo` int(11) NOT NULL,
  `descripcion_objetivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `objetivos`
--

INSERT INTO `objetivos` (`id_objetivo`, `descripcion_objetivo`) VALUES
(1, 'Desarrollar habilidades matemáticas básicas'),
(2, 'Comprender los principios de la biología'),
(3, 'Mejorar la comprensión lectora y la escritura'),
(4, 'Conocer la historia del siglo XX'),
(5, 'Introducción a la programación en Python'),
(6, 'Desarrollar habilidades matemáticas básicas'),
(7, 'Comprender los principios de la biología'),
(8, 'Mejorar la comprensión lectora y la escritura'),
(9, 'Conocer la historia del siglo XX'),
(10, 'Introducción a la programación en Python'),
(13, 'mi contenid'),
(14, 'mi contenid'),
(15, 'mi contenid'),
(16, 'Fomentar la actividad física y la salud'),
(17, 'Desarrollar la creatividad y la expresión artística'),
(18, 'Aprender a tocar instrumentos musicales y apreciar la música'),
(19, 'Mejorar las habilidades de comunicación en inglés');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion_anual`
--

CREATE TABLE `planificacion_anual` (
  `id_planificacion_anual` int(11) NOT NULL,
  `id_ciclo` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `id_profesor` int(11) DEFAULT NULL,
  `id_objetivo` int(11) DEFAULT NULL,
  `id_contenido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `planificacion_anual`
--

INSERT INTO `planificacion_anual` (`id_planificacion_anual`, `id_ciclo`, `id_materia`, `id_profesor`, `id_objetivo`, `id_contenido`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 1, 2, 3, 2, 2),
(3, 1, 3, 2, 3, 3),
(4, 1, 4, 2, 4, 4),
(5, 1, 5, 4, 5, 5),
(6, 1, 1, 1, 6, 6),
(7, 1, 2, 3, 7, 7),
(8, 1, 3, 2, 8, 8),
(9, 1, 4, 2, NULL, NULL),
(10, 1, 5, 4, NULL, NULL),
(11, 2, 6, 6, 6, 6),
(12, 3, 7, 7, 7, 7),
(13, 4, 8, 8, 8, 8),
(14, 5, 9, 9, 9, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion_diaria`
--

CREATE TABLE `planificacion_diaria` (
  `id_planificacion_diaria` int(11) NOT NULL,
  `id_planificacion_semanal` int(11) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `actividad` text DEFAULT NULL,
  `recursos` text DEFAULT NULL,
  `estrategias` text DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `planificacion_diaria`
--

INSERT INTO `planificacion_diaria` (`id_planificacion_diaria`, `id_planificacion_semanal`, `hora`, `actividad`, `recursos`, `estrategias`, `observaciones`) VALUES
(1, 1, '08:00:00', 'Repaso de ecuaciones lineales', 'Pizarra, ejercicios', 'Resolución de problemas en grupo', 'Repaso de conceptos básicos'),
(2, 1, '09:00:00', 'Ejercicios prácticos', 'Ejercicios', 'Trabajo individual', 'Resolver ejercicios del libro'),
(3, 2, '10:00:00', 'Introducción a la geometría', 'Reglas, compás, dibujos', 'Explicación teórica, ejercicios prácticos', 'Dibujar figuras geométricas'),
(4, 3, '09:00:00', 'Observación de células en microscopio', 'Microscopios, muestras', 'Trabajo en laboratorio, discusión', 'Dibujar las células observadas'),
(5, 4, '11:00:00', 'Análisis de poemas de Neruda', 'Textos, guías de análisis', 'Lectura en voz alta, debate', 'Identificar figuras retóricas'),
(6, 5, '12:00:00', 'Debate sobre la Primera Guerra Mundial', 'Documentos históricos, mapas', 'Presentaciones, debate en grupo', 'Preparar argumentos'),
(7, 6, '14:00:00', 'Introducción a variables en Python', 'Computadoras, software', 'Ejercicios prácticos, explicación teórica', 'Instalar Python y un editor de código'),
(8, 7, '14:00:00', 'Ejercicios con funciones print()', 'Computadoras, ejercicios', 'Trabajo individual, revisión en grupo', 'Escribir programas sencillos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion_semanal`
--

CREATE TABLE `planificacion_semanal` (
  `id_planificacion_semanal` int(11) NOT NULL,
  `id_planificacion_trimestral` int(11) DEFAULT NULL,
  `semana` date DEFAULT NULL,
  `dia_semana` enum('Lunes','Martes','Miércoles','Jueves','Viernes') DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `actividad` text DEFAULT NULL,
  `recursos` text DEFAULT NULL,
  `estrategias` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `planificacion_semanal`
--

INSERT INTO `planificacion_semanal` (`id_planificacion_semanal`, `id_planificacion_trimestral`, `semana`, `dia_semana`, `hora`, `actividad`, `recursos`, `estrategias`) VALUES
(1, 1, '2023-10-02', 'Lunes', '08:00:00', 'Repaso de ecuaciones lineales', 'Pizarra, ejercicios', 'Resolución de problemas en grupo'),
(2, 1, '2023-10-04', 'Miércoles', '10:00:00', 'Introducción a la geometría', 'Reglas, compás, dibujos', 'Explicación teórica, ejercicios prácticos'),
(3, 2, '2023-10-03', 'Martes', '09:00:00', 'Observación de células en microscopio', 'Microscopios, muestras', 'Trabajo en laboratorio, discusión'),
(4, 3, '2023-10-05', 'Jueves', '11:00:00', 'Análisis de poemas de Neruda', 'Textos, guías de análisis', 'Lectura en voz alta, debate'),
(5, 4, '2023-10-06', 'Viernes', '12:00:00', 'Debate sobre la Primera Guerra Mundial', 'Documentos históricos, mapas', 'Presentaciones, debate en grupo'),
(6, 5, '2023-10-02', 'Lunes', '14:00:00', 'Introducción a variables en Python', 'Computadoras, software', 'Ejercicios prácticos, explicación teórica'),
(7, 5, '2023-10-03', 'Martes', '14:00:00', 'Ejercicios con funciones print()', 'Computadoras, ejercicios', 'Trabajo individual, revisión en grupo'),
(8, 1, '2023-10-02', 'Lunes', '08:00:00', 'Repaso de ecuaciones lineales', 'Pizarra, ejercicios', 'Resolución de problemas en grupo'),
(9, 1, '2023-10-04', 'Miércoles', '10:00:00', 'Introducción a la geometría', 'Reglas, compás, dibujos', 'Explicación teórica, ejercicios prácticos'),
(10, 2, '2023-10-03', 'Martes', '09:00:00', 'Observación de células en microscopio', 'Microscopios, muestras', 'Trabajo en laboratorio, discusión'),
(11, 3, '2023-10-05', 'Jueves', '11:00:00', 'Análisis de poemas de Neruda', 'Textos, guías de análisis', 'Lectura en voz alta, debate'),
(12, 4, '2023-10-06', 'Viernes', '12:00:00', 'Debate sobre la Primera Guerra Mundial', 'Documentos históricos, mapas', 'Presentaciones, debate en grupo'),
(13, 5, '2023-10-02', 'Lunes', '14:00:00', 'Introducción a variables en Python', 'Computadoras, software', 'Ejercicios prácticos, explicación teórica'),
(14, 5, '2023-10-03', 'Martes', '14:00:00', 'Ejercicios con funciones print()', 'Computadoras, ejercicios', 'Trabajo individual, revisión en grupo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planificacion_trimestral`
--

CREATE TABLE `planificacion_trimestral` (
  `id_planificacion_trimestral` int(11) NOT NULL,
  `id_planificacion_anual` int(11) DEFAULT NULL,
  `trimestre` int(11) DEFAULT NULL,
  `objetivos_especificos` text DEFAULT NULL,
  `contenidos_especificos` text DEFAULT NULL,
  `actividades_principales` text DEFAULT NULL,
  `evaluaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `planificacion_trimestral`
--

INSERT INTO `planificacion_trimestral` (`id_planificacion_trimestral`, `id_planificacion_anual`, `trimestre`, `objetivos_especificos`, `contenidos_especificos`, `actividades_principales`, `evaluaciones`) VALUES
(1, 1, 1, 'Resolver ecuaciones lineales', 'Ecuaciones de primer grado', 'Ejercicios prácticos, resolución de problemas', 'Examen escrito, ejercicios'),
(2, 2, 1, 'Identificar las partes de la célula', 'Núcleo, citoplasma, mitocondrias', 'Observación en microscopio, dibujos', 'Prueba de laboratorio, cuestionario'),
(3, 3, 1, 'Analizar textos literarios', 'Cuentos, poemas', 'Lectura en clase, debates', 'Análisis de texto, participación'),
(4, 4, 1, 'Identificar las causas de la Primera Guerra Mundial', 'Nacionalismo, imperialismo, alianzas', 'Lectura de documentos históricos, debates', 'Examen escrito, presentación'),
(5, 5, 1, 'Escribir un programa que imprima \"Hola Mundo\"', 'Variables, función print()', 'Ejercicios prácticos, proyectos', 'Evaluación de proyectos, cuestionario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `asignaturas` varchar(255) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `id_especialidad` int(11) DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `nombre`, `apellidos`, `email`, `asignaturas`, `fecha_nacimiento`, `id_especialidad`, `sexo`, `telefono`, `celular`) VALUES
(1, 'Ana', 'García', 'ana.garcia@email.com', 'Matemáticas', '1980-05-20', 1, 'F', '123-456-7890', '987-654-3210'),
(2, 'Luis', 'Pérez', 'luis.perez@email.com', 'Ciencias Naturales', '1975-04-10', 2, 'M', '111-222-3333', '444-555-6666'),
(3, 'María', 'López', 'maria.lopez@email.com', 'Lenguaje', '1985-11-12', 3, 'F', '999-888-7777', '666-777-8888'),
(4, 'Carlos', 'Rodríguez', 'carlos.rodriguez@email.com', 'Historia', '1990-06-02', 4, 'M', '555-444-3333', '222-111-0000'),
(5, 'Sofía', 'Martínez', 'sofia.martinez@email.com', 'Programación', '1978-09-28', 5, 'F', '777-888-9999', '333-222-1111'),
(6, 'Pedro', 'Sánchez', 'pedro.sanchez@email.com', 'Física', '1982-12-15', 1, 'M', '444-555-6666', '111-222-3333'),
(7, 'Laura', 'Gómez', 'laura.gomez@email.com', 'Química', '1987-03-08', 2, 'F', '666-777-8888', '999-888-7777'),
(8, 'Javier', 'Díaz', 'javier.diaz@email.com', 'Biología', '1992-07-22', 3, 'M', '222-111-0000', '555-444-3333'),
(9, 'Elena', 'Fernández', 'elena.fernandez@email.com', 'Educación Física', '1988-07-15', 1, 'F', '123-987-6540', '987-123-4560'),
(10, 'Roberto', 'Jiménez', 'roberto.jimenez@email.com', 'Arte', '1979-11-22', 2, 'M', '111-333-5555', '555-333-1111'),
(11, 'Carmen', 'Ruiz', 'carmen.ruiz@email.com', 'Música', '1983-04-03', 3, 'F', '999-111-2222', '222-111-9999'),
(12, 'Diego', 'Torres', 'diego.torres@email.com', 'Inglés', '1991-09-18', 4, 'M', '444-666-8888', '888-666-4444');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE `recurso` (
  `id_recurso` int(11) NOT NULL,
  `nombre_recurso` varchar(255) DEFAULT NULL,
  `tipo_recurso` varchar(255) DEFAULT NULL,
  `ubicacion_recurso` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `recurso`
--

INSERT INTO `recurso` (`id_recurso`, `nombre_recurso`, `tipo_recurso`, `ubicacion_recurso`) VALUES
(1, 'Libro de texto de Matemáticas', 'Libro', 'Biblioteca'),
(2, 'Laboratorio de Ciencias', 'Laboratorio', 'Edificio A'),
(3, 'Proyector', 'Equipo', 'Aula 101'),
(4, 'Mapas Históricos', 'Material Didáctico', 'Aula 202'),
(5, 'Computadoras', 'Equipo', 'Laboratorio de Computación'),
(6, 'Libro de texto de Matemáticas', 'Libro', 'Biblioteca'),
(7, 'Laboratorio de Ciencias', 'Laboratorio', 'Edificio A'),
(8, 'Proyector', 'Equipo', 'Aula 101'),
(9, 'Mapas Históricos', 'Material Didáctico', 'Aula 202'),
(10, 'Computadoras', 'Equipo', 'Laboratorio de Computación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante`
--

CREATE TABLE `representante` (
  `id_representante` int(11) NOT NULL,
  `nombre_representante` varchar(255) DEFAULT NULL,
  `apellido_representante` varchar(255) DEFAULT NULL,
  `telefono_representante` varchar(20) DEFAULT NULL,
  `celular_representante` varchar(20) DEFAULT NULL,
  `email_representante` varchar(255) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `representante`
--

INSERT INTO `representante` (`id_representante`, `nombre_representante`, `apellido_representante`, `telefono_representante`, `celular_representante`, `email_representante`, `id_alumno`) VALUES
(1, 'Ana', 'García', '123-456-7890', '987-654-3210', 'ana.garcia@email.com', 1),
(2, 'Luis', 'Pérez', '111-222-3333', '444-555-6666', 'luis.perez@email.com', 2),
(3, 'María', 'López', '999-888-7777', '666-777-8888', 'maria.lopez@email.com', 3),
(4, 'Carlos', 'Rodríguez', '555-444-3333', '222-111-0000', 'carlos.rodriguez@email.com', 4),
(5, 'Sofía', 'Martínez', '777-888-9999', '333-222-1111', 'sofia.martinez@email.com', 5),
(6, 'Pedro', 'Sánchez', '444-555-6666', '111-222-3333', 'pedro.sanchez@email.com', 6),
(7, 'Laura', 'Gómez', '666-777-8888', '999-888-7777', 'laura.gomez@email.com', 7),
(8, 'Javier', 'Díaz', '222-111-0000', '555-444-3333', 'javier.diaz@email.com', 8),
(9, 'Patricia', 'Corales', '123-456-7890', '987-654-3210', 'patricia.corales@email.com', 9),
(10, 'Jorge', 'Martinez', '111-222-3333', '444-555-6666', 'jorge.martinez@email.com', 10),
(11, 'Laura', 'Jimenez', '999-888-7777', '666-777-8888', 'laura.jimenez@email.com', 11),
(12, 'Daniel', 'Rodriguez', '555-444-3333', '222-111-0000', 'daniel.rodriguez@email.com', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'user', 'user123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_alumnos_representante` (`id_representante`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id_aula`);

--
-- Indices de la tabla `calendario_escolar`
--
ALTER TABLE `calendario_escolar`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `ciclo_escolar`
--
ALTER TABLE `ciclo_escolar`
  ADD PRIMARY KEY (`id_ciclo`);

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`id_contenido`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id_matricula`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indices de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  ADD PRIMARY KEY (`id_objetivo`);

--
-- Indices de la tabla `planificacion_anual`
--
ALTER TABLE `planificacion_anual`
  ADD PRIMARY KEY (`id_planificacion_anual`),
  ADD KEY `fk_planificacion_anual_objetivo` (`id_objetivo`),
  ADD KEY `fk_planificacion_anual_contenido` (`id_contenido`);

--
-- Indices de la tabla `planificacion_diaria`
--
ALTER TABLE `planificacion_diaria`
  ADD PRIMARY KEY (`id_planificacion_diaria`);

--
-- Indices de la tabla `planificacion_semanal`
--
ALTER TABLE `planificacion_semanal`
  ADD PRIMARY KEY (`id_planificacion_semanal`);

--
-- Indices de la tabla `planificacion_trimestral`
--
ALTER TABLE `planificacion_trimestral`
  ADD PRIMARY KEY (`id_planificacion_trimestral`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recurso`
--
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`id_recurso`);

--
-- Indices de la tabla `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`id_representante`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `calendario_escolar`
--
ALTER TABLE `calendario_escolar`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ciclo_escolar`
--
ALTER TABLE `ciclo_escolar`
  MODIFY `id_ciclo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `id_contenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  MODIFY `id_objetivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `planificacion_anual`
--
ALTER TABLE `planificacion_anual`
  MODIFY `id_planificacion_anual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `planificacion_diaria`
--
ALTER TABLE `planificacion_diaria`
  MODIFY `id_planificacion_diaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `planificacion_semanal`
--
ALTER TABLE `planificacion_semanal`
  MODIFY `id_planificacion_semanal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `planificacion_trimestral`
--
ALTER TABLE `planificacion_trimestral`
  MODIFY `id_planificacion_trimestral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `recurso`
--
ALTER TABLE `recurso`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `representante`
--
ALTER TABLE `representante`
  MODIFY `id_representante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `fk_alumnos_representante` FOREIGN KEY (`id_representante`) REFERENCES `representante` (`id_representante`);

--
-- Filtros para la tabla `planificacion_anual`
--
ALTER TABLE `planificacion_anual`
  ADD CONSTRAINT `fk_planificacion_anual_contenido` FOREIGN KEY (`id_contenido`) REFERENCES `contenidos` (`id_contenido`),
  ADD CONSTRAINT `fk_planificacion_anual_objetivo` FOREIGN KEY (`id_objetivo`) REFERENCES `objetivos` (`id_objetivo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
