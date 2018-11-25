-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2018 a las 20:16:37
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `foodnation`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `idFactura` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`idFactura`, `idUsuario`, `Fecha`) VALUES
(1, 1, '2018-11-18 15:42:52'),
(2, 1, '2018-11-18 16:13:45'),
(3, 3, '2018-11-20 09:25:16'),
(4, 3, '2018-11-20 15:37:44'),
(5, 5, '2018-11-21 16:09:43'),
(6, 5, '2018-11-21 17:43:54'),
(8, 5, '2018-11-21 18:59:12'),
(9, 5, '2018-11-21 19:01:51'),
(10, 5, '2018-11-21 19:05:41'),
(11, 3, '2018-11-21 19:07:58'),
(12, 3, '2018-11-21 19:10:33'),
(13, 3, '2018-11-21 19:13:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_productos`
--

CREATE TABLE `facturas_productos` (
  `idFactura` int(100) NOT NULL,
  `idProducto` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facturas_productos`
--

INSERT INTO `facturas_productos` (`idFactura`, `idProducto`) VALUES
(1, 4),
(2, 8),
(2, 17),
(4, 1),
(4, 1),
(4, 1),
(4, 3),
(5, 12),
(5, 21),
(6, 67),
(6, 65),
(8, 10),
(9, 8),
(10, 3),
(10, 67),
(10, 67),
(11, 23),
(11, 23),
(11, 23),
(11, 23),
(11, 23),
(12, 19),
(12, 19),
(13, 95),
(13, 95);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opiniones`
--

CREATE TABLE `opiniones` (
  `idOpinion` int(100) NOT NULL,
  `idUsuario` int(100) NOT NULL,
  `idProducto` int(100) NOT NULL,
  `Opinion` varchar(255) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Puntuacion` int(5) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `opiniones`
--

INSERT INTO `opiniones` (`idOpinion`, `idUsuario`, `idProducto`, `Opinion`, `Fecha`, `Puntuacion`) VALUES
(1, 3, 1, 'Muy buenos tomates', '2018-11-13 18:43:58', 4),
(2, 3, 3, 'dadadadda', '2018-11-14 19:06:26', 2),
(3, 3, 5, 'pruebabbbbb', '2018-11-14 19:07:51', 2),
(4, 3, 12, 'cuchillo', '2018-11-15 08:17:00', 0),
(5, 3, 18, 'POP', '2018-11-15 08:19:14', 3),
(6, 3, 23, 'sardinas frutas', '2018-11-15 09:24:07', 4),
(7, 3, 21, 'Se supone que es vino', '2018-11-15 09:25:56', 1),
(8, 3, 28, 'Es carne pero en fruta', '2018-11-15 09:26:46', 1),
(9, 3, 29, 'Es salsa', '2018-11-15 09:28:57', 3),
(10, 3, 32, 'El braun', '2018-11-15 09:30:42', 5),
(11, 3, 33, 'Animal fruta', '2018-11-15 09:39:38', 1),
(12, 3, 35, 'prueba naranja', '2018-11-15 09:42:38', 0),
(13, 3, 36, 'xqqqqqq', '2018-11-15 09:45:44', 1),
(15, 5, 1, 'Estaban bien', '2018-11-15 16:59:13', 3),
(16, 1, 1, 'Aceptables', '2018-11-15 16:59:35', 4),
(17, 4, 1, 'Malísimos', '2018-11-15 16:59:50', 1),
(18, 5, 65, 'Bebida pero en pescado', '2018-11-21 17:43:42', 5),
(19, 5, 10, 'Carne 100% vegana', '2018-11-21 18:58:53', 5),
(20, 5, 67, 'HP, que no php.', '2018-11-21 19:05:22', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Precio` double(10,2) NOT NULL,
  `Tipo` varchar(100) NOT NULL,
  `Img` varchar(255) NOT NULL DEFAULT 'img/product01.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `Nombre`, `Precio`, `Tipo`, `Img`) VALUES
(1, 'Tomate', 0.50, 'Fruta', 'img/product01.jpg'),
(3, 'Franbruesa', 1.00, 'Fruta', 'img/product01.jpg'),
(4, 'Pimiento', 2.00, 'Hortaliza', 'img/product01.jpg'),
(5, 'Wine - Red, Pinot Noir, Chateau', 59.30, 'Carne', 'img/product01.jpg'),
(6, 'Syrup - Golden, Lyles', 85.91, 'Dulce', 'img/product01.jpg'),
(7, 'Juice - Orange, Concentrate', 15.33, 'Pescado', 'img/product01.jpg'),
(8, 'Pasta - Cappellini, Dry', 44.03, 'Aperitivos', 'img/product01.jpg'),
(9, 'Cumin - Whole', 29.62, 'Hortaliza', 'img/product01.jpg'),
(10, 'Potatoes - Yukon Gold, 80 Ct', 45.99, 'Hortaliza', 'img/product01.jpg'),
(11, 'Cocoa Powder - Natural', 70.85, 'Carne', 'img/product01.jpg'),
(12, 'Knife Plastic - White', 16.84, 'Fruta', 'img/product01.jpg'),
(13, 'Cod - Black Whole Fillet', 85.88, 'Carne', 'img/product01.jpg'),
(14, 'Cream - 18%', 22.83, 'Hortaliza', 'img/product01.jpg'),
(15, 'Chips Potato Salt Vinegar 43g', 55.61, 'Hortaliza', 'img/product01.jpg'),
(16, 'Cabbage Roll', 71.90, 'Hortaliza', 'img/product01.jpg'),
(17, 'Wine - Savigny - Les - Beaune', 52.69, 'Carne', 'img/product01.jpg'),
(18, 'Pop - Club Soda Can', 2.18, 'Fruta', 'img/product01.jpg'),
(19, 'Paper - Brown Paper Mini Cups', 49.54, 'Aperitivos', 'img/product01.jpg'),
(20, 'Flour - All Purpose', 90.93, 'Pescado', 'img/product01.jpg'),
(21, 'Wine - Magnotta, Merlot Sr Vqa', 84.61, 'Fruta', 'img/product01.jpg'),
(22, 'Bagelers', 81.90, 'Pescado', 'img/product01.jpg'),
(23, 'Sardines', 79.13, 'Fruta', 'img/product01.jpg'),
(24, 'Soup - Knorr, Chicken Gumbo', 35.29, 'Hortaliza', 'img/product01.jpg'),
(25, 'Vinegar - White', 82.13, 'Carne', 'img/product01.jpg'),
(26, 'Wine - Red, Pinot Noir, Chateau', 44.59, 'Hortaliza', 'img/product01.jpg'),
(27, 'Maintenance Removal Charge', 51.90, 'Dulce', 'img/product01.jpg'),
(28, 'Pork Ham Prager', 34.50, 'Fruta', 'img/product01.jpg'),
(29, 'Sauce - Salsa', 76.16, 'Fruta', 'img/product01.jpg'),
(30, 'Paper Towel Touchless', 79.53, 'Carne', 'img/product01.jpg'),
(31, 'Wine - Wyndham Estate Bin 777', 14.66, 'Dulce', 'img/product01.jpg'),
(32, 'Broom - Corn', 18.94, 'Fruta', 'img/product01.jpg'),
(33, 'Pork Loin Cutlets', 30.46, 'Fruta', 'img/product01.jpg'),
(34, 'Pate - Peppercorn', 18.83, 'Carne', 'img/product01.jpg'),
(35, 'Flavouring - Orange', 81.86, 'Fruta', 'img/product01.jpg'),
(36, 'Olives - Kalamata', 99.99, 'Fruta', 'img/product01.jpg'),
(37, 'Shrimp - Black Tiger 13/15', 20.93, 'Aperitivos', 'img/product01.jpg'),
(38, 'Melon - Watermelon, Seedless', 31.15, 'Pescado', 'img/product01.jpg'),
(39, 'Beef - Chuck, Boneless', 30.87, 'Carne', 'img/product01.jpg'),
(40, 'Wine - Ej Gallo Sierra Valley', 95.60, 'Aperitivos', 'img/product01.jpg'),
(41, 'Wine - Cahors Ac 2000, Clos', 91.18, 'Fruta', 'img/product01.jpg'),
(42, 'Red Snapper - Fresh, Whole', 42.95, 'Aperitivos', 'img/product01.jpg'),
(43, 'Vinegar - Raspberry', 54.61, 'Carne', 'img/product01.jpg'),
(44, 'Wine - Magnotta - Pinot Gris Sr', 21.46, 'Hortaliza', 'img/product01.jpg'),
(45, 'Vol Au Vents', 83.37, 'Hortaliza', 'img/product01.jpg'),
(46, 'Apron', 90.26, 'Hortaliza', 'img/product01.jpg'),
(47, 'Cheese - Mozzarella, Shredded', 39.92, 'Aperitivos', 'img/product01.jpg'),
(48, 'Sage - Fresh', 93.75, 'Fruta', 'img/product01.jpg'),
(49, 'Appetizer - Chicken Satay', 77.12, 'Pescado', 'img/product01.jpg'),
(50, 'Soup - Campbells Bean Medley', 63.09, 'Aperitivos', 'img/product01.jpg'),
(51, 'Gatorade - Fruit Punch', 26.32, 'Carne', 'img/product01.jpg'),
(52, 'Tea - Black Currant', 80.78, 'Fruta', 'img/product01.jpg'),
(53, 'Glucose', 98.80, 'Fruta', 'img/product01.jpg'),
(54, 'Persimmons', 32.20, 'Carne', 'img/product01.jpg'),
(55, 'Lettuce - Romaine, Heart', 70.28, 'Carne', 'img/product01.jpg'),
(56, 'Parsnip', 10.50, 'Hortaliza', 'img/product01.jpg'),
(57, 'Papadam', 73.95, 'Aperitivos', 'img/product01.jpg'),
(58, 'Potatoes - Yukon Gold 5 Oz', 89.93, 'Fruta', 'img/product01.jpg'),
(59, 'Whmis - Spray Bottle Trigger', 95.15, 'Carne', 'img/product01.jpg'),
(60, 'Mortadella', 60.02, 'Aperitivos', 'img/product01.jpg'),
(61, 'Breadfruit', 47.93, 'Hortaliza', 'img/product01.jpg'),
(62, 'Seaweed Green Sheets', 80.59, 'Fruta', 'img/product01.jpg'),
(63, 'Ginger - Crystalized', 79.50, 'Carne', 'img/product01.jpg'),
(64, 'Squid - Tubes / Tenticles 10/20', 19.82, 'Pescado', 'img/product01.jpg'),
(65, 'Jack Daniels', 55.04, 'Pescado', 'img/product01.jpg'),
(66, 'Mustard - Individual Pkg', 56.61, 'Carne', 'img/product01.jpg'),
(67, 'Sauce - Hp', 26.05, 'Pescado', 'img/product01.jpg'),
(68, 'Soupfoamcont12oz 112con', 7.38, 'Hortaliza', 'img/product01.jpg'),
(69, 'Wine - Toasted Head', 39.28, 'Aperitivos', 'img/product01.jpg'),
(70, 'Sauce - Oyster', 48.49, 'Pescado', 'img/product01.jpg'),
(71, 'Tomatoes - Vine Ripe, Red', 25.94, 'Carne', 'img/product01.jpg'),
(72, 'Chicken - Thigh, Bone In', 80.47, 'Dulce', 'img/product01.jpg'),
(73, 'Nantucket Cranberry Juice', 10.85, 'Hortaliza', 'img/product01.jpg'),
(74, 'Venison - Denver Leg Boneless', 32.48, 'Pescado', 'img/product01.jpg'),
(75, 'Turnip - White', 14.32, 'Dulce', 'img/product01.jpg'),
(76, 'Food Colouring - Blue', 53.54, 'Hortaliza', 'img/product01.jpg'),
(77, 'Longos - Greek Salad', 25.59, 'Fruta', 'img/product01.jpg'),
(78, 'Potatoes - Yukon Gold, 80 Ct', 3.82, 'Hortaliza', 'img/product01.jpg'),
(79, 'Potatoes - Idaho 100 Count', 10.74, 'Carne', 'img/product01.jpg'),
(80, 'External Supplier', 16.05, 'Dulce', 'img/product01.jpg'),
(81, 'Cheese - Camembert', 33.99, 'Fruta', 'img/product01.jpg'),
(82, 'Cranberry Foccacia', 45.40, 'Pescado', 'img/product01.jpg'),
(83, 'Cookies Almond Hazelnut', 51.53, 'Aperitivos', 'img/product01.jpg'),
(84, 'Soup - Cream Of Potato / Leek', 62.02, 'Dulce', 'img/product01.jpg'),
(85, 'Sauce - Thousand Island', 82.56, 'Aperitivos', 'img/product01.jpg'),
(86, 'Squash - Guords', 61.19, 'Aperitivos', 'img/product01.jpg'),
(87, 'Soup - Campbells, Lentil', 55.95, 'Aperitivos', 'img/product01.jpg'),
(88, 'Bacardi Limon', 63.36, 'Carne', 'img/product01.jpg'),
(89, 'Cake Circle, Paprus', 90.52, 'Aperitivos', 'img/product01.jpg'),
(90, 'Swiss Chard - Red', 32.52, 'Dulce', 'img/product01.jpg'),
(91, 'Tomatoes - Heirloom', 57.87, 'Aperitivos', 'img/product01.jpg'),
(92, 'Tuna - Canned, Flaked, Light', 73.22, 'Carne', 'img/product01.jpg'),
(93, 'Dish Towel', 56.28, 'Aperitivos', 'img/product01.jpg'),
(94, 'Cheese - Provolone', 78.87, 'Pescado', 'img/product01.jpg'),
(95, 'Appetizer - Asian Shrimp Roll', 43.27, 'Dulce', 'img/product01.jpg'),
(96, 'Jam - Raspberry,jar', 75.21, 'Aperitivos', 'img/product01.jpg'),
(97, 'Garam Marsala', 45.44, 'Carne', 'img/product01.jpg'),
(98, 'Bread - Focaccia Quarter', 15.61, 'Carne', 'img/product01.jpg'),
(99, 'Salt And Pepper Mix - Black', 61.52, 'Fruta', 'img/product01.jpg'),
(100, 'Wine - Chateauneuf Du Pape', 88.53, 'Fruta', 'img/product01.jpg'),
(101, 'Shrimp - Tiger 21/25', 19.95, 'Dulce', 'img/product01.jpg'),
(102, 'Mahi Mahi', 82.33, 'Dulce', 'img/product01.jpg'),
(103, 'Oil - Safflower', 82.32, 'Carne', 'img/product01.jpg'),
(104, 'Vinegar - Tarragon', 95.72, 'Carne', 'img/product01.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(125) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rol` varchar(100) DEFAULT 'usuario',
  `usuario` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellidos`, `email`, `rol`, `usuario`, `password`) VALUES
(1, 'Juan', 'Sánchez', 'prueba@prueba.com', 'usuario', 'Juan1', '0617ecd178b4f2d159070705bdce6764'),
(3, 'test', 'test', 'testing@test', 'usuario', 'test', '202cb962ac59075b964b07152d234b70'),
(4, '', '', 'prueba@test.funcion', 'usuario', 'funcionTest', '202cb962ac59075b964b07152d234b70'),
(5, '', '', 'insertarDatos@datos.com', 'usuario', 'Reviewer', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `fk_idusuario` (`idUsuario`);

--
-- Indices de la tabla `facturas_productos`
--
ALTER TABLE `facturas_productos`
  ADD KEY `fk_idfactura` (`idFactura`),
  ADD KEY `fk_idproducto` (`idProducto`);

--
-- Indices de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD PRIMARY KEY (`idOpinion`),
  ADD KEY `fk_idusuarios` (`idUsuario`),
  ADD KEY `fk_idproductos` (`idProducto`);

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
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  MODIFY `idOpinion` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_idusuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `facturas_productos`
--
ALTER TABLE `facturas_productos`
  ADD CONSTRAINT `fk_idfactura` FOREIGN KEY (`idFactura`) REFERENCES `facturas` (`idFactura`),
  ADD CONSTRAINT `fk_idproducto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD CONSTRAINT `fk_idproductos` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`),
  ADD CONSTRAINT `fk_idusuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
