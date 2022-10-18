-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2022 a las 17:24:50
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `la_tribuna`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `id_anuncio` int(11) NOT NULL,
  `url_anuncio` varchar(300) NOT NULL,
  `id_posicion_anuncio` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `anunciante` varchar(300) NOT NULL,
  `baja_anuncio` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id_anuncio`, `url_anuncio`, `id_posicion_anuncio`, `fecha_alta`, `anunciante`, `baja_anuncio`) VALUES
(4, 'publi1.jpg', 1, '2022-10-17 18:43:03', 'JW', 0),
(5, 'publi1.jpg', 2, '2022-10-17 18:43:34', 'JW2', 0),
(6, 'publiHorizontal.gif', 3, '2022-10-17 18:43:54', 'Coto1', 0),
(7, 'publiHorizontal.gif', 4, '2022-10-17 18:44:10', 'Coto2', 0),
(8, 'istockphoto-978974332-2048x2048.jpg', 3, '2022-10-17 19:22:39', 'Prueba', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios_posiciones`
--

CREATE TABLE `anuncios_posiciones` (
  `id_posicion_anuncio` int(11) NOT NULL,
  `posicion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios_posiciones`
--

INSERT INTO `anuncios_posiciones` (`id_posicion_anuncio`, `posicion`) VALUES
(1, 'Lateral 1° posición'),
(2, 'Lateral 2° posición'),
(3, 'Horizontal 1° posición'),
(4, 'Horizontal 2° posición'),
(5, 'Horizontal 3° posición');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `categoria` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `categoria`) VALUES
(1, 'Política'),
(2, 'Economía'),
(3, 'Policiales'),
(4, 'Deportes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `idNoticia` int(11) NOT NULL,
  `tituloNoticia` varchar(300) NOT NULL,
  `introduccionNoticia` varchar(1000) NOT NULL,
  `contenidoNoticia` text NOT NULL,
  `imgPrincipal` varchar(250) NOT NULL,
  `noticiaDestacada` tinyint(4) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `fechaPublicacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `password` varchar(300) NOT NULL,
  `rol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `correo`, `password`, `rol`) VALUES
(1, 'emmanuel.pagano@gmail.com', '123456', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id_anuncio`),
  ADD KEY `fk_posicion` (`id_posicion_anuncio`) USING BTREE;

--
-- Indices de la tabla `anuncios_posiciones`
--
ALTER TABLE `anuncios_posiciones`
  ADD PRIMARY KEY (`id_posicion_anuncio`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idNoticia`),
  ADD KEY `FK_categoria` (`idCategoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `anuncios_posiciones`
--
ALTER TABLE `anuncios_posiciones`
  MODIFY `id_posicion_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `relacion_anuncio_posicion` FOREIGN KEY (`id_posicion_anuncio`) REFERENCES `anuncios_posiciones` (`id_posicion_anuncio`);

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `relacion_noticia_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
