-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2019 a las 14:54:16
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `infornet_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `abreviatura` varchar(255) DEFAULT NULL,
  `familia` int(11) NOT NULL,
  `marca` int(11) DEFAULT NULL,
  `condicion` int(11) DEFAULT NULL,
  `minimo` int(11) DEFAULT NULL,
  `maximo` int(11) DEFAULT NULL,
  `aviso` int(11) DEFAULT NULL,
  `baja` int(11) DEFAULT NULL,
  `tipo_iva` varchar(255) DEFAULT NULL,
  `retencion` int(11) DEFAULT NULL,
  `iva_inc` int(11) DEFAULT NULL,
  `cost_ult1` float DEFAULT NULL,
  `fecha_ult` varchar(255) DEFAULT NULL,
  `ult_fecha` varchar(255) DEFAULT NULL,
  `pm_com1` varchar(255) DEFAULT NULL,
  `imagen` int(11) DEFAULT NULL,
  `caracteristicas` varchar(255) DEFAULT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_baja` date NOT NULL,
  `ubicacion` int(11) DEFAULT NULL,
  `medidas` int(11) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `litros` int(11) DEFAULT NULL,
  `observacion` int(11) DEFAULT NULL,
  `unicaja` int(11) DEFAULT NULL,
  `desglose` int(11) DEFAULT NULL,
  `aranceles` int(11) DEFAULT NULL,
  `definicion2` int(11) DEFAULT NULL,
  `subfamilia` int(11) DEFAULT NULL,
  `internet` int(11) DEFAULT NULL,
  `vista` int(11) DEFAULT NULL,
  `f_pag` int(11) DEFAULT NULL,
  `p_verde` int(11) DEFAULT NULL,
  `p_importe` int(11) DEFAULT NULL,
  `p_tan` int(11) DEFAULT NULL,
  `l_color` int(11) DEFAULT NULL,
  `margen` int(11) DEFAULT NULL,
  `tcp` int(11) DEFAULT NULL,
  `ven_serie` int(11) DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL,
  `des_esc` int(11) DEFAULT NULL,
  `tipo_art` int(11) DEFAULT NULL,
  `modelo` int(11) DEFAULT NULL,
  `cocina` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `art_impuesto` int(11) DEFAULT NULL,
  `nombre2` varchar(255) DEFAULT NULL,
  `color_art` varchar(255) DEFAULT NULL,
  `tipo_pvp` int(11) DEFAULT NULL,
  `cost_escan` int(11) DEFAULT NULL,
  `tipo_escan` int(11) DEFAULT NULL,
  `art_canon` int(11) DEFAULT NULL,
  `actua_colo` int(11) DEFAULT NULL,
  `fact_arepe` int(11) DEFAULT NULL,
  `garantia` int(11) DEFAULT '365',
  `alquiler` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `c_ent` int(11) DEFAULT NULL,
  `cn8` int(11) DEFAULT NULL,
  `iva_lot` int(11) DEFAULT NULL,
  `artant` int(11) DEFAULT NULL,
  `reportetiq` int(11) DEFAULT NULL,
  `guid` int(11) DEFAULT NULL,
  `importar` int(11) DEFAULT NULL,
  `dto1` int(11) DEFAULT NULL,
  `dto2` int(11) DEFAULT NULL,
  `dto3` int(11) DEFAULT NULL,
  `isp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `codigo`, `nombre`, `abreviatura`, `familia`, `marca`, `condicion`, `minimo`, `maximo`, `aviso`, `baja`, `tipo_iva`, `retencion`, `iva_inc`, `cost_ult1`, `fecha_ult`, `ult_fecha`, `pm_com1`, `imagen`, `caracteristicas`, `fecha_alta`, `fecha_baja`, `ubicacion`, `medidas`, `peso`, `litros`, `observacion`, `unicaja`, `desglose`, `aranceles`, `definicion2`, `subfamilia`, `internet`, `vista`, `f_pag`, `p_verde`, `p_importe`, `p_tan`, `l_color`, `margen`, `tcp`, `ven_serie`, `puntos`, `des_esc`, `tipo_art`, `modelo`, `cocina`, `stock`, `art_impuesto`, `nombre2`, `color_art`, `tipo_pvp`, `cost_escan`, `tipo_escan`, `art_canon`, `actua_colo`, `fact_arepe`, `garantia`, `alquiler`, `orden`, `c_ent`, `cn8`, `iva_lot`, `artant`, `reportetiq`, `guid`, `importar`, `dto1`, `dto2`, `dto3`, `isp`) VALUES
(1, 1013410001, 'ANKER PowerLine II Lightning 3 ft', NULL, 101, 341, 2, NULL, NULL, NULL, 0, 'A2', NULL, 0, 0, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '0', 1013410001, 'badbsbsgsggsg', '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(2, 1013410002, 'ANKER PowerLine Mirco Usb 3ft Black', NULL, 101, 341, 1, 0, 0, 0, 0, 'A2', NULL, 0, 4.7593, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '4.7593', 1013410002, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(3, 1013410003, 'ANKER Powerline USB a USB-A 3.0 Rojo con funda', NULL, 101, 655, 1, 0, 0, 0, 0, 'A2', NULL, 0, 0, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '0', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(4, 1013410004, 'ANKER PowerLine + USB-C to USB-C 2.0 3ft', NULL, 101, 341, 3, 0, 0, 0, 0, 'A2', NULL, 0, 9.9206, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '9.9206', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(5, 1013410005, 'ANKER PowerLine lighthing 0,9m Blanco', NULL, 101, 340, 3, 0, 0, 0, 0, 'A2', NULL, 0, 9.071, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '9.071', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(6, 1013410006, 'ANKER PowerCore 10000', NULL, 101, 624, 1, 0, 0, 0, 0, 'A2', NULL, 0, 0, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '0', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(7, 1013410007, 'ANKER PowerLine lighthing 1,8m Red', NULL, 101, 632, 2, 0, 0, 0, 0, 'A2', NULL, 0, 0, '2018-12-27 00:00:00', '1970-01-01 00:00:00', '9.774', NULL, NULL, '1970-01-01', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(8, 1013410008, 'ANKER 24W 2 Port Usb charger EU Black Cargador', NULL, 101, 621, 3, 0, 0, 0, 0, 'A2', NULL, 0, 0, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '0', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(9, 1013410009, 'ANKER PowerPort 5', NULL, 101, 140, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 0, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '0', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(10, 1013410010, 'ANKER SoundCore Mini  Noir with Offine Altavoz', NULL, 101, 341, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 17.6407, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '17.6407', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(11, 1013410011, 'ANKER PowerDrive Speed', NULL, 101, 140, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 0, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '0', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(12, 1013410012, 'ANKER PowerCore 20100 External Battery', NULL, 101, 589, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 0, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '0', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(13, 1013410013, 'ANKER SoundCore Bt Noir Offine Altavoz', NULL, 101, 341, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 25.3039, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '25.3039', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(14, 1013410014, 'ANKER PowerCore II 10000', NULL, 101, 102, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 15.4534, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '15.4534', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(15, 1013410015, 'ANKER SoundCore Mini 2 Altavoz', NULL, 101, 122, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 0, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '0', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(16, 1013410016, 'ANKER SoundBuds Lite Black Auricular', NULL, 101, 341, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 24.6005, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '24.6005', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(17, 1013410017, 'ANKER Alexia bulb lumos White & color', NULL, 101, 125, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 0, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '0', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(18, 1013410018, 'ANKER PowerPort Speed5 Hub', NULL, 101, 530, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 0, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '0', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(19, 1013410019, 'ANKER PowerCore II 20000', NULL, 101, 530, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 0, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '0', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(20, 1013410020, 'ANKER SoundCore Spirit Pro Altavoz', NULL, 101, 266, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 32.1826, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '32.1826', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(21, 1013410021, 'ANKER SoundBuds Life Silver with Offine Auricular', NULL, 101, 310, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 0, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '0', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(22, 1013410022, 'ANKER SoundCore 2 Haut Parleur Altavoz', NULL, 101, 613, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 0, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '0', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(23, 1013410023, 'ANKER PowerCore 13400 Nintendo Switch', NULL, 101, 127, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 42.7334, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '42.7334', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(24, 1013410024, 'ANKER SoundCore Flare Altavoz', NULL, 101, 125, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 45.1085, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '45.1085', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(25, 1013410025, 'ANKER PowerCore 20100 Nintendo Switch', NULL, 101, 220, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 50.489, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '50.489', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(26, 1013410026, 'ANKER PowerCore+ 20100', NULL, 101, 263, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 26.1768, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '26.1768', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(27, 1013410027, 'ANKER SoundCore Sport XL Black  Altavoz', NULL, 101, 337, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 0, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '0', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(28, 1013410028, 'ANKER SoundCore Boost  Altavoz', NULL, 101, 589, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 0, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '0', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(29, 1013410029, 'ANKER Liberty+ Black Auricular', NULL, 101, 594, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 77.59, '2019-01-14 00:00:00', '2019-01-11 00:00:00', '77.59', NULL, NULL, '2019-01-11', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(30, 1013410030, 'ANKER SoundCore Space NC Auricular', NULL, 101, 115, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 0, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '0', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(31, 1013410031, 'ANKER Nebula Capsule Proyector', NULL, 101, 672, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 270.194, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '270.1942', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(32, 1013410032, 'ANKER Nebula Mars2', NULL, 101, 341, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 372.113, '2018-12-27 00:00:00', '2018-12-27 00:00:00', '372.1132', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(33, 1013410033, 'ANKER PowerCore II 6700', NULL, 101, 341, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 16.1416, '2019-04-12 00:00:00', '2018-12-27 00:00:00', '16.1416', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(34, 1013410034, 'ANKER PowerCore 15600', NULL, 101, 341, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 20.9293, '1970-01-01 00:00:00', '2018-12-27 00:00:00', '20.9293', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(35, 1013410035, 'ANKER SoundBuds Sport NB10 Black-Green Auricular', NULL, 101, 341, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 22.8008, '1970-01-01 00:00:00', '2018-12-27 00:00:00', '22.8008', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(36, 1013410036, 'ANKER SoundBuds Sport NB10 Black Auricular', NULL, 101, 341, NULL, 0, 0, 0, 0, 'A2', NULL, 0, 22.8008, '1970-01-01 00:00:00', '2018-12-27 00:00:00', '22.8008', NULL, NULL, '2018-12-27', '2018-12-27', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, -1, NULL, 0, 0, 1, 0, 0, NULL, 0, 0, 0, 1, NULL, 0, 0, NULL, NULL, NULL, 1, 0, 0, 0, 0, 0, 365, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0),
(37, 123456789, 'DAVID', NULL, 101, 341, 2, NULL, NULL, NULL, NULL, 'A2', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2019-05-17', '2019-05-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 365, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `articulo_id` int(11) NOT NULL,
  `unidades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion_articulo`
--

CREATE TABLE `condicion_articulo` (
  `id` int(11) NOT NULL,
  `condicion` varchar(191) NOT NULL,
  `ruta_imagen` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `condicion_articulo`
--

INSERT INTO `condicion_articulo` (`id`, `condicion`, `ruta_imagen`) VALUES
(1, 'Oferta', '/storage/categoria.jpg'),
(2, 'Novedad', '/storage/categoria.jpg'),
(3, 'Outlet', '/storage/categoria.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deseos`
--

