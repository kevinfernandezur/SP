-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2023 a las 10:19:29
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbparroquia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bautismo`
--

CREATE TABLE `tbl_bautismo` (
  `Id_bat` int(3) NOT NULL,
  `nombre_parroquia` varchar(250) NOT NULL,
  `localizacion_parroquia` varchar(250) NOT NULL,
  `nombre_sacerdote` varchar(50) NOT NULL,
  `fecha_bat` date NOT NULL,
  `lugarnac` varchar(70) NOT NULL,
  `nombre_com_baut` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nomnbre_com_padre` varchar(100) NOT NULL,
  `nombre_com_madre` varchar(100) NOT NULL,
  `resg_libro` varchar(50) NOT NULL,
  `nombre_com_padrino` varchar(100) NOT NULL,
  `nombre_com_madrina` varchar(100) NOT NULL,
  `notas_mar` varchar(300) NOT NULL,
  `fecha_expedida` date NOT NULL,
  `folio` int(11) NOT NULL,
  `acta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_iglesia`
--

CREATE TABLE `tbl_iglesia` (
  `Id_igl` int(11) NOT NULL,
  `nombre_iglesia` varchar(250) NOT NULL,
  `direccion_iglesia` varchar(250) NOT NULL,
  `correo_iglesia` varchar(250) NOT NULL,
  `diocesis_iglesia` varchar(250) NOT NULL,
  `imagen_iglesia` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_matrimonio`
--

CREATE TABLE `tbl_matrimonio` (
  `Id_mat` int(3) NOT NULL,
  `nombre_parroquia` varchar(100) NOT NULL,
  `localizacion_parroquia` varchar(100) NOT NULL,
  `nombre_reverendo` varchar(100) NOT NULL,
  `fecha_casamiento` date NOT NULL,
  `nombre_esposo` varchar(100) NOT NULL,
  `edad_esposo` varchar(4) NOT NULL,
  `cedula_esposo` varchar(15) NOT NULL,
  `nacionalidad_esposo` varchar(30) NOT NULL,
  `fecha_nac_esposo` date NOT NULL,
  `direccion_esposo` varchar(100) NOT NULL,
  `padre_esposo` varchar(100) NOT NULL,
  `madre_esposo` varchar(100) NOT NULL,
  `nombre_esposa` varchar(100) NOT NULL,
  `edad_esposa` varchar(4) NOT NULL,
  `cedula_esposa` varchar(15) NOT NULL,
  `nacionalidad_esposa` varchar(50) NOT NULL,
  `fecha_nac_esposa` date NOT NULL,
  `direccion_esposa` varchar(100) NOT NULL,
  `padre_esposa` varchar(100) NOT NULL,
  `madre_esposa` varchar(100) NOT NULL,
  `nombre_testigo1` varchar(100) NOT NULL,
  `cedula_testigo1` varchar(15) NOT NULL,
  `direccion_testigo1` varchar(100) NOT NULL,
  `padre_testigo1` varchar(100) NOT NULL,
  `madre_testigo1` varchar(100) NOT NULL,
  `nombre_testigo2` varchar(100) NOT NULL,
  `cedula_testigo2` varchar(15) NOT NULL,
  `direccion_testigo2` varchar(100) NOT NULL,
  `padre_testigo2` varchar(100) NOT NULL,
  `madre_testigo2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sacerdote`
--

CREATE TABLE `tbl_sacerdote` (
  `Id_sac` int(3) NOT NULL,
  `nombre_sac` varchar(100) NOT NULL,
  `apellido_sac` varchar(100) NOT NULL,
  `direccion_sac` varchar(100) NOT NULL,
  `fecha_nac_sac` date NOT NULL,
  `telefono_sac` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_bautismo`
--
ALTER TABLE `tbl_bautismo`
  ADD PRIMARY KEY (`Id_bat`);

--
-- Indices de la tabla `tbl_iglesia`
--
ALTER TABLE `tbl_iglesia`
  ADD PRIMARY KEY (`Id_igl`);

--
-- Indices de la tabla `tbl_matrimonio`
--
ALTER TABLE `tbl_matrimonio`
  ADD PRIMARY KEY (`Id_mat`);

--
-- Indices de la tabla `tbl_sacerdote`
--
ALTER TABLE `tbl_sacerdote`
  ADD PRIMARY KEY (`Id_sac`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_bautismo`
--
ALTER TABLE `tbl_bautismo`
  MODIFY `Id_bat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_iglesia`
--
ALTER TABLE `tbl_iglesia`
  MODIFY `Id_igl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tbl_matrimonio`
--
ALTER TABLE `tbl_matrimonio`
  MODIFY `Id_mat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
