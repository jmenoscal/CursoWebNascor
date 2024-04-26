-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2024 a las 08:24:41
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `noticias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `titulo` varchar(500) NOT NULL,
  `texto` longtext NOT NULL,
  `categoria` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id`, `user_id`, `titulo`, `texto`, `categoria`, `fecha`, `imagen`) VALUES
(1, 1, 'NOTICIA LOCAL MODIFICADA TODO OK', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'NOTICIA MODIFICADA', '2024-04-11 11:32:08', 'img/enero2015.jpeg'),
(2, 7, '¿Dónde puedo conseguirlo?', 'Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayoría sufrió alteraciones en alguna manera, ya sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles. Si vas a utilizar un pasaje de Lorem Ipsum, necesitás estar seguro de que no hay nada avergonzante escondido en el medio del texto. Todos los generadores de Lorem Ipsum que se encuentran en Internet tienden a repetir trozos predefinidos cuando sea necesario, haciendo a este el único generador verdadero (válido) en la Internet. Usa un diccionario de mas de 200 palabras provenientes del latín, combinadas con estructuras muy útiles de sentencias, para generar texto de Lorem Ipsum que parezca razonable. Este Lorem Ipsum generado siempre estará libre de repeticiones, humor agregado o palabras no características del lenguaje, etc.', 'Noticias del pueblo 2', '2024-04-19 07:20:11', 'img/La Capitana Helados - Copas (1).png'),
(3, 7, '¿De dónde viene?', 'Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, \"consecteur\", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de \"de Finnibus Bonorum et Malorum\" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", viene de una linea en la sección 1.10.32\r\n\r\nEl trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de \"de Finibus Bonorum et Malorum\" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.', 'Noticia Internacional', '2024-04-19 07:20:11', 'img/logo-anagrama-capitana.png'),
(4, 7, '¿Dónde puedo conseguirlo?', 'Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayoría sufrió alteraciones en alguna manera, ya sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles. Si vas a utilizar un pasaje de Lorem Ipsum, necesitás estar seguro de que no hay nada avergonzante escondido en el medio del texto. Todos los generadores de Lorem Ipsum que se encuentran en Internet tienden a repetir trozos predefinidos cuando sea necesario, haciendo a este el único generador verdadero (válido) en la Internet. Usa un diccionario de mas de 200 palabras provenientes del latín, combinadas con estructuras muy útiles de sentencias, para generar texto de Lorem Ipsum que parezca razonable. Este Lorem Ipsum generado siempre estará libre de repeticiones, humor agregado o palabras no características del lenguaje, etc.', 'Noticias del pueblo', '2024-04-19 07:20:11', 'img/La Capitana Helados - Copas (1).png'),
(7, 1, 'NOTICIA LOCAL', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'NOTICIAS', '2024-04-11 11:32:08', 'img/enero2015.jpeg'),
(130, 1, 'SUBIDA DE IMAGEN', 'Learn about the history, usage and variations of Lorem Ipsum, the dummy text of the printing and typesetting industry. Generate your own Lorem Ipsum with a dictionary of over 200 Latin words', 'IMAGEN', '2024-04-21 21:51:14', 'img/default.jpg'),
(131, 1, 'IMAGNES VARIAS', 'Pixabay es una comunidad de creativos que comparten imágenes, videos, audio y otros medios libres de derechos. Puedes usar el contenido de Pixabay sin pedir permiso ni dar crédito al artista', 'IMAGENES URL', '2024-04-21 22:01:57', 'img/default.jpg'),
(132, 1, 'La UE se dispone a ampliar sus sanciones', 'Tras Estados Unidos y el Reino Unido, los ministros de Exteriores y Defensa europeos deben dar este lunes el visto bueno a una extensión de las restricciones contra Teherán, aunque sin incluir a la Guardia Revolucionaria ', 'FRONTERA', '2024-04-22 06:22:27', 'img/default.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `nombre` text NOT NULL,
  `password` varchar(400) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre`, `password`, `fecha_creacion`) VALUES
(1, 'jmenoscal@gmail.com', 'joel', '123', '2024-04-09 13:46:26'),
(7, 'juan@dominnio.com', 'Carlos', '123456', '2024-04-09 12:28:37'),
(11, 'juan@dominnio.com', 'Juan Perez', '123456', '2024-04-09 13:10:44'),
(12, 'miemail@miemail.com', 'PEPE ', '12345', '2024-04-09 13:11:00'),
(15, 'luis@email.com', 'Luis', '123', '2024-04-09 13:24:36'),
(21, 'lady@gmail.com', 'Joel Oswaldo Menoscal Pincay', '123', '2024-04-09 13:44:37'),
(50, 'juan@dominnio.com', 'holaaaaaaa', '1234', '2024-04-09 14:24:04'),
(51, 'luis@email.com', 'nuevo pepe', '123', '2024-04-09 14:25:15'),
(52, 'luis@email.com', 'nuevo pepe', '123', '2024-04-09 14:25:35'),
(53, 'luis@email.com', 'nuevo pepe', '123', '2024-04-09 14:26:06'),
(54, 'miemail@miemail.com', 'pancho', '12', '2024-04-09 14:26:29'),
(55, 'miemail@miemail.com', 'ksksd', '12', '2024-04-09 14:27:00'),
(56, 'miemail@miemail.com', 'daaaaaa', '123', '2024-04-09 14:27:42'),
(57, 'sara@gmail.com', 'sara', '123', '2024-04-21 14:01:33'),
(58, 'brat@gmail.com', 'brat', '123', '2024-04-21 14:26:03'),
(59, 'brat@gmail.com', 'brat', '123', '2024-04-21 14:26:09'),
(60, 'brat@gmail.com', 'brat', '123', '2024-04-21 14:26:15'),
(61, 'tyson@gmail.com', 'tyson', '123', '2024-04-21 14:26:48'),
(62, 'tyson@gmail.com', 'tyson', '123', '2024-04-21 14:29:01'),
(63, 'ana@gmail.com', 'ana', '123', '2024-04-21 15:01:38'),
(64, 'geo@gmail.com', 'geo', '123', '2024-04-21 15:07:14'),
(65, 'coco@gmail.com', 'coco', '123', '2024-04-21 15:10:44'),
(66, 'pedro@gmail.com', 'pedro', '123', '2024-04-21 15:12:15'),
(67, 'joan@gmail.com', 'joan', '123', '2024-04-21 16:00:25'),
(68, 'brianna@gmail.com', 'brianna', '123', '2024-04-21 18:21:17'),
(69, 'juanito@gmail.com', 'Juanito', '123', '2024-04-22 00:13:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarios_noticia` (`user_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `usuarios_noticia` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
