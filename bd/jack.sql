-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-04-2019 a las 12:03:00
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jack`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apertura`
--

DROP TABLE IF EXISTS `apertura`;
CREATE TABLE IF NOT EXISTS `apertura` (
  `idFecha` int(6) NOT NULL AUTO_INCREMENT,
  `tiempoApertura` datetime NOT NULL,
  `montoInicial` float(6,2) NOT NULL,
  `obs` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idFecha`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `apertura`
--

INSERT INTO `apertura` (`idFecha`, `tiempoApertura`, `montoInicial`, `obs`) VALUES
(1, '2018-04-28 00:00:00', 450.00, 'esto es una prueba'),
(2, '2018-04-28 00:00:00', 450.00, 'esto es una prueba'),
(3, '2018-04-28 00:00:00', 50.00, 'uno nuevo'),
(4, '2019-05-22 10:30:20', 450.00, 'uno nuevo'),
(5, '2019-03-28 14:10:12', 450.00, ''),
(6, '2019-03-28 14:10:51', 333.00, ''),
(7, '2019-03-28 14:15:45', 588.00, ''),
(8, '2019-03-28 14:13:32', 333.00, 'original'),
(9, '2019-03-28 14:28:34', 300.00, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargasgral`
--

DROP TABLE IF EXISTS `cargasgral`;
CREATE TABLE IF NOT EXISTS `cargasgral` (
  `idCarga` int(6) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `totalDiario` float(6,2) NOT NULL,
  PRIMARY KEY (`idCarga`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargasgral`
--

INSERT INTO `cargasgral` (`idCarga`, `fecha`, `detalle`, `totalDiario`) VALUES
(1, '2019-03-28 14:34:18', 'Saldo Virtual', 678.00),
(2, '2019-03-28 14:35:32', 'Virtual Ex Claro', 890.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierre`
--

DROP TABLE IF EXISTS `cierre`;
CREATE TABLE IF NOT EXISTS `cierre` (
  `idFecha` int(6) NOT NULL AUTO_INCREMENT,
  `tiempoCierre` datetime NOT NULL,
  `montoFinal` float(6,2) NOT NULL,
  `obs` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idFecha`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cierre`
--

INSERT INTO `cierre` (`idFecha`, `tiempoCierre`, `montoFinal`, `obs`) VALUES
(1, '2019-03-28 14:24:46', 333.00, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `idCliente` int(6) NOT NULL AUTO_INCREMENT,
  `dni` varchar(8) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `domicilio` varchar(150) DEFAULT NULL,
  `localidad` varchar(150) DEFAULT NULL,
  `telfijo` varchar(30) DEFAULT NULL,
  `telmovil` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cuit` varchar(13) DEFAULT NULL,
  `condicionIva` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idCliente`),
  UNIQUE KEY `idCliente` (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `dni`, `apellido`, `nombre`, `domicilio`, `localidad`, `telfijo`, `telmovil`, `email`, `cuit`, `condicionIva`) VALUES
(1, '30729505', 'virili', 'omar', 'antonio taboas', 'villa ocampo', '3482468962', '3482558453', 'omar.virili@gmail.com', '23-30729505-9', 'CONSUMIDOR FINAL'),
(2, '78979878', 'aksdjfalsñkj', 'sjdflkasjdl', 'lsdkjlañ', 'jlsdafjaslk', '324823984', '3984239', 'fskldfjas@fdfd', '4324234242', 'CONSUMIDOR FINAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentacorriente`
--

DROP TABLE IF EXISTS `cuentacorriente`;
CREATE TABLE IF NOT EXISTS `cuentacorriente` (
  `idCtaCte` int(6) NOT NULL AUTO_INCREMENT,
  `idCliente` int(6) NOT NULL,
  `nroFactura` varchar(11) DEFAULT NULL,
  `fechaMov` datetime NOT NULL,
  `entrega` float(6,2) DEFAULT NULL,
  `deuda` float(6,2) DEFAULT NULL,
  `saldo` float(6,2) DEFAULT NULL,
  PRIMARY KEY (`idCtaCte`),
  KEY `fkCtaCli` (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuentacorriente`
--

INSERT INTO `cuentacorriente` (`idCtaCte`, `idCliente`, `nroFactura`, `fechaMov`, `entrega`, `deuda`, `saldo`) VALUES
(1, 1, '000002', '2019-03-28 07:09:00', 588.00, 88.00, 44.00),
(2, 1, '0001-00045', '2019-03-28 22:57:50', 450.00, 590.00, 55.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

DROP TABLE IF EXISTS `detalleventa`;
CREATE TABLE IF NOT EXISTS `detalleventa` (
  `idDetVenta` int(6) NOT NULL AUTO_INCREMENT,
  `idProducto` int(6) NOT NULL,
  `cantidad` int(2) NOT NULL,
  `p_u` float(6,2) NOT NULL,
  `iva` float(2,2) NOT NULL,
  `nroFactura` varchar(11) NOT NULL,
  PRIMARY KEY (`idDetVenta`),
  UNIQUE KEY `idDetVenta` (`idDetVenta`),
  KEY `fkDetPro` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equiposervicios`
--

DROP TABLE IF EXISTS `equiposervicios`;
CREATE TABLE IF NOT EXISTS `equiposervicios` (
  `idEquipo` int(5) NOT NULL AUTO_INCREMENT,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `imei` varchar(100) NOT NULL,
  `sim` bit(1) DEFAULT NULL,
  `bateria` bit(1) DEFAULT NULL,
  `tarjetaMemoria` bit(1) DEFAULT NULL,
  `per` bit(1) DEFAULT NULL,
  `cla` bit(1) DEFAULT NULL,
  `mov` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idEquipo`),
  UNIQUE KEY `idEquipo` (`idEquipo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equiposervicios`
--

INSERT INTO `equiposervicios` (`idEquipo`, `marca`, `modelo`, `imei`, `sim`, `bateria`, `tarjetaMemoria`, `per`, `cla`, `mov`) VALUES
(1, 'Motorola G', 'xt1049', '355008052553637', b'1', b'1', b'1', b'0', b'0', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

DROP TABLE IF EXISTS `gastos`;
CREATE TABLE IF NOT EXISTS `gastos` (
  `idGasto` int(6) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `detalle` varchar(150) NOT NULL,
  `monto` float(6,2) NOT NULL,
  PRIMARY KEY (`idGasto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`idGasto`, `fecha`, `detalle`, `monto`) VALUES
(1, '2019-03-29 09:10:28', 'Pago de Alquier mes de Julio', 5666.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos` (
  `idPago` int(5) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `idProveedor` int(5) NOT NULL,
  `entrega` float(6,2) NOT NULL,
  `deuda` float(6,2) NOT NULL,
  `saldo` float(6,2) NOT NULL,
  `formaPago` varchar(100) NOT NULL,
  `nroFacCompra` varchar(11) NOT NULL,
  PRIMARY KEY (`idPago`),
  KEY `fkPagosPro` (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`idPago`, `fecha`, `idProveedor`, `entrega`, `deuda`, `saldo`, `formaPago`, `nroFacCompra`) VALUES
(1, '2019-10-05 00:00:00', 1, 5000.07, 5000.69, 0.00, 'EFECTIVO', '0000-00001'),
(2, '2019-10-05 00:00:00', 2, 500.00, 1999.00, 1499.00, 'TARJETA DE CREDITO', '0000-00002'),
(3, '2019-03-29 15:34:09', 1, 2000.00, 1999.00, 1.00, 'EFCTIVO', '0000-00003'),
(4, '2019-04-01 10:00:29', 1, 44.00, 900.00, -856.00, 'EFCTIVO', '0000-00002'),
(5, '2019-04-01 10:09:09', 1, 5000.00, 5000.00, 0.00, 'EFCTIVO', '0000-00002');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `idProducto` int(6) NOT NULL AUTO_INCREMENT,
  `idProveedor` int(6) NOT NULL,
  `detalle` varchar(150) NOT NULL,
  `p_u` float NOT NULL,
  `iva` float(6,2) NOT NULL,
  `stock` int(4) NOT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `nroSerie` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `fkProProve` (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `idProveedor`, `detalle`, `p_u`, `iva`, `stock`, `marca`, `modelo`, `nroSerie`) VALUES
(1, 2, 'Carsa de nokia 1000', 30, 21.00, 4, 'nokia', '1000', '938409238429'),
(2, 1, 'Modulo display', 360.7, 10.50, 2, 'Motorola', 'xt1034', '345677');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `idProveedor` int(6) NOT NULL AUTO_INCREMENT,
  `cuit` varchar(13) NOT NULL,
  `razonSocial` varchar(100) DEFAULT NULL,
  `tel_fijo` varchar(15) DEFAULT NULL,
  `tel_movil` varchar(15) DEFAULT NULL,
  `direcion` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `condicionIva` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idProveedor`, `cuit`, `razonSocial`, `tel_fijo`, `tel_movil`, `direcion`, `email`, `condicionIva`) VALUES
(1, '23-30729505-9', 'ODVSYSTEM', '3482468962', '348215558453', 'ANTONIO TABOAS 953', 'OMAR.VIRILI@GMAIL.COM', 'CONSUMIDOR FINAL'),
(2, '27-44446666-8', 'LA RED', '3482468962', '348215558453', 'ANTONIO TABOASFASDF SDAFA', 'OMAR.VIRILI.DARIO@GMAIL.COM', 'RESPONSABLE INSCRIPTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sertec`
--

DROP TABLE IF EXISTS `sertec`;
CREATE TABLE IF NOT EXISTS `sertec` (
  `idServicio` int(6) NOT NULL AUTO_INCREMENT,
  `idCliente` int(6) NOT NULL,
  `idEquipo` int(6) NOT NULL,
  `detalle` varchar(150) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `usoRepuesto` varchar(255) DEFAULT NULL,
  `monto` float(6,2) NOT NULL,
  PRIMARY KEY (`idServicio`),
  KEY `fkSerCli` (`idCliente`),
  KEY `fkSerEqui` (`idEquipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sertec`
--

INSERT INTO `sertec` (`idServicio`, `idCliente`, `idEquipo`, `detalle`, `estado`, `usoRepuesto`, `monto`) VALUES
(1, 1, 1, 'cambio de boton de encendido', 'TERMINADO', 'boton tipo motorola 4 g', 450.00),
(2, 2, 1, 'cambio de boton de encendido', 'TERMINADO', 'BOTON DE ENCENDIDO', 550.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

DROP TABLE IF EXISTS `vendedores`;
CREATE TABLE IF NOT EXISTS `vendedores` (
  `idVendedor` int(2) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idVendedor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`idVendedor`, `apellido`, `nombre`, `telefono`, `categoria`) VALUES
(1, 'virili', 'omar dario', '467125', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `idVenta` int(6) NOT NULL AUTO_INCREMENT,
  `idCliente` int(6) NOT NULL,
  `idVendedor` int(6) NOT NULL,
  `idDetVenta` int(6) NOT NULL,
  `nroFactura` varchar(11) NOT NULL,
  `totalVenta` float(6,2) NOT NULL,
  `descuesto` float(6,2) DEFAULT NULL,
  `FormaPago` varchar(100) NOT NULL,
  PRIMARY KEY (`idVenta`),
  UNIQUE KEY `idVenta` (`idVenta`) USING BTREE,
  KEY `fkVentaVend` (`idVendedor`),
  KEY `fkVentaDet` (`idDetVenta`),
  KEY `idCliente` (`idCliente`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuentacorriente`
--
ALTER TABLE `cuentacorriente`
  ADD CONSTRAINT `fkCtaCli` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `fkDetPro` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fkPagosPro` FOREIGN KEY (`idProveedor`) REFERENCES `proveedores` (`idProveedor`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fkProProve` FOREIGN KEY (`idProveedor`) REFERENCES `proveedores` (`idProveedor`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `sertec`
--
ALTER TABLE `sertec`
  ADD CONSTRAINT `fkSerCli` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fkSerEqui` FOREIGN KEY (`idEquipo`) REFERENCES `equiposervicios` (`idEquipo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fkVentaCli` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fkVentaDet` FOREIGN KEY (`idDetVenta`) REFERENCES `detalleventa` (`idDetVenta`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fkVentaVend` FOREIGN KEY (`idVendedor`) REFERENCES `vendedores` (`idVendedor`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
