-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2020 a las 05:29:00
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examplepdo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf32_spanish2_ci NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`Id`, `name`, `status_id`) VALUES
(1, 'terror', 1),
(2, 'amor', 2),
(3, 'accion', 1),
(4, 'deportes', 1),
(5, 'intriga', 2),
(6, 'ciencia ficcion', 1),
(7, 'wester', 2),
(8, 'animacion', 1),
(9, 'aventura', 2),
(10, 'belica', 1),
(11, 'adultos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_movie`
--

CREATE TABLE `category_movie` (
  `Id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `category_movie`
--

INSERT INTO `category_movie` (`Id`, `movie_id`, `category_id`, `status_id`) VALUES
(4, 4, 3, 1),
(5, 5, 6, 1),
(6, 6, 3, 2),
(8, 8, 7, 2),
(9, 9, 10, 1),
(10, 10, 5, 2),
(11, 11, 7, 1),
(17, 13, 9, 1),
(18, 14, 9, 1),
(19, 1, 1, 1),
(20, 1, 6, 1),
(21, 1, 8, 1),
(22, 1, 2, 1),
(23, 3, 8, 1),
(24, 3, 6, 1),
(25, 15, 1, 1),
(26, 15, 3, 1),
(27, 16, 6, 1),
(28, 2, 3, 1),
(29, 2, 6, 1),
(30, 17, 7, 1),
(31, 7, 2, 1),
(32, 12, 9, 1),
(33, 12, 4, 1),
(35, 18, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `Id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf32_spanish2_ci NOT NULL,
  `description` text COLLATE utf32_spanish2_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`Id`, `name`, `description`, `user_id`, `status_id`) VALUES
(1, 'saw', '‘Saw’ es una película que relata un ejercicio violento, sangriento, psicológicamente agotador y un tanto terrorífico.Adam y Gordon, se despiertan separados por un cadáver y encadenados en una guarida. Están siendo los protagonistas de un juego que proviene de un asesino en serie. Para sobrevivir, los dos hombres deberán seguir una serie de reglas y objetivos diferentes si quieren ganar la batalla mortal a la que están siendo sometidos.', 1, 1),
(2, 'las cronicas de narnia', '', 2, 1),
(3, 'Coco', 'Pelicula que trata sobre un niño llamado Miguel de doce años que vive con su familia en una zona rural y se acerca una de las celebración mexicana donde el mundo real y el de los muertos se unen por una noche para ver familiares que ya están muertos.', 3, 2),
(4, 'Piratas del Caribe: La venganza de Salazar', 'Empujado hacia una nueva aventura, un sumamente desafortunado Jack Sparrow descubre que los vientos de los malos augurios soplan incluso más fuerte cuando los mortales piratas fantasma liderados por su viejo enemigo, el capitán Salazar, escapan del Triángulo del Diablo. Decididos a matar a todo pirata que encuentren en el mar, incluso al propio Sparrow. La única esperanza de supervivencia del Capitán Jack Sparrow se encuentra en la búsqueda del legendario tridente de Poseidón, un poderoso artefacto que otorga a su poseedor el control total sobre los mares.', 4, 1),
(5, 'One Piece: El barón Omatsuri y la Isla Secreta', 'Sinopsis\r\nLos sombrero de paja han encotrado un mapa que lleba a una isla llamada omatsuri que promete fiesta ,salones de belleza ,lindas chica de todo el mundo y grandes banquetes. Pero para disfrutar sus vacaciones tienen que realizar el test infernal hecho por el Baron Omatsuri.Pero la isla tiene un secreto. El test infernal sirve para separar y hacer que los piratas rivalizen entre si rompiento su espiritu de compañerismo.Monkey D Luffy y sus nakama tendran que sufrir el test infernal y poco a poco ver como se separan entre si.', 5, 2),
(6, 'xXx 2: Estado de emergencia', 'El viento del cambio político corre por los pasillos del Capitolio cuando el popular presidente se convierte en el objetivo de asesinato de un grupo radical de disidentes integrado en el gobierno de los Estados Unidos. Sólo dos personas se mantienen entre la anarquía y la libertad: Una de ellas, Augustus Gibbons, ha conseguido sobrevivir a un golpe en el cuartel general secreto de la Agencia de Seguridad Nacional y se ha dado a la fuga. El otro, un soldado condecorado de las fuerzas de Operaciones Especiales, Darius Stone, se encuentra bajo estrecha vigilancia en una prisión militar. Gibbons necesita una vez más a alguien de fuera y Stone es su hombre.', 6, 2),
(7, 'Bohemian Rhapsody', 'Bohemian Rhapsody es una rotunda y sonora celebración de Queen, de su música y de su extraordinario cantante Freddie Mercury, que desafió estereotipos e hizo añicos tradiciones para convertirse en uno de los showmans más queridos del mundo. La película plasma el meteórico ascenso al olimpo de la música de la banda a través de sus icónicas canciones y su revolucionario sonido, su crisis cuando el estilo de vida de Mercury estuvo fuera de control, y su triunfal reunión en la víspera del Live Aid, en la que Mercury, mientras sufría una enfermedad que amenazaba su vida, lidera a la banda en uno de los conciertos de rock más grandes de la historia. Veremos cómo se cimentó el legado de una banda que siempre se pareció más a una familia, y que continúa inspirando a propios y extraños, soñadores y amantes de la música hasta nuestros días.', 2, 1),
(8, 'Carros de fuego', 'En Gran Bretaña, en el año 1920, Harold Abrahams y Eric Lidell estaban hechos para correr. No sólo una razón les llebaba a correr más rápido que ningún otro hombre. Sus motivos eran tan diferentes como sus pasados; cada uno tenía su propio Dios, sus propias creencias y su propio empuje hacia el triunfo. Dos jóvenes corredores de diferentes clases sociales que se entrenan con un mismo objetivo: competir en las Olimpiadas de París de 1924.', 8, 2),
(9, 'The First Purge', 'Precuela de la franquicia «The Purge», que se centrará en los eventos que llevaron a la primera de todas las purgas anuales.', 9, 2),
(10, 'The Black Death', 'El origen data de 1565, durante el reinado de Maha Chakkrapha, cuando se produjo una epidemia en la antigua capital real. La enfermedad tropical fue atribuida a los mercaderes portugueses y persas, que navegaron con la enfermedad río arriba hasta la antigua capital. En cuanto a la crisis de salud pública, ello fue mucho peor y más extraño de lo que se presenta en los libros de historia.', 10, 1),
(11, 'asa', 'DSFDF', 7, 1),
(12, 'los minions', 'pelicula para niños', 9, 1),
(13, 'sd', 'sd', 7, 1),
(14, 'sdf', 'dsf', 9, 1),
(15, 'chucky', 'pelicula de miedo', 13, 1),
(16, 'holaa', 'SD', 11, 1),
(17, 'as', 'asa', 10, 1),
(18, 'titanic 2', 'Una joven de la alta sociedad abandona a su arrogante pretendiente por un artista humilde en el trasatlántico que se hundió durante su viaje inaugural.', 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movie_rental`
--

CREATE TABLE `movie_rental` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `rental_id` int(11) DEFAULT NULL,
  `unit_price` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movie_rental`
--

INSERT INTO `movie_rental` (`id`, `movie_id`, `rental_id`, `unit_price`) VALUES
(36, 10, 31, 1),
(37, 2, 32, 1),
(38, 1, 32, 1),
(39, 12, 32, 1),
(40, 11, 33, 1),
(41, 7, 33, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rentals`
--

CREATE TABLE `rentals` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `total` bigint(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rentals`
--

INSERT INTO `rentals` (`id`, `start_date`, `end_date`, `status_id`, `total`, `user_id`) VALUES
(31, '2020-06-12', '2020-06-09', 1, 6000, 7),
(32, '2020-03-20', '2020-06-11', 1, 12112, 4),
(33, '2020-06-05', '2020-06-23', 1, 76869, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `status_id`) VALUES
(1, 'Administrador', 1),
(2, 'Empleado', 1),
(3, 'Cliente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statuses`
--

CREATE TABLE `statuses` (
  `Id` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `type_statuses_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `statuses`
--

INSERT INTO `statuses` (`Id`, `status`, `type_statuses_id`) VALUES
(1, 'activo', 1),
(2, 'inactivo', 3),
(3, 'proceso', NULL),
(4, 'preoceso', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_statuses`
--

CREATE TABLE `type_statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `type_statuses`
--

INSERT INTO `type_statuses` (`id`, `name`) VALUES
(1, 'General'),
(2, 'Usuario'),
(3, 'Peliculas'),
(4, 'proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf32_spanish2_ci NOT NULL,
  `email` varchar(150) COLLATE utf32_spanish2_ci NOT NULL,
  `password` varchar(100) COLLATE utf32_spanish2_ci NOT NULL,
  `status_id` int(11) NOT NULL,
  `roles_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status_id`, `roles_id`) VALUES
(1, 'jeison', 'jearipadouaw@ijshd.com', '123456789', 2, 3),
(2, 'cristian', 'cristian@gmail.com', '123456789', 1, 3),
(3, 'veronica', 'veronica@gmail.com', '123456789', 2, 2),
(4, 'orlando', 'orlando@gmail.com', '123456789', 1, 2),
(5, 'pedro vargas', 'pedro@gmail.com', '123456789', 1, 2),
(6, 'francisco', 'francisco@gmail.com', '123456789', 2, 3),
(7, 'ofelia', 'ofelia@gmail.com', '123456789', 1, 2),
(8, 'iris', 'iris@gmail.com', '123456789', 2, 1),
(9, 'hary', 'hary@gmail.com', '123456789', 1, 3),
(10, 'admin', 'admin@gmail.com', '123456789', 1, 3),
(11, 'hola', 'empleado@gmail.com', 'SADS', 1, 2),
(12, 'hola', 'd.m.r.r97@gmail.com', 'wdwed', 1, 2),
(13, 'nelson ruiz', 'nelson@gmail.com', '123', 1, 3),
(14, 'leandro', 'leandro@gmail.com', 'leandro', 1, 1),
(15, 'maria paula ', 'maria@gmail.com', '112233', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indices de la tabla `category_movie`
--
ALTER TABLE `category_movie`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indices de la tabla `movie_rental`
--
ALTER TABLE `movie_rental`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_rental_fk` (`movie_id`),
  ADD KEY `rental_id` (`rental_id`);

--
-- Indices de la tabla `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_ibfk_1` (`status_id`),
  ADD KEY `rentals_ibfk_2` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_ibfk_1` (`status_id`);

--
-- Indices de la tabla `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `type_statuses_id` (`type_statuses_id`);

--
-- Indices de la tabla `type_statuses`
--
ALTER TABLE `type_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `roles_id` (`roles_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `category_movie`
--
ALTER TABLE `category_movie`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `movie_rental`
--
ALTER TABLE `movie_rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `statuses`
--
ALTER TABLE `statuses`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `type_statuses`
--
ALTER TABLE `type_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`Id`);

--
-- Filtros para la tabla `category_movie`
--
ALTER TABLE `category_movie`
  ADD CONSTRAINT `category_movie_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`Id`),
  ADD CONSTRAINT `category_movie_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`Id`),
  ADD CONSTRAINT `category_movie_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`Id`);

--
-- Filtros para la tabla `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`Id`);

--
-- Filtros para la tabla `movie_rental`
--
ALTER TABLE `movie_rental`
  ADD CONSTRAINT `movie_rental_fk` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`Id`),
  ADD CONSTRAINT `movie_rental_ibfk_1` FOREIGN KEY (`rental_id`) REFERENCES `rentals` (`id`);

--
-- Filtros para la tabla `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`Id`),
  ADD CONSTRAINT `rentals_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`Id`);

--
-- Filtros para la tabla `statuses`
--
ALTER TABLE `statuses`
  ADD CONSTRAINT `statuses_ibfk_1` FOREIGN KEY (`type_statuses_id`) REFERENCES `type_statuses` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`Id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
