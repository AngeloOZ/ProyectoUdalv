-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2020 a las 05:06:39
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdd_udalv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlace`
--

CREATE TABLE `enlace` (
  `id` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `icon` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `token_user` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `enlace`
--

INSERT INTO `enlace` (`id`, `name`, `icon`, `link`, `id_user`, `token_user`) VALUES
(6, 'ascacs', 'fab fa-github', 'http://localhost/udalv/inicio', 3, '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq'),
(7, 'ascacs', 'fab fa-github', 'http://localhost/udalv/inicio', 3, '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq'),
(8, 'a,smc am,s', 'fab fa-gitkraken', 'http://localhost/udalv/inicio', 3, '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq'),
(9, 'ascasc', 'fab fa-gitkraken', 'http://localhost/udalv/inicio', 3, '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq'),
(10, 'FormData Js', 'fab fa-wikipedia-w', 'https://javascript.info/formdata', 3, '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq'),
(11, 'mozilla', 'fab fa-github', 'https://developer.mozilla.org/es/docs/Web/Guide/Usando_Objetos_FormData', 3, '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq'),
(12, 'Mozilla', 'fab fa-gitkraken', 'https://developer.mozilla.org/es/docs/Web/Guide/Usando_Objetos_FormData', 3, '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq'),
(13, 'Mozilla', 'fab fa-gitkraken', 'https://developer.mozilla.org/es/docs/Web/Guide/Usando_Objetos_FormData', 3, '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq'),
(14, 'Mozilla 2', 'fas fa-bookmark', 'https://developer.mozilla.org/es/docs/Web/API/XMLHttpRequest/FormData', 3, '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq'),
(15, 'skdnvslk', 'fab fa-github', 'https://developer.mozilla.org/es/docs/Web/API/XMLHttpRequest/FormData', 3, '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq'),
(16, 'w3school', 'fab fa-github', 'https://www.w3schools.com/jsref/met_form_reset.asp', 3, '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq'),
(17, 'Youtube', 'fab fa-youtube', 'https://www.youtube.com', 3, '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq'),
(18, 'facebbok', 'fab fa-facebook', 'https://www.facebook.com', 3, '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq'),
(19, 'Whatsapp', 'fab fa-instagram', 'https://web.whatsapp.com/', 4, '$2y$10$6va9f7N5CdoqPMsaR8du4.ClqtPyT0bzgdd.eA4xT2KZxclCZ5/02'),
(20, 'Chino y Nacho', 'fab fa-youtube', 'https://www.youtube.com/watch?v=AMTAQ-AJS4Y&list=RDOPf0YbXqDm0&index=6', 3, '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq'),
(23, 'askcakj', 'fab fa-youtube', 'http://localhost/udalv/inicio', 3, '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `mood_day` date NOT NULL,
  `token_user` varchar(150) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `name`, `mood_day`, `token_user`, `id_user`) VALUES
(7, 'Muy Malo', '2020-08-08', '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq', 3),
(9, 'Bien', '2020-08-09', '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq', 3),
(15, 'Regular', '2020-08-10', '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `token_user` varchar(150) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `title`, `description`, `token_user`, `id_user`) VALUES
(2, 'Hola', 'Hola mundo', '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq', 3),
(13, 'Hola 2', 'dscsdcnsj', '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq', 3),
(15, 'Prueba actualizar', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el ', '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id` int(11) NOT NULL,
  `name_task` varchar(80) NOT NULL,
  `date` date NOT NULL,
  `state_task` tinyint(1) NOT NULL DEFAULT 0,
  `token_user` varchar(150) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `token` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(80) NOT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `token`, `name`, `lastname`, `avatar`, `password`, `email`, `birthday`) VALUES
(3, '$2y$10$ZgYSnZlmSD9jM8z4kO1sqeugQOsEi/7N7F2.P.UdvKD7isdTMmuQq', 'Angello', 'Ordonez', NULL, '$2y$10$bnx5v7yuX/Oclko3YH1CEu82N5bTLj9tjCb098.U8XZkVZXJMnSXu', 'angello@gmail.com', NULL),
(4, '$2y$10$6va9f7N5CdoqPMsaR8du4.ClqtPyT0bzgdd.eA4xT2KZxclCZ5/02', 'Milena', 'Ballesteros', NULL, '$2y$10$Z9HXmpyeUxuT8lVfYLPc9OkE9o3Tn7V0plCfoC4ORG12uQHwBpqr2', 'mile@gmail.com', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `enlace`
--
ALTER TABLE `enlace`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_enlace` (`id_user`,`token_user`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_mood` (`id_user`,`mood_day`),
  ADD KEY `FK_estado` (`id_user`,`token_user`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_nota` (`id_user`,`token_user`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tareas` (`id_user`,`token_user`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`,`token`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `enlace`
--
ALTER TABLE `enlace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `enlace`
--
ALTER TABLE `enlace`
  ADD CONSTRAINT `FK_enlace` FOREIGN KEY (`id_user`,`token_user`) REFERENCES `usuario` (`id`, `token`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `FK_estado` FOREIGN KEY (`id_user`,`token_user`) REFERENCES `usuario` (`id`, `token`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `FK_nota` FOREIGN KEY (`id_user`,`token_user`) REFERENCES `usuario` (`id`, `token`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `FK_tareas` FOREIGN KEY (`id_user`,`token_user`) REFERENCES `usuario` (`id`, `token`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
