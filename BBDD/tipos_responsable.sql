-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2019 a las 22:01:27
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemas_3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_responsable`
--

CREATE TABLE `tipos_responsable` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tipos_responsable`
--

INSERT INTO `tipos_responsable` (`id`, `descripcion`) VALUES
(1, 'IVA Responsable Inscripto'),
(2, 'IVA Responsable no Inscripto'),
(3, 'IVA no Responsable'),
(4, 'IVA Sujeto Exento'),
(5, 'Consumidor Final'),
(6, 'Responsable Monotributo'),
(7, 'Sujeto no Categorizado'),
(8, 'Proveedor del Exterior'),
(9, 'Cliente del Exterior'),
(10, 'IVA Liberado – Ley Nº 19.640'),
(11, 'IVA Responsable Inscripto – Agente de Percepción'),
(12, 'Pequeño Contribuyente Eventual'),
(13, 'Monotributista Social'),
(14, 'Pequeño Contribuyente Eventual Social');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tipos_responsable`
--
ALTER TABLE `tipos_responsable`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