CREATE TABLE `deseos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `deseos`
--

INSERT INTO `deseos` (`id`, `id_usuario`, `id_articulo`) VALUES
(27, 1, 1),
(29, 1, 37),
(12, 4, 1),
(1, 4, 4),
(10, 4, 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `estado`) VALUES
(1, 'Sin pagar'),
(2, 'Pagado'),
(3, 'En proceso de envío'),
(4, 'Enviado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `id` int(11) NOT NULL,
  `codigo` int(255) NOT NULL,
  `familia` varchar(191) DEFAULT NULL,
  `ruta_imagen` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`id`, `codigo`, `familia`, `ruta_imagen`) VALUES
(1, 0, 'SIN FAMILIA', NULL),
(2, 101, 'ACC', '/storage/categoria.jpg'),
(3, 102, 'ALTAVOCES', NULL),
(4, 103, 'BACKUP', NULL),
(5, 104, 'CABLE', NULL),
(6, 105, 'CAMARA DIG.', NULL),
(7, 106, 'CARCASA', NULL),
(8, 107, 'CD-R', NULL),
(9, 108, 'CD-ROM', NULL),
(10, 109, 'CD-RW', NULL),
(11, 110, 'CINTA IMP.', NULL),
(12, 111, 'CONTROLADORA', NULL),
(13, 112, 'CONVERTIDOR', NULL),
(14, 113, 'CPU', NULL),
(15, 114, 'DISQUETES', NULL),
(16, 115, 'DISQUETERA', NULL),
(17, 119, 'DVD', NULL),
(18, 120, 'SCANNER', NULL),
(19, 121, 'FAX', NULL),
(20, 122, 'DISCO DURO', NULL),
(21, 123, 'HUB', NULL),
(22, 124, 'IMPRESORA', NULL),
(23, 125, 'MEMORIA', NULL),
(24, 126, 'MESA', NULL),
(25, 127, 'MICROFONO', NULL),
(26, 128, 'MODEM', NULL),
(27, 129, 'MONITOR', NULL),
(28, 130, 'PAPEL', NULL),
(29, 131, 'PLACA BASE', NULL),
(30, 132, 'PORTATIL', NULL),
(31, 133, 'RATON', NULL),
(32, 134, 'SERVIDOR', NULL),
(33, 135, 'SOFT', NULL),
(34, 136, 'SWITCH', NULL),
(35, 137, 'TABLETA DIGIT.', NULL),
(36, 138, 'TARJ.SONIDO', NULL),
(37, 139, 'TARJETA RED', NULL),
(38, 140, 'TECLADO', NULL),
(39, 141, 'TINTA', NULL),
(40, 142, 'TONER', NULL),
(41, 143, 'TPV', NULL),
(42, 144, 'UPS', NULL),
(43, 145, 'VENTILADOR', NULL),
(44, 146, 'VGA', NULL),
(45, 147, 'REGRABADORA', NULL),
(46, 148, 'CAPTURADORA', NULL),
(47, 149, 'MP3', NULL),
(48, 150, 'WEBCAM', NULL),
(49, 151, 'JOYSTICK', NULL),
(50, 152, 'VISOR', NULL),
(51, 153, 'SILLA', NULL),
(52, 154, 'MULTIFUNCION', NULL),
(53, 155, 'ARCHIVADOR', NULL),
(54, 156, 'UNIDAD ZIP', NULL),
(55, 157, 'CONECTOR', NULL),
(56, 158, 'ROUTER', NULL),
(57, 159, 'CINTA STREAMER', NULL),
(58, 160, 'JETDIRECT', NULL),
(59, 161, 'FUENTE ALIMENTACION', NULL),
(60, 200, 'PC', NULL),
(61, 225, 'ACC RED/ARMARIOS', NULL),
(62, 226, 'PENDRIVE', NULL),
(63, 227, 'TABLET', NULL),
(64, 228, 'VIGILANCIA', NULL),
(65, 229, 'CAPTURADOR DATOS', NULL),
(66, 230, 'PROYECTOR', NULL),
(67, 231, 'DVD-R', NULL),
(68, 232, 'PLASTIFICADORA', NULL),
(69, 233, 'COMBO (DVD+CDRW)', NULL),
(70, 234, 'WALKIE-TALKIE', NULL),
(71, 235, 'CAMARA IP', NULL),
(72, 236, 'COPIADORA DIGIT.', NULL),
(73, 237, 'ACC COPIADORA', NULL),
(74, 238, 'SOLTEK', NULL),
(75, 239, 'LINKSYS', NULL),
(76, 240, 'VIDEO V.', NULL),
(77, 250, 'PAP', NULL),
(78, 251, 'CENTRALITA IP', NULL),
(79, 260, 'PAPELERIA', NULL),
(80, 261, 'FILM', NULL),
(81, 263, 'TARJETA', NULL),
(82, 264, 'ANTENA', NULL),
(83, 265, 'TELEVISOR', NULL),
(84, 266, 'TELEFONO', NULL),
(85, 267, 'VOZ IP', NULL),
(86, 268, 'MANDO DISTANCIA', NULL),
(87, 269, 'CONTROL PERSONAL', NULL),
(88, 270, 'GPS', NULL),
(89, 271, 'VIDEOCAMARA DIG.', NULL),
(90, 300, 'SERVICIO', NULL),
(91, 301, 'IMPUESTO CANON CDS/DVDS', NULL),
(92, 302, 'REPUESTOS', NULL),
(93, 303, 'VIDEO CONSOLA', NULL),
(94, 304, 'COSTO COPIA', NULL),
(95, 305, 'LIBRO ELECTRONICO', NULL),
(96, 306, 'CARGADOR', NULL),
(97, 307, 'ALUMBRADO', NULL),
(98, 308, 'SUMINISTROS ELECTRICOS', NULL),
(99, 309, 'DESTRUCTORAS', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_envios`
--

