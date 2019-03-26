-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-03-2019 a las 14:02:39
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
-- Estructura de tabla para la tabla `caja`
--

DROP TABLE IF EXISTS `caja`;
CREATE TABLE IF NOT EXISTS `caja` (
  `idFecha` int(6) NOT NULL AUTO_INCREMENT,
  `tiempoApertura` date NOT NULL,
  `tiempoCierre` date NOT NULL,
  `montoInicial` float(6,2) NOT NULL,
  `obs` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idFecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargasgral`
--

DROP TABLE IF EXISTS `cargasgral`;
CREATE TABLE IF NOT EXISTS `cargasgral` (
  `idCargas` int(6) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `totalDiario` float(6,2) NOT NULL,
  PRIMARY KEY (`idCargas`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentacorriente`
--

DROP TABLE IF EXISTS `cuentacorriente`;
CREATE TABLE IF NOT EXISTS `cuentacorriente` (
  `idCtaCte` int(6) NOT NULL AUTO_INCREMENT,
  ` idCliente` int(6) NOT NULL,
  `idDetalleFactura` int(6) DEFAULT NULL,
  `fechaMov` date NOT NULL,
  `entrega` float(6,2) DEFAULT NULL,
  `deuda` float(6,2) DEFAULT NULL,
  `saldo` float(6,2) DEFAULT NULL,
  PRIMARY KEY (`idCtaCte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Estructura de tabla para la tabla `equipservicios`
--

DROP TABLE IF EXISTS `equipservicios`;
CREATE TABLE IF NOT EXISTS `equipservicios` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

DROP TABLE IF EXISTS `gastos`;
CREATE TABLE IF NOT EXISTS `gastos` (
  `idGastos` int(6) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `detalle` varchar(150) NOT NULL,
  `monto` float(6,2) NOT NULL,
  PRIMARY KEY (`idGastos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos` (
  `idPago` int(5) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `idProveedor` int(5) NOT NULL,
  `entrega` float(6,2) NOT NULL,
  `deuda` float(6,2) NOT NULL,
  `saldo` float(6,2) NOT NULL,
  `formaPago` varchar(100) NOT NULL,
  `nroFacCompra` varchar(11) NOT NULL,
  PRIMARY KEY (`idPago`),
  KEY `fkPagosPro` (`idProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `iva` float(2,2) NOT NULL,
  `stock` int(4) NOT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `nroSerie` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `email` varchar(15) DEFAULT NULL,
  `condicionIva` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `idVentas` int(6) NOT NULL AUTO_INCREMENT,
  `idClientes` int(6) NOT NULL,
  `idVendedor` int(6) NOT NULL,
  `idDetVenta` int(6) NOT NULL,
  `nroFactura` varchar(11) NOT NULL,
  `totalVenta` float(6,2) NOT NULL,
  `descuesto` float(6,2) DEFAULT NULL,
  `FormaPago` varchar(100) NOT NULL,
  PRIMARY KEY (`idVentas`),
  UNIQUE KEY `idVentas` (`idVentas`),
  KEY `idClientes` (`idClientes`),
  KEY `fkVentaVend` (`idVendedor`),
  KEY `fkVentaDet` (`idDetVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

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
-- Filtros para la tabla `sertec`
--
ALTER TABLE `sertec`
  ADD CONSTRAINT `fkSerCli` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fkSerEqui` FOREIGN KEY (`idEquipo`) REFERENCES `equipservicios` (`idEquipo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fkVentaCli` FOREIGN KEY (`idClientes`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fkVentaDet` FOREIGN KEY (`idDetVenta`) REFERENCES `detalleventa` (`idDetVenta`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fkVentaVend` FOREIGN KEY (`idVendedor`) REFERENCES `vendedores` (`idVendedor`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
