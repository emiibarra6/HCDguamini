-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2021 a las 21:05:31
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `guamini`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gm_administradores`
--

CREATE TABLE `gm_administradores` (
  `id_administrador` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `clave` text NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gm_administradores`
--

INSERT INTO `gm_administradores` (`id_administrador`, `nombre`, `apellido`, `email`, `clave`, `fecha_registro`) VALUES
(1, 'Lucas', 'Marini', 'admin@admin.com', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', '2021-08-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gm_archivos_documento`
--

CREATE TABLE `gm_archivos_documento` (
  `id_archivo_documento` int(11) NOT NULL,
  `id_documento` int(11) NOT NULL,
  `archivo` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gm_archivos_documento`
--

INSERT INTO `gm_archivos_documento` (`id_archivo_documento`, `id_documento`, `archivo`) VALUES
(11, 7, 'Uneditable_text_ES_EN_(1)_(1)611.docx'),
(12, 8, 'Marini_Lucas_(3)_(1).pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gm_bloque_politico`
--

CREATE TABLE `gm_bloque_politico` (
  `id_bloque_politico` int(11) NOT NULL,
  `nombre_bloque` varchar(150) NOT NULL,
  `color_representativo` text NOT NULL,
  `slug_bloque` text NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gm_bloque_politico`
--

INSERT INTO `gm_bloque_politico` (`id_bloque_politico`, `nombre_bloque`, `color_representativo`, `slug_bloque`, `fecha_registro`) VALUES
(12, 'Unidadad Ciudadana/Frente de todos', '3CCFFF', 'unidadad-ciudadanafrente-de-todos', '2021-09-22'),
(14, 'Juntos por el Cambio/Cambiemos', 'FFF700', 'juntos-por-el-cambiocambiemos', '2021-09-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gm_cargos`
--

CREATE TABLE `gm_cargos` (
  `id_cargo` int(11) NOT NULL,
  `cargo` varchar(150) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gm_cargos`
--

INSERT INTO `gm_cargos` (`id_cargo`, `cargo`, `fecha_registro`) VALUES
(7, 'Presidente', '2021-08-30'),
(8, 'Concejal', '2021-09-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gm_documentos`
--

CREATE TABLE `gm_documentos` (
  `id_documento` int(11) NOT NULL,
  `id_tipo_documento` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_documento` date DEFAULT NULL,
  `numero_documento` text NOT NULL,
  `slug_documento` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gm_documentos`
--

INSERT INTO `gm_documentos` (`id_documento`, `id_tipo_documento`, `titulo`, `descripcion`, `fecha_registro`, `fecha_documento`, `numero_documento`, `slug_documento`) VALUES
(7, 2, 'Documento 01', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-08-30', '2022-04-20', '4242', 'documento-01'),
(8, 2, 'Documento 02', 'Otro documento test', '2021-09-16', '2021-04-20', '2341', 'documento-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gm_personas`
--

CREATE TABLE `gm_personas` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `foto` text DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  `periodo_desde` date DEFAULT NULL,
  `periodo_hasta` date DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `localidad` varchar(100) NOT NULL,
  `id_bloque_politico` int(11) DEFAULT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gm_personas`
--

INSERT INTO `gm_personas` (`id_persona`, `nombre`, `apellido`, `foto`, `fecha_registro`, `periodo_desde`, `periodo_hasta`, `celular`, `email`, `localidad`, `id_bloque_politico`, `id_cargo`) VALUES
(9, 'Elisa', 'Salar de ochoa', '1632321080-96084756_2880250255356435_6343550165139324928_n.jpg', '2021-09-22', '2017-12-11', '2021-12-11', '02923-460401', 'ochoa_casbas@yahoo.es', 'Casbas', 14, 7),
(10, 'Rufino Ramon', 'Ruiz', '1632318717-descarga.png', '2021-09-22', '2017-12-11', '2021-12-11', '02923-444068', 'rufinoruiz77@hotmail.com', 'Guaminí', 14, 8),
(11, 'Raquel', 'Gonzalez', '1632318815-descarga.png', '2021-09-22', '2017-12-11', '2021-12-11', '02929-410855', 'raquelmariag@hotmail.com', 'Laguna Alsina', 14, 8),
(12, 'Norma', 'Romero', '1632319097-descarga.png', '2021-09-22', '2017-12-11', '2021-12-11', '02923-432734', 'romenor_@hotmail.com', 'Casbas', 12, 8),
(13, 'Gustavo', 'Palacio', '1632319184-descarga.png', '2021-09-22', '2017-12-11', '2021-12-11', '02923-518369', 'palaciogustavo6@gmail.com', 'Guaminí', 12, 8),
(14, 'Leonella', 'Gadea', '1632319249-descarga.png', '2021-09-22', '2017-12-11', '2021-12-11', '02923-543205', 'leonellagadea@gmail.com', 'Laguna Alsina', 12, 7),
(15, 'Laura', 'Rafael', '1632319444-descarga.png', '2021-09-22', '2019-12-11', '2023-12-11', '02923-580519', 'lauracasbas4@gmail.com', 'Casbas', 12, 8),
(16, 'Fabiana', 'Gregori', '1632319561-descarga.png', '2021-09-22', '2019-12-11', '2023-12-11', '02923-447129', 'gregori_mariafabiana@yahoo.com', 'Guaminí', 12, 8),
(17, 'Gonzalo', 'Cairo', '1632319650-descarga.png', '2021-09-22', '2019-12-11', '2023-12-11', '02929-404046', 'gonzalo.cairo@yahoo.com.ar', 'Laguna Alsina', 12, 8),
(18, 'Sergio', 'Cazzulo', '1632319722-descarga.png', '2021-09-22', '2019-12-11', '2023-12-11', '02923-693919', 'seleca_77@live.com.ar', 'Guaminí', 12, 8),
(19, 'Alejandra', 'Vicente', '1632319832-descarga.png', '2021-09-22', '2019-12-11', '2023-12-11', '02923-445645', 'rushivicente81@gmail.com', 'Casbas', 14, 8),
(20, 'Juan Cruz', 'Rodriguez', '1632320029-descarga.png', '2021-09-22', '2019-12-11', '2023-12-11', '0221-3168483', 'jucruro950@gmail.com', 'Guaminí', 14, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gm_tipos_documentos`
--

CREATE TABLE `gm_tipos_documentos` (
  `id_tipo_documento` int(11) NOT NULL,
  `tipo_documento` varchar(150) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gm_tipos_documentos`
--

INSERT INTO `gm_tipos_documentos` (`id_tipo_documento`, `tipo_documento`, `fecha_registro`) VALUES
(2, 'Ordenanzas', '2021-08-30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gm_administradores`
--
ALTER TABLE `gm_administradores`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `gm_archivos_documento`
--
ALTER TABLE `gm_archivos_documento`
  ADD PRIMARY KEY (`id_archivo_documento`);

--
-- Indices de la tabla `gm_bloque_politico`
--
ALTER TABLE `gm_bloque_politico`
  ADD PRIMARY KEY (`id_bloque_politico`);

--
-- Indices de la tabla `gm_cargos`
--
ALTER TABLE `gm_cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `gm_documentos`
--
ALTER TABLE `gm_documentos`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `gm_personas`
--
ALTER TABLE `gm_personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `gm_tipos_documentos`
--
ALTER TABLE `gm_tipos_documentos`
  ADD PRIMARY KEY (`id_tipo_documento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gm_administradores`
--
ALTER TABLE `gm_administradores`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `gm_archivos_documento`
--
ALTER TABLE `gm_archivos_documento`
  MODIFY `id_archivo_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `gm_bloque_politico`
--
ALTER TABLE `gm_bloque_politico`
  MODIFY `id_bloque_politico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `gm_cargos`
--
ALTER TABLE `gm_cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `gm_documentos`
--
ALTER TABLE `gm_documentos`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `gm_personas`
--
ALTER TABLE `gm_personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `gm_tipos_documentos`
--
ALTER TABLE `gm_tipos_documentos`
  MODIFY `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