CREATE TABLE `forma_envios` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_envio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coste` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo_envio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `forma_envios`
--

INSERT INTO `forma_envios` (`id`, `tipo_envio`, `descripcion`, `coste`, `tiempo_envio`) VALUES
(1, 'urgente', 'Envío urgente con código de seguimiento', '15', '2-4 días'),
(2, 'Ordinario', 'Envío ordinario por correos sin código de seguimiento', '5', '7-10 días');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pagos`
--

CREATE TABLE `forma_pagos` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_pago` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coste` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `forma_pagos`
--

INSERT INTO `forma_pagos` (`id`, `tipo_pago`, `descripcion`, `coste`) VALUES
(1, 'Contrarreembolso', NULL, '3.95'),
(2, 'Efectivo', NULL, 'Sin coste'),
(3, 'Tarjeta', NULL, 'Sin coste'),
(4, 'Paypal', NULL, '1.95');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo_articulo` int(11) NOT NULL,
  `ruta_imagen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta_imagen_thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta_imagen_large` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `codigo_articulo`, `ruta_imagen`, `ruta_imagen_thumbnail`, `ruta_imagen_large`) VALUES
(2, 1013410001, '/storage/1013410001_71CDrQQz0pL._SL1500_.jpg', '/storage/1013410001_thumbnail_71CDrQQz0pL._SL1500_.jpg', '/storage/1013410001_large_71CDrQQz0pL._SL1500_.jpg'),
(3, 1013410002, '/storage/1013410002_ankermicrousb.jpg', '/storage/1013410002_thumbnail_ankermicrousb.jpg', '/storage/1013410002_large_ankermicrousb.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuestos`
--

