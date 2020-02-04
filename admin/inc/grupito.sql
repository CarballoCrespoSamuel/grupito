-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2020 a las 18:28:15
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(10,0) NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `online` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombre`, `introDescripcion`, `descripcion`, `imagen`, `precio`, `precioOferta`, `online`) VALUES
(1, 'Restaurante de comida asiática', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nulla sem, pellentesque eget tincidunt faucibus, convallis at risus. Vestibulum a tristique arcu. Proin elementum sed lorem ut porta. Maecenas nec volutpat arcu. Donec dapibus in diam se', 'comida.jpg', '19.99', '14.95', 1),
(2, 'Cuadros personalizados', 'Donec consectetur leo lectus, eu facilisis lacus elementum eget.', 'Donec consectetur leo lectus, eu facilisis lacus elementum eget. Integer turpis enim, feugiat vitae felis at, blandit sagittis enim. Mauris ex diam, interdum quis scelerisque et, tempor in leo. Donec eget efficitur magna.', 'cuadros.jpg', '80.99', '56.95', 1),
(3, 'Patinaje sobre hielo para 2 personas', 'Donec consectetur leo lectus, eu facilisis lacus elementum eget.', 'Donec consectetur leo lectus, eu facilisis lacus elementum eget. Integer turpis enim, feugiat vitae felis at, blandit sagittis enim. Mauris ex diam, interdum quis scelerisque et, tempor in leo. Donec eget efficitur magna. Morbi a mollis purus. Intege', 'patinaje.jpg', '29.99', '19.99', 1),
(4, 'Cambio de aceite para tu coche', 'Donec consectetur leo lectus, eu facilisis lacus elementum eget.', 'Donec consectetur leo lectus, eu facilisis lacus elementum eget. Integer turpis enim, feugiat vitae felis at, blandit sagittis enim. Mauris ex diam, interdum quis scelerisque et, tempor in leo. Donec eget efficitur magna. Morbi a mollis purus. Intege', 'taller.jpg', '39.99', '35.95', 1),
(9, 'Vacunas para tu cachorro', 'Donec consectetur leo lectus, eu facilisis lacus elementum eget.', 'Donec consectetur leo lectus, eu facilisis lacus elementum eget. Integer turpis enim, feugiat vitae felis at, blandit sagittis enim. Mauris ex diam.', 'veterinario.jpg', '85.99', '70.99', 1),
(10, 'Entradas de cine Yelmo', 'Donec consectetur leo lectus, eu facilisis lacus elementum eget. ', 'Donec consectetur leo lectus, eu facilisis lacus elementum eget. Integer turpis enim, feugiat.', 'yelmo.jpg', '10.00', '5.99', 1);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idUsuario_2` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `idDetallePedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`idPedido`),
  ADD CONSTRAINT `detallepedido_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
