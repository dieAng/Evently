-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2025 a las 19:54:25
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
-- Base de datos: `evently`
--
CREATE DATABASE IF NOT EXISTS `evently` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `evently`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuntarse`
--

CREATE TABLE `apuntarse` (
  `idUsuario` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `idProvincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `apuntarse`
--

INSERT INTO `apuntarse` (`idUsuario`, `idEvento`, `idProvincia`) VALUES
(1, 9, 18),
(1, 18, 38),
(1, 2, 46),
(1, 7, 50),
(2, 16, 5),
(2, 4, 8),
(2, 18, 38),
(3, 9, 18),
(3, 5, 48),
(4, 1, 31),
(5, 14, 3),
(5, 10, 25),
(6, 14, 3),
(7, 15, 11),
(7, 17, 26),
(7, 6, 41),
(7, 7, 50),
(8, 18, 38),
(8, 7, 50),
(9, 20, 7),
(9, 3, 20),
(9, 13, 33),
(10, 19, 22),
(10, 11, 47),
(11, 8, 32),
(13, 16, 5),
(13, 20, 7),
(13, 8, 32),
(14, 3, 20),
(14, 8, 32),
(15, 3, 20),
(15, 13, 33),
(16, 20, 7),
(17, 9, 18),
(17, 12, 45),
(18, 12, 45),
(19, 13, 33),
(19, 11, 47),
(20, 18, 38),
(20, 5, 48),
(21, 1, 31),
(22, 10, 25),
(23, 15, 11),
(23, 2, 46),
(24, 11, 47),
(25, 9, 18),
(25, 5, 48),
(26, 2, 46),
(27, 14, 3),
(28, 1, 31),
(30, 4, 8),
(30, 15, 11),
(30, 10, 25),
(30, 17, 26),
(31, 9, 18),
(31, 12, 45),
(32, 16, 5),
(33, 20, 7),
(33, 15, 11),
(34, 16, 5),
(35, 10, 25),
(35, 6, 41),
(35, 5, 48),
(36, 14, 3),
(36, 11, 47),
(37, 12, 45),
(38, 4, 8),
(38, 17, 26),
(39, 2, 46),
(40, 3, 20),
(40, 19, 22),
(41, 7, 50),
(42, 17, 26),
(43, 19, 22),
(44, 19, 22),
(44, 8, 32),
(45, 1, 31),
(46, 6, 41),
(47, 13, 33),
(48, 6, 41),
(49, 4, 8),
(50, 7, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `idEvento` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `desc` text NOT NULL,
  `idOrganizador` int(11) NOT NULL,
  `idProvincia` int(11) DEFAULT NULL,
  `fechaHora` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idEvento`, `titulo`, `desc`, `idOrganizador`, `idProvincia`, `fechaHora`) VALUES
(1, 'Feria Internacional del Libro 2025', 'Un evento cultural que reúne editoriales, autores y lectores de todo el mundo para presentar novedades literarias, charlas y actividades interactivas.', 13, 31, '2025-05-22 10:00:00'),
(2, 'Conferencia de Tecnología Verde', 'Foro internacional sobre innovación sustentable, energías renovables y desarrollo ecológico, con la participación de científicos, emprendedores y empresas.', 13, 46, '2025-10-17 11:00:00'),
(3, 'Festival de Cine Independiente', 'Muestra anual de producciones cinematográficas independientes, con proyecciones, paneles de discusión y premios para nuevos talentos del cine.', 13, 20, '2025-09-19 17:00:00'),
(4, 'Hackathon de Inteligencia Artificial', 'Competencia intensiva de 48 horas en la que equipos de programadores desarrollan soluciones creativas usando IA, con premios y oportunidades de networking.', 13, 8, '2025-07-05 16:00:00'),
(5, 'Cumbre Global de Liderazgo Empresarial', 'Encuentro entre CEOs, inversores y emprendedores para debatir tendencias del mercado, liderazgo y transformación digital.', 13, 48, '2025-11-13 10:00:00'),
(6, 'Festival Gastronómico Internacional', 'Celebración culinaria que presenta sabores del mundo con degustaciones, demostraciones en vivo de chefs reconocidos y actividades para toda la familia.', 13, 41, '2025-10-03 13:00:00'),
(7, 'Jornada de Salud y Bienestar', 'Evento comunitario con charlas de especialistas, talleres de yoga, pruebas médicas gratuitas y stands informativos sobre hábitos saludables.', 13, 50, '2025-04-12 12:00:00'),
(8, 'Expo Empleo y Talento Joven', 'Feria orientada a conectar jóvenes profesionales con empresas mediante entrevistas, asesoría de CV y charlas motivacionales.', 13, 32, '2025-05-08 16:00:00'),
(9, 'Maratón Ciudad de la Esperanza', 'Carrera anual de 10 y 21 km a beneficio de organizaciones benéficas locales, abierta a corredores profesionales y aficionados.', 13, 18, '2025-03-09 09:00:00'),
(10, 'Concierto por la Paz', 'Evento musical al aire libre con artistas nacionales e internacionales, enfocado en promover la solidaridad y la tolerancia a través del arte.', 13, 25, '2025-06-21 19:00:00'),
(11, 'Semana de la Innovación Educativa', 'Jornadas dedicadas a nuevas metodologías de enseñanza, tecnología en el aula y formación docente. Incluye ponencias de expertos internacionales, presentaciones de proyectos escolares innovadores y espacios de debate sobre el futuro de la educación.', 13, 47, '2025-10-06 11:00:00'),
(12, 'Festival Medieval del Castillo', 'Recreaciones históricas, mercadillos, espectáculos con fuego y conciertos folk en un entorno amurallado. Los visitantes podrán participar en talleres de esgrima antigua, ver torneos a caballo y disfrutar de gastronomía medieval.', 13, 45, '2025-05-16 17:00:00'),
(13, 'Encuentro Nacional de Podcasting', 'Evento para creadores y oyentes de pódcast, con talleres, grabaciones en vivo y networking. Participan voces destacadas del panorama hispano y se realizan sesiones interactivas sobre producción, edición y monetización de contenidos.', 13, 33, '2025-05-24 17:00:00'),
(14, 'Salón del Cómic y la Ilustración', 'Dedicado a los fans del manga, superhéroes y el arte gráfico, con artistas invitados y concursos de cosplay. También se realizarán charlas sobre narrativa visual, técnicas de ilustración digital y firmas de autores reconocidos.', 13, 3, '2025-06-14 17:00:00'),
(15, 'Festival Internacional de Danza Contemporánea', 'Funciones al aire libre, talleres de movimiento y compañías de renombre internacional. El casco histórico y las playas se convertirán en escenarios vivos de danza, integrando a la comunidad y a los visitantes en experiencias únicas.', 13, 11, '2025-08-07 16:00:00'),
(16, 'Congreso Nacional de Ciberseguridad', 'Dirigido a profesionales del sector tech, con charlas sobre protección de datos, hacking ético y ciberdefensa. Contará con simulacros, retos tipo Capture the Flag y paneles sobre las últimas amenazas y soluciones digitales.', 13, 5, '2025-10-02 10:00:00'),
(17, 'Feria del Vino y la Vendimia', 'Catas, visitas a bodegas, rutas por viñedos y espectáculos en la época de cosecha. El evento celebra la tradición vitivinícola de La Rioja con degustaciones guiadas, talleres de maridaje y conciertos al atardecer entre los viñedos.', 13, 26, '2025-09-19 12:00:00'),
(18, 'Encuentro de Narrativa Fantástica', 'Presentaciones de libros, mesas redondas y actividades temáticas de literatura fantástica y ciencia ficción. Con participación de autores consagrados y emergentes, incluye juegos de rol en vivo, firmas de libros y concursos literarios.', 13, 38, '2025-04-26 10:00:00'),
(19, 'EcoFiesta Rural: Tradiciones y Naturaleza', 'Celebración de la cultura rural con mercados ecológicos, música tradicional y rutas por el Pirineo aragonés. Además, se ofrecerán talleres de artesanía, experiencias de turismo activo y charlas sobre sostenibilidad en el mundo rural.', 13, 22, '2025-05-03 11:00:00'),
(20, 'Muestra de Teatro Joven', 'Espacio para compañías teatrales emergentes, con funciones, formación y premios a nuevos talentos. Se realizarán actividades paralelas como clases magistrales, mesas de crítica teatral y encuentros entre jóvenes creadores.', 13, 7, '2025-07-01 17:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `idProvincia` int(11) NOT NULL,
  `nombreProv` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`idProvincia`, `nombreProv`) VALUES
(1, 'Álava'),
(2, 'Albacete'),
(3, 'Alicante'),
(4, 'Almería'),
(5, 'Asturias'),
(6, 'Ávila'),
(7, 'Badajoz'),
(8, 'Barcelona'),
(9, 'Burgos'),
(10, 'Cáceres'),
(11, 'Cádiz'),
(12, 'Cantabria'),
(13, 'Castellón'),
(14, 'Ciudad Real'),
(15, 'Córdoba'),
(16, 'Cuenca'),
(17, 'Gerona'),
(18, 'Granada'),
(19, 'Guadalajara'),
(20, 'Guipúzcoa'),
(21, 'Huelva'),
(22, 'Huesca'),
(23, 'Islas Baleares'),
(24, 'Jaén'),
(25, 'La Coruña'),
(26, 'La Rioja'),
(27, 'Las Palmas'),
(28, 'León'),
(29, 'Lérida'),
(30, 'Lugo'),
(31, 'Madrid'),
(32, 'Málaga'),
(33, 'Murcia'),
(34, 'Navarra'),
(35, 'Orense'),
(36, 'Palencia'),
(37, 'Pontevedra'),
(38, 'Salamanca'),
(39, 'Santa Cruz de Tenerife'),
(40, 'Segovia'),
(41, 'Sevilla'),
(42, 'Soria'),
(43, 'Tarragona'),
(44, 'Teruel'),
(45, 'Toledo'),
(46, 'Valencia'),
(47, 'Valladolid'),
(48, 'Vizcaya'),
(49, 'Zamora'),
(50, 'Zaragoza'),
(51, 'Ceuta'),
(52, 'Melilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `contrasena` varchar(5000) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `idProvincia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `contrasena`, `email`, `idProvincia`) VALUES
(1, 'María', '81dc9bdb52d04dc20036dbd8313ed055', '1@asd.asd', 7),
(2, 'José', '81dc9bdb52d04dc20036dbd8313ed055', '2@asd.asd', 13),
(3, 'Carmen', '81dc9bdb52d04dc20036dbd8313ed055', '3@asd.asd', 45),
(4, 'Antonio', '81dc9bdb52d04dc20036dbd8313ed055', '4@asd.asd', 22),
(5, 'Isabel', '81dc9bdb52d04dc20036dbd8313ed055', '5@asd.asd', 1),
(6, 'Manuel', '81dc9bdb52d04dc20036dbd8313ed055', '6@asd.asd', 39),
(7, 'Ana', '81dc9bdb52d04dc20036dbd8313ed055', '7@asd.asd', 50),
(8, 'Juan', '81dc9bdb52d04dc20036dbd8313ed055', '8@asd.asd', 3),
(9, 'Laura', '81dc9bdb52d04dc20036dbd8313ed055', '9@asd.asd', 17),
(10, 'Francisco', '81dc9bdb52d04dc20036dbd8313ed055', '10@asd.asd', 8),
(11, 'Marta', '81dc9bdb52d04dc20036dbd8313ed055', '11@asd.asd', 26),
(12, 'David', '81dc9bdb52d04dc20036dbd8313ed055', '12@asd.asd', 41),
(13, 'Lucia', '81dc9bdb52d04dc20036dbd8313ed055', '13@asd.asd', 9),
(14, 'Javier', '81dc9bdb52d04dc20036dbd8313ed055', '14@asd.asd', 35),
(15, 'Paula', '81dc9bdb52d04dc20036dbd8313ed055', '15@asd.asd', 13),
(16, 'Pedro', '81dc9bdb52d04dc20036dbd8313ed055', '16@asd.asd', 21),
(17, 'Raquel', '81dc9bdb52d04dc20036dbd8313ed055', '17@asd.asd', 47),
(18, 'Carlos', '81dc9bdb52d04dc20036dbd8313ed055', '18@asd.asd', 29),
(19, 'Elena', '81dc9bdb52d04dc20036dbd8313ed055', '19@asd.asd', 4),
(20, 'Álvaro', '81dc9bdb52d04dc20036dbd8313ed055', '20@asd.asd', 14),
(21, 'Rosa', '81dc9bdb52d04dc20036dbd8313ed055', '21@asd.asd', 38),
(22, 'Luis', '81dc9bdb52d04dc20036dbd8313ed055', '22@asd.asd', 12),
(23, 'Beatriz', '81dc9bdb52d04dc20036dbd8313ed055', '23@asd.asd', 19),
(24, 'Miguel', '81dc9bdb52d04dc20036dbd8313ed055', '24@asd.asd', 25),
(25, 'Teresa', '81dc9bdb52d04dc20036dbd8313ed055', '25@asd.asd', 31),
(26, 'Sergio', '81dc9bdb52d04dc20036dbd8313ed055', '26@asd.asd', 36),
(27, 'Patricia', '81dc9bdb52d04dc20036dbd8313ed055', '27@asd.asd', 6),
(28, 'Diego', '81dc9bdb52d04dc20036dbd8313ed055', '28@asd.asd', 44),
(29, 'Silvia', '81dc9bdb52d04dc20036dbd8313ed055', '29@asd.asd', 52),
(30, 'Andrés', '81dc9bdb52d04dc20036dbd8313ed055', '30@asd.asd', 18),
(31, 'Julia', '81dc9bdb52d04dc20036dbd8313ed055', '31@asd.asd', 33),
(32, 'Fernando', '81dc9bdb52d04dc20036dbd8313ed055', '32@asd.asd', 20),
(33, 'Alicia', '81dc9bdb52d04dc20036dbd8313ed055', '33@asd.asd', 11),
(34, 'Ramón', '81dc9bdb52d04dc20036dbd8313ed055', '34@asd.asd', 2),
(35, 'Inés', '81dc9bdb52d04dc20036dbd8313ed055', '35@asd.asd', 27),
(36, 'Pablo', '81dc9bdb52d04dc20036dbd8313ed055', '36@asd.asd', 30),
(37, 'Nuria', '81dc9bdb52d04dc20036dbd8313ed055', '37@asd.asd', 23),
(38, 'Marcos', '81dc9bdb52d04dc20036dbd8313ed055', '38@asd.asd', 5),
(39, 'Clara', '81dc9bdb52d04dc20036dbd8313ed055', '39@asd.asd', 48),
(40, 'Joaquín', '81dc9bdb52d04dc20036dbd8313ed055', '40@asd.asd', 24),
(41, 'Irene', '81dc9bdb52d04dc20036dbd8313ed055', '41@asd.asd', 32),
(42, 'Víctor', '81dc9bdb52d04dc20036dbd8313ed055', '42@asd.asd', 46),
(43, 'Sara', '81dc9bdb52d04dc20036dbd8313ed055', '43@asd.asd', 10),
(44, 'Rubén', '81dc9bdb52d04dc20036dbd8313ed055', '44@asd.asd', 28),
(45, 'Sonia', '81dc9bdb52d04dc20036dbd8313ed055', '45@asd.asd', 49),
(46, 'Óscar', '81dc9bdb52d04dc20036dbd8313ed055', '46@asd.asd', 16),
(47, 'Gloria', '81dc9bdb52d04dc20036dbd8313ed055', '47@asd.asd', 15),
(48, 'Tomás', '81dc9bdb52d04dc20036dbd8313ed055', '48@asd.asd', 42),
(49, 'Eva', '81dc9bdb52d04dc20036dbd8313ed055', '49@asd.asd', 7),
(50, 'José', '81dc9bdb52d04dc20036dbd8313ed055', '50@asd.asd', 40),
(53, 'Jose', '81dc9bdb52d04dc20036dbd8313ed055', 'sad@sad.sad', 26),
(56, 'Jose', '81dc9bdb52d04dc20036dbd8313ed055', '123@123.com', 26),
(57, 'Jose', '81dc9bdb52d04dc20036dbd8313ed055', '123@123.com', 26);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apuntarse`
--
ALTER TABLE `apuntarse`
  ADD PRIMARY KEY (`idUsuario`,`idProvincia`,`idEvento`),
  ADD KEY `idEvento` (`idEvento`),
  ADD KEY `idLocalidad` (`idProvincia`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD UNIQUE KEY `evento_pk` (`idEvento`,`idProvincia`,`fechaHora`),
  ADD KEY `idOrganizador` (`idOrganizador`),
  ADD KEY `evento_provincia__fk` (`idProvincia`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`idProvincia`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `usuario_provincia__fk` (`idProvincia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `idProvincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apuntarse`
--
ALTER TABLE `apuntarse`
  ADD CONSTRAINT `apuntarse_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `apuntarse_ibfk_2` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`),
  ADD CONSTRAINT `apuntarse_ibfk_3` FOREIGN KEY (`idProvincia`) REFERENCES `evento` (`idProvincia`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_provincia__fk` FOREIGN KEY (`idProvincia`) REFERENCES `provincia` (`idProvincia`),
  ADD CONSTRAINT `evento_usuario__fk` FOREIGN KEY (`idOrganizador`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_provincia__fk` FOREIGN KEY (`idProvincia`) REFERENCES `provincia` (`idProvincia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