CREATE TABLE `impuestos` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_impuesto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_impuesto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `impuestos`
--

INSERT INTO `impuestos` (`id`, `tipo_impuesto`, `valor_impuesto`) VALUES
(1, 'IGIC', 0.07);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `marca` varchar(191) NOT NULL,
  `ruta_imagen` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `codigo`, `marca`, `ruta_imagen`) VALUES
(3, 0, 'SIN MARCA', NULL),
(4, 102, 'ACER', '/storage/102_marca_acer.jpg'),
(5, 115, 'ASUS', '/storage/115_asus_marca.jpg'),
(6, 122, 'BROTHER', NULL),
(7, 125, 'CREATIVE', NULL),
(8, 127, 'AURICULAR + MICROFONO', '/storage/categoria.jpg'),
(9, 129, 'EPSON', '/storage/categoria.jpg'),
(10, 131, 'FUJITSU', '/storage/categoria.jpg'),
(11, 136, 'H.P.', '/storage/categoria.jpg'),
(12, 139, 'INTEL', NULL),
(13, 140, 'IOMEGA', NULL),
(14, 146, 'LG', '/storage/categoria.jpg'),
(15, 147, 'LOGITECH', '/storage/147_marca_logitech.jpg'),
(16, 151, 'MCAFEE', '/storage/categoria.jpg'),
(17, 154, 'HONEYWELL', NULL),
(18, 155, 'MICROSOFT', '/storage/categoria.jpg'),
(19, 163, 'BQ', NULL),
(20, 164, 'NIKON', '/storage/categoria.jpg'),
(21, 165, 'OKI', NULL),
(22, 168, 'TRANSCEND', NULL),
(23, 170, 'PHILIPS', '/storage/categoria.jpg'),
(24, 182, 'SAMSUNG', '/storage/categoria.jpg'),
(25, 185, 'SEAGATE', '/storage/categoria.jpg'),
(26, 187, 'SONY', '/storage/categoria.jpg'),
(27, 188, 'SAGE', '/storage/categoria.jpg'),
(28, 189, 'STAR', NULL),
(29, 197, 'TOSHIBA', '/storage/categoria.jpg'),
(30, 201, 'WESTER DIGITAL', '/storage/categoria.jpg'),
(31, 210, 'PANDA', '/storage/categoria.jpg'),
(32, 214, 'UNI', NULL),
(33, 220, 'CANON', NULL),
(34, 225, 'ARMARIO', '/storage/categoria.jpg'),
(35, 227, 'VERBATIM', NULL),
(36, 257, 'PLANTRONIC', '/storage/categoria.jpg'),
(37, 262, 'MSI', '/storage/categoria.jpg'),
(38, 263, 'CONCEPTRONIC', NULL),
(39, 266, '3M', NULL),
(40, 310, 'ASROCK', NULL),
(41, 312, 'KYOCERA', '/storage/categoria.jpg'),
(42, 314, 'LEXAR', '/storage/categoria.jpg'),
(43, 334, 'OLYMPIA', NULL),
(44, 335, 'PNY', NULL),
(45, 336, 'FRESH \'N REBEL', NULL),
(46, 337, '4IPNET', NULL),
(47, 338, ' ', NULL),
(48, 339, 'SYNOLOGY', NULL),
(49, 340, 'XIAOMI', '/storage/categoria.jpg'),
(50, 341, 'ANKER', NULL),
(51, 342, 'HUAWEI', '/storage/categoria.jpg'),
(52, 400, 'ZKTeco', NULL),
(53, 401, 'ANVIZ', NULL),
(54, 402, 'HYSOON', NULL),
(55, 403, 'SECUREID', NULL),
(57, 502, 'TRUST', '/storage/categoria.jpg'),
(58, 509, 'NORTON', '/storage/categoria.jpg'),
(59, 521, 'GIGASET', NULL),
(60, 525, 'WACOM', '/storage/categoria.jpg'),
(61, 530, 'D-LINK', NULL),
(62, 532, 'KINGSTON', '/storage/categoria.jpg'),
(63, 536, 'TARGUS', '/storage/categoria.jpg'),
(64, 537, 'GIGABYTE', '/storage/categoria.jpg'),
(65, 551, 'LITEON', NULL),
(66, 562, 'LENOVO', '/storage/categoria.jpg'),
(67, 563, 'INTEGRATECH', NULL),
(68, 566, 'NGS', '/storage/categoria.jpg'),
(69, 567, 'TUCANO', NULL),
(70, 570, 'TECH-AIR', NULL),
(71, 575, 'KASPERSKY', '/storage/categoria.jpg'),
(72, 580, 'SANDISK', '/storage/categoria.jpg'),
(73, 583, 'EUROWIN', '/storage/categoria.jpg'),
(74, 584, 'RETEX', NULL),
(75, 588, 'ENERGY SYSTEM', '/storage/categoria.jpg'),
(76, 589, 'BDP', '/storage/categoria.jpg'),
(77, 594, 'DEVOLO', NULL),
(78, 604, 'STEY', NULL),
(79, 611, 'PORT DESIGNS', NULL),
(80, 612, 'SWEEX', NULL),
(81, 613, 'COMPATIBLE', '/storage/categoria.jpg'),
(82, 618, 'APPLE', '/storage/618_apple_marca.png'),
(83, 620, 'NOD32', NULL),
(84, 621, 'DIGITUS', NULL),
(85, 622, 'HERCULES', NULL),
(86, 623, 'MEDIA MAGIC', NULL),
(87, 624, 'APPROX', NULL),
(88, 627, 'PACKARD BELL', '/storage/categoria.jpg'),
(89, 630, 'UBIQUITI', NULL),
(90, 632, 'CROMAD', NULL),
(92, 634, 'TP-LINK', '/storage/categoria.jpg'),
(93, 636, 'UNYKA', NULL),
(94, 637, 'POSIFLEX', NULL),
(95, 638, 'TPVLINE', NULL),
(96, 639, 'TOOQ', NULL),
(97, 641, 'INTENSO', NULL),
(98, 643, 'WOXTER', '/storage/categoria.jpg'),
(99, 646, 'PRIMUX', NULL),
(100, 647, 'INTEGRAL', NULL),
(101, 648, 'ONEWAY', NULL),
(102, 650, 'GENERICO', NULL),
(103, 651, 'EMTEC', NULL),
(104, 652, 'TECH1TECH', NULL),
(105, 653, 'EWENT', NULL),
(106, 654, 'WOLDER', '/storage/categoria.jpg'),
(107, 655, 'BIWOND', NULL),
(108, 656, 'KLONER', NULL),
(109, 657, 'EMINENT', NULL),
(110, 658, 'CENTRONIC', NULL),
(111, 659, 'PRODISK', NULL),
(112, 660, 'JBL', '/storage/categoria.jpg'),
(113, 661, 'HYUNDAI', '/storage/categoria.jpg'),
(114, 662, 'PROMETHEAN', NULL),
(115, 663, 'TOPAZ', NULL),
(116, 664, 'GENIUS', NULL),
(117, 665, 'ELECTRISOL', NULL),
(118, 670, 'SALICRU', NULL),
(119, 671, 'SF', NULL),
(120, 672, 'COOLSOUND', '/storage/categoria.jpg'),
(121, 673, 'HSM', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 2),
(4, '2016_01_01_000000_create_data_types_table', 2),
(5, '2016_05_19_173453_create_menu_table', 2),
(6, '2016_10_21_190000_create_roles_table', 2),
(7, '2016_10_21_190000_create_settings_table', 2),
(8, '2016_11_30_135954_create_permission_table', 2),
(9, '2016_11_30_141208_create_permission_role_table', 2),
(10, '2016_12_26_201236_data_types__add__server_side', 2),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 2),
(12, '2017_01_14_005015_create_translations_table', 2),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 2),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 2),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 2),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 2),
(17, '2017_08_05_000000_add_group_to_settings_table', 2),
(18, '2017_11_26_013050_add_user_role_relationship', 2),
(19, '2017_11_26_015000_create_user_roles_table', 2),
(20, '2018_03_11_000000_add_user_settings', 2),
(21, '2018_03_14_000000_add_details_to_data_types_table', 2),
(22, '2018_03_16_000000_make_settings_value_nullable', 2),
(23, '2016_01_01_000000_create_pages_table', 3),
(24, '2016_01_01_000000_create_posts_table', 3),
(25, '2016_02_15_204651_create_categories_table', 3),
(26, '2017_04_11_000000_alter_post_nullable_fields_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('pepe@gmail.com', '$2y$10$EJK5mX8YD02gXaufc94rNOzxWntUDuvmHxGnkhdIpc.ZwVqUetqUG', '2019-04-17 08:31:06'),
('admin@admin.com', '$2y$10$0SNbu50NLAPQXXnJDS8dTOGOLvmophXvJy7h7MXMjBGFz6cROJ9Tu', '2019-04-22 08:00:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_total` float NOT NULL,
  `cod_user` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `forma_pago` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forma_envio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_envio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `estado`, `precio_total`, `cod_user`, `deleted_at`, `created_at`, `updated_at`, `forma_pago`, `forma_envio`, `direccion_envio`) VALUES
(1, '2', 85.65, 2, NULL, '2019-04-25 04:00:00', '2019-04-25 07:00:00', '2', '2', 'Calle Triana 42'),
(2, '3', 541.96, 5, NULL, '2019-04-25 04:00:00', '2019-04-25 07:00:00', '1', '3', 'Calle Real 10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `stocks`
--

INSERT INTO `stocks` (`id`, `descripcion`) VALUES
(0, 'En Stock'),
(1, 'Sin Stock'),
(2, 'Próximamente'),
(3, 'Últimas Unidades');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subfamilias`
--

CREATE TABLE `subfamilias` (
  `id` int(11) NOT NULL,
  `subfamilia` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subfamilias`
--

INSERT INTO `subfamilias` (`id`, `subfamilia`) VALUES
(1, 'HDD'),
(2, 'SSD'),
(3, 'Gaming'),
(4, 'Oficina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', NULL, NULL, '$2y$10$KWSYFuXisMU5PiCxiDUNz.ZD0oOAzi4DA1vH0LZgusk4D/gjDwbPm', 'DUyBhZDCqMPrQPaafufNZolV8lmNdKUXY5IjGbczEGxOoVf3omUP3WbImA5f', '2019-03-26 12:00:53', '2019-03-26 12:08:35', NULL),
(3, 5, 'david', 'david@david.com', NULL, NULL, '$2y$10$fksqXmyNcPfVpeMBi5n64.DoBl3mkBdeH//wwlDq0.XQLYXS7sJdG', 'R9POi3gQCL123HhACVBPPpkvj4M24XB3ps8bdKbGJzoNhp97G8Jp3ndBy5Aa', '2019-04-17 08:33:05', '2019-04-17 08:33:05', NULL),
(4, NULL, 'pepe', 'pepe@pepe.pepe', NULL, NULL, '$2y$10$b17orlz0yYzbgH9ahWDHIu8zUboR9brErOUIljQ0wH8nxjQkiGixi', NULL, '2019-05-24 08:21:51', '2019-05-24 08:21:51', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_complete`
--

CREATE TABLE `user_complete` (
  `id` int(11) NOT NULL,
  `cod_user` int(11) DEFAULT NULL,
  `nif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poblacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domicilio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_postal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsletter` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_complete`
--

INSERT INTO `user_complete` (`id`, `cod_user`, `nif`, `telefono`, `poblacion`, `provincia`, `domicilio`, `cod_postal`, `newsletter`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '12345678A', '928808182', 'Tahiche', 'Las Palmas', 'Calle Rafael Alberti 40', '35507', 1, '2019-04-30 07:00:00', '2019-04-30 10:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2019-03-26 12:00:34', '2019-03-26 12:00:34'),
(2, 'usuario', 'Usuario Normal', '2019-03-26 12:00:34', '2019-03-26 12:00:34'),
(3, 'usuario_habitual', 'Usuario habitual', '2019-03-26 12:00:34', '2019-03-26 12:00:34'),
(4, 'usuario_vip', 'Usuario VIP', '2019-03-26 12:00:34', '2019-03-26 12:00:34'),
(5, 'cliente', 'Cliente', '2019-04-21 23:00:00', '2019-04-21 23:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `condicion` (`condicion`),
  ADD KEY `familia` (`familia`),
  ADD KEY `marca` (`marca`),
  ADD KEY `stock` (`stock`);

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_id` (`usuario_id`,`articulo_id`) USING BTREE,
  ADD KEY `articulo_id` (`articulo_id`) USING BTREE;

--
-- Indices de la tabla `condicion_articulo`
--
ALTER TABLE `condicion_articulo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `deseos`
--
ALTER TABLE `deseos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`,`id_articulo`) USING BTREE,
  ADD KEY `id_articulo` (`id_articulo`) USING BTREE;

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `forma_envios`
--
ALTER TABLE `forma_envios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `forma_pagos`
--
ALTER TABLE `forma_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo_articulo` (`codigo_articulo`);

--
-- Indices de la tabla `impuestos`
--
ALTER TABLE `impuestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subfamilias`
--
ALTER TABLE `subfamilias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `user_complete`
--
ALTER TABLE `user_complete`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `condicion_articulo`
--
ALTER TABLE `condicion_articulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `deseos`
--
ALTER TABLE `deseos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `forma_envios`
--
ALTER TABLE `forma_envios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `forma_pagos`
--
ALTER TABLE `forma_pagos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `impuestos`
--
ALTER TABLE `impuestos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `subfamilias`
--
ALTER TABLE `subfamilias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user_complete`
--
ALTER TABLE `user_complete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`condicion`) REFERENCES `condicion_articulo` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `articulos_ibfk_2` FOREIGN KEY (`marca`) REFERENCES `marcas` (`codigo`) ON DELETE NO ACTION,
  ADD CONSTRAINT `articulos_ibfk_3` FOREIGN KEY (`familia`) REFERENCES `familias` (`codigo`) ON DELETE NO ACTION,
  ADD CONSTRAINT `articulos_ibfk_4` FOREIGN KEY (`stock`) REFERENCES `stocks` (`id`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `carritos_ibfk_1` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`),
  ADD CONSTRAINT `carritos_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `deseos`
--
ALTER TABLE `deseos`
  ADD CONSTRAINT `deseos_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id`),
  ADD CONSTRAINT `deseos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`codigo_articulo`) REFERENCES `articulos` (`codigo`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
