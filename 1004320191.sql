-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2021 a las 02:22:29
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `1004320191`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datas`
--

CREATE TABLE `datas` (
  `id_datas` int(11) NOT NULL,
  `titulo` varchar(32) NOT NULL,
  `texto` text NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datas`
--

INSERT INTO `datas` (`id_datas`, `titulo`, `texto`, `fecha`) VALUES
(24, 'Inicio de clases', 'Comenzamos una nuevo semestre academico', '2021-05-12'),
(25, 'La primera semana de clases', 'Se mpresentaron los docentes de cada cursos que me matricule', '2021-05-18'),
(26, 'Segunda semana de clases', 'se comenzaron a algunos horarios de dos cursos', '2021-05-24'),
(27, 'Tercera semana de clases', 'Comienzan a darnos trabajos los profesores', '2021-06-08'),
(28, 'Semana de Evaluacion', 'Comienzo a dar los primero examenes de mis cursos', '2021-07-01'),
(29, 'Presentacion del diario de pagin', 'Falta una horas para entregar el trabajo al docente', '2021-07-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nombre`, `username`, `password`) VALUES
(6, 'Juan Jose huaman', '1004320191', '$2y$10$SJGa5zE4lapNaWYpg9wH5erROXzWLj6iR9Br2wkbT6.dqj4VaCuUe'),
(8, 'juan', 'bsmith', '$2y$10$nHXrbuhIBJfkARBBrwEabOvr.fRbaz8w0En2bWk9Xb3r.vT0y5T9y');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datas`
--
ALTER TABLE `datas`
  ADD PRIMARY KEY (`id_datas`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datas`
--
ALTER TABLE `datas`
  MODIFY `id_datas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
