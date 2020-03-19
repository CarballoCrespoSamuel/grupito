-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2020 a las 13:27:26
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
-- Base de datos: `grupito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `idDetallePedido` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`idDetallePedido`, `idPedido`, `idProducto`, `cantidad`, `precio`) VALUES
(1, 1, 2, 1, '29.99'),
(5, 45, 3, 4, '5.99'),
(6, 46, 1, 1, '69.99'),
(7, 48, 2, 1, '29.99'),
(8, 50, 2, 1, '29.99'),
(9, 53, 2, 1, '29.99'),
(19, 62, 3, 1, '5.99'),
(20, 63, 2, 1, '29.99'),
(21, 64, 3, 7, '5.99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `total` decimal(10,2) NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idUsuario`, `fecha`, `total`, `estado`) VALUES
(1, 1, '2020-03-16 11:09:53', '29.99', ''),
(45, 28, '2020-03-16 13:49:00', '23.96', ''),
(46, 28, '2020-03-16 13:52:55', '69.99', ''),
(47, 28, '2020-03-16 13:53:17', '0.00', ''),
(48, 28, '2020-03-16 13:53:41', '29.99', ''),
(49, 28, '2020-03-16 13:54:04', '0.00', ''),
(50, 28, '2020-03-16 13:54:18', '29.99', ''),
(51, 28, '2020-03-16 13:54:39', '0.00', ''),
(52, 28, '2020-03-16 13:54:39', '0.00', ''),
(53, 28, '2020-03-16 13:57:08', '29.99', ''),
(62, 1, '2020-03-17 14:16:35', '5.99', ''),
(63, 39, '2020-03-18 13:24:37', '29.99', ''),
(64, 42, '2020-03-18 13:25:59', '41.93', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `introDescripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `precioOferta` decimal(10,2) NOT NULL,
  `online` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombre`, `introDescripcion`, `descripcion`, `imagen`, `precio`, `precioOferta`, `online`) VALUES
(1, 'Spa para 2', 'Spa para 2 por la mitad de precio', 'Esta es una oferta para los más rápidos porque se agotará enseguida', 'spa.jpg', '150.25', '69.99', 1),
(2, 'Cuadros personalizados', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque faucibus blandit lacinia. Maecenas ipsum lorem, lobortis vitae fringilla vel, hendrerit ac magna.', 'cuadros.jpg', '20.99', '29.99', 1),
(3, 'Entradas para el cine ', 'Maecenas ipsum lorem, lobortis vitae fringilla vel, hendrerit ac magna.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque faucibus blandit lacinia. Maecenas ipsum lorem, lobortis vitae fringilla vel, hendrerit ac magna.', 'yelmo.jpg', '10.00', '5.99', 1),
(4, 'Cambio de neumáticos', 'Pellentesque faucibus blandit lacinia.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque faucibus blandit lacinia. Maecenas ipsum lorem, lobortis vitae fringilla vel, hendrerit ac magna.', 'taller.jpg', '200.00', '159.00', 1),
(11, 'Pack de Mascarillas', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in neque ultrices, placerat urna vitae, placerat est.', 'mascarillas.jpg', '49.99', '39.99', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `email`, `password`, `nombre`, `apellidos`, `direccion`, `telefono`) VALUES
(1, 'samuel@gmail.com', '', 'samuel', 'samuel', 'samuel 21', '661'),
(28, 'sonia@gmail.com', '$2y$10$3SyuNUYukUGI1rdEj3TAA.4y1nhN9XhY7pmETVFmDmKzgkDdEml..', 'sonia', 'sonia', 'sonia', '123'),
(36, 'prueba5@gmail.com', '$2y$10$Rx5aJLO/3LH7F3U9px3Cu.vrjRfUHINDpYc673VJRCzVPMHmZsqeq', '', '', '', ''),
(39, 'usuario@gmail.com', '$2y$10$Ql2wiA814Ej3//Gk3pdISupRw5wF57z5yTEcwVTvOyz8L2YssaQKa', 'usuario', 'us', 'calle', '1234'),
(40, 'prueba21212@gmail.com', '$2y$10$sM693O.J1ldxjqrzvFUYy.YYUQl0rJm9/dRVT.9g/ARlRFdYVLpzK', 'prueba', 'apellidos', 'calle 21', '12'),
(41, 'prueba22@gmail.com', '$2y$10$lsdq.of4NG7OlCn2HhKbZ..oV/hv1/5Yo.HGIdr3Q7F9M/SA9eW8y', 'A', 'a', 'a', 'a'),
(42, 'samuel9@gmail.com', '$2y$10$5HYFCWFT1838w4cR4xOQEOlWxJcIpzQS1UtZQeWRaLeAwUFEFPJLe', 'samuel', 'crespo carballo', 'calle 21', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`idDetallePedido`),
  ADD KEY `idPedido` (`idPedido`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `idDetallePedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`),
  ADD CONSTRAINT `detallepedido_ibfk_2` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`idPedido`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
