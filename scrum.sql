-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2023 a las 23:43:33
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `scrum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `burdownchart`
--

CREATE TABLE `burdownchart` (
  `idChart` int(10) NOT NULL,
  `idSprint` int(10) NOT NULL,
  `idBacklog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `burdownchart`
--

INSERT INTO `burdownchart` (`idChart`, `idSprint`, `idBacklog`) VALUES
(1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrollador`
--

CREATE TABLE `desarrollador` (
  `idDevelop` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `habilidad` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `desarrollador`
--

INSERT INTO `desarrollador` (`idDevelop`, `idUser`, `habilidad`) VALUES
(4, 6, 'Ejemplo1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logeo`
--

CREATE TABLE `logeo` (
  `id` int(11) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasenia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `logeo`
--

INSERT INTO `logeo` (`id`, `cedula`, `nombre`, `email`, `contrasenia`) VALUES
(1, '1234567890', 'Sergio Parra', 'sergio@gmail.com', '$2y$10$qOMbpO6pQZVp8lFOGLh1/.v04uXbthIpPMnZLYJ6E16wKwu91fdke');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productbacklog`
--

CREATE TABLE `productbacklog` (
  `idBacklog` int(10) NOT NULL,
  `nomback` varchar(60) NOT NULL,
  `estado` varchar(60) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `fechaInicial` date NOT NULL,
  `fechaFinal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productbacklog`
--

INSERT INTO `productbacklog` (`idBacklog`, `nomback`, `estado`, `descripcion`, `fechaInicial`, `fechaFinal`) VALUES
(2, 'Proyecto Sergio', 'Pendiente', 'Ejemplo', '2023-08-28', '2023-11-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productowner`
--

CREATE TABLE `productowner` (
  `idProduct` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `experiencia` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productowner`
--

INSERT INTO `productowner` (`idProduct`, `idUser`, `experiencia`) VALUES
(2, 7, 'Ejemplo1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scrummaster`
--

CREATE TABLE `scrummaster` (
  `idSmaster` int(10) NOT NULL,
  `idUser` int(11) NOT NULL,
  `certificado` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `scrummaster`
--

INSERT INTO `scrummaster` (`idSmaster`, `idUser`, `certificado`) VALUES
(2, 5, 'otra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scrumteams`
--

CREATE TABLE `scrumteams` (
  `idSteams` int(10) NOT NULL,
  `idSmaster` int(10) NOT NULL,
  `idProduct` int(10) NOT NULL,
  `idDevelop` int(10) NOT NULL,
  `nomteam` varchar(60) NOT NULL,
  `sprintact` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `scrumteams`
--

INSERT INTO `scrumteams` (`idSteams`, `idSmaster`, `idProduct`, `idDevelop`, `nomteam`, `sprintact`) VALUES
(2, 2, 2, 4, 'Beta', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sprint`
--

CREATE TABLE `sprint` (
  `idSprint` int(10) NOT NULL,
  `idSteams` int(10) NOT NULL,
  `numsprint` varchar(3) NOT NULL,
  `fechaini` date NOT NULL,
  `fechafin` date NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sprint`
--

INSERT INTO `sprint` (`idSprint`, `idSteams`, `numsprint`, `fechaini`, `fechafin`, `estado`) VALUES
(2, 2, '2', '2023-10-08', '2023-10-14', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `idTarea` int(10) NOT NULL,
  `idSprint` int(10) NOT NULL,
  `idBacklog` int(10) NOT NULL,
  `idDevelop` int(10) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `prioridad` varchar(20) NOT NULL,
  `descrip` varchar(100) NOT NULL,
  `horas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`idTarea`, `idSprint`, `idBacklog`, `idDevelop`, `estado`, `prioridad`, `descrip`, `horas`) VALUES
(3, 2, 2, 4, 'Pendiente', 'Urgente', 'Ejemplo', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUser` int(10) NOT NULL,
  `nomuser` varchar(60) NOT NULL,
  `contuser` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUser`, `nomuser`, `contuser`) VALUES
(5, 'Sergio Parra', '1234567891'),
(6, 'Jeison Ordoñez', '1234321231'),
(7, 'Luis Rincon', '1234567876');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `burdownchart`
--
ALTER TABLE `burdownchart`
  ADD PRIMARY KEY (`idChart`),
  ADD KEY `fk_idBacklog` (`idBacklog`),
  ADD KEY `idSprint` (`idSprint`);

--
-- Indices de la tabla `desarrollador`
--
ALTER TABLE `desarrollador`
  ADD PRIMARY KEY (`idDevelop`),
  ADD KEY `fk_idUser` (`idUser`);

--
-- Indices de la tabla `logeo`
--
ALTER TABLE `logeo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_email` (`email`);

--
-- Indices de la tabla `productbacklog`
--
ALTER TABLE `productbacklog`
  ADD PRIMARY KEY (`idBacklog`);

--
-- Indices de la tabla `productowner`
--
ALTER TABLE `productowner`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `fk_idUser` (`idUser`) USING BTREE;

--
-- Indices de la tabla `scrummaster`
--
ALTER TABLE `scrummaster`
  ADD PRIMARY KEY (`idSmaster`),
  ADD KEY `fk_idUser` (`idUser`);

--
-- Indices de la tabla `scrumteams`
--
ALTER TABLE `scrumteams`
  ADD PRIMARY KEY (`idSteams`),
  ADD KEY `fk_idDevelop` (`idDevelop`),
  ADD KEY `fk_idSmaster` (`idSmaster`),
  ADD KEY `fk_idProduct` (`idProduct`);

--
-- Indices de la tabla `sprint`
--
ALTER TABLE `sprint`
  ADD PRIMARY KEY (`idSprint`),
  ADD KEY `idSteams` (`idSteams`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`idTarea`),
  ADD KEY `fk_tarea_asig_des` (`idDevelop`) USING BTREE,
  ADD KEY `idSprint` (`idSprint`),
  ADD KEY `idBacklog` (`idBacklog`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `burdownchart`
--
ALTER TABLE `burdownchart`
  MODIFY `idChart` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `desarrollador`
--
ALTER TABLE `desarrollador`
  MODIFY `idDevelop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `logeo`
--
ALTER TABLE `logeo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productbacklog`
--
ALTER TABLE `productbacklog`
  MODIFY `idBacklog` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productowner`
--
ALTER TABLE `productowner`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `scrummaster`
--
ALTER TABLE `scrummaster`
  MODIFY `idSmaster` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `scrumteams`
--
ALTER TABLE `scrumteams`
  MODIFY `idSteams` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sprint`
--
ALTER TABLE `sprint`
  MODIFY `idSprint` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `idTarea` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `burdownchart`
--
ALTER TABLE `burdownchart`
  ADD CONSTRAINT `burdownchart_ibfk_1` FOREIGN KEY (`idBacklog`) REFERENCES `productbacklog` (`idBacklog`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `burdownchart_ibfk_2` FOREIGN KEY (`idSprint`) REFERENCES `sprint` (`idSprint`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `desarrollador`
--
ALTER TABLE `desarrollador`
  ADD CONSTRAINT `desarrollador_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productowner`
--
ALTER TABLE `productowner`
  ADD CONSTRAINT `productowner_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `scrummaster`
--
ALTER TABLE `scrummaster`
  ADD CONSTRAINT `scrummaster_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `scrumteams`
--
ALTER TABLE `scrumteams`
  ADD CONSTRAINT `scrumteams_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `productowner` (`idProduct`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scrumteams_ibfk_2` FOREIGN KEY (`idDevelop`) REFERENCES `desarrollador` (`idDevelop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scrumteams_ibfk_3` FOREIGN KEY (`idSmaster`) REFERENCES `scrummaster` (`idSmaster`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sprint`
--
ALTER TABLE `sprint`
  ADD CONSTRAINT `sprint_ibfk_1` FOREIGN KEY (`idSteams`) REFERENCES `scrumteams` (`idSteams`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `tarea_ibfk_1` FOREIGN KEY (`idSprint`) REFERENCES `sprint` (`idSprint`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tarea_ibfk_2` FOREIGN KEY (`idBacklog`) REFERENCES `productbacklog` (`idBacklog`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tarea_ibfk_3` FOREIGN KEY (`idDevelop`) REFERENCES `desarrollador` (`idDevelop`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
