-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2023 a las 04:42:14
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
-- Base de datos: `company`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_getDatosPaginacion` ()   SELECT e.fname, e.lname, e.ssn, e.bdate, e.address, d.dname
FROM employee AS e INNER JOIN department AS d ON e.dno = d.dnumber
ORDER BY lname, fname$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_getDepartamentos` ()   select Dnumber, Dname from department$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department`
--

CREATE TABLE `department` (
  `Dname` varchar(15) NOT NULL,
  `Dnumber` int(11) NOT NULL,
  `Mgr_ssn` char(9) NOT NULL,
  `Mgr_start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `department`
--

INSERT INTO `department` (`Dname`, `Dnumber`, `Mgr_ssn`, `Mgr_start_date`) VALUES
('Headquarters', 1, '888665555', '1971-06-19'),
('Administration', 4, '987654321', '1985-01-01'),
('Research', 5, '333445555', '1978-05-22'),
('Software', 6, '111111100', '1999-05-15'),
('Hardware', 7, '444444400', '1998-05-15'),
('Sales', 8, '555555500', '1997-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependent`
--

CREATE TABLE `dependent` (
  `Essn` char(9) NOT NULL,
  `Dependent_name` varchar(15) NOT NULL,
  `Sex` char(1) DEFAULT NULL,
  `Bdate` date DEFAULT NULL,
  `Relationship` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `dependent`
--

INSERT INTO `dependent` (`Essn`, `Dependent_name`, `Sex`, `Bdate`, `Relationship`) VALUES
('123456789', 'Alice', 'F', '1978-12-31', 'Daughter'),
('123456789', 'Elizabeth', 'F', '1957-05-05', 'Spouse\r'),
('123456789', 'Michael', 'M', '1978-01-01', 'Son\r'),
('333445555', 'Alice', 'F', '1976-04-05', 'Daughter'),
('333445555', 'Joy', 'F', '1948-05-03', 'Spouse\r'),
('333445555', 'Theodore', 'M', '1973-10-25', 'Son\r'),
('444444400', 'Johnny', 'M', '1997-04-04', 'Son\r'),
('444444400', 'Tommy', 'M', '1999-06-07', 'Son\r'),
('444444401', 'Chris', 'M', '1969-04-19', 'Spouse\r'),
('444444402', 'Alec', 'M', '1964-02-14', 'Spouse\r'),
('987654321', 'Abner', 'M', '1932-02-29', 'Spouse\r');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dept_locations`
--

CREATE TABLE `dept_locations` (
  `Dnumber` int(11) NOT NULL,
  `Dlocation` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `dept_locations`
--

INSERT INTO `dept_locations` (`Dnumber`, `Dlocation`) VALUES
(1, 'Houston\r'),
(4, 'Stafford\r'),
(5, 'Bellaire\r'),
(5, 'Houston\r'),
(5, 'Sugarland\r'),
(6, 'Atlanta\r'),
(6, 'Sacramento\r'),
(7, 'Milwaukee\r'),
(8, 'Chicago\r'),
(8, 'Dallas\r'),
(8, 'Miami\r'),
(8, 'Philadephia\r'),
(8, 'Seattle\r');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee`
--

CREATE TABLE `employee` (
  `Fname` varchar(15) NOT NULL,
  `Minit` char(1) DEFAULT NULL,
  `Lname` varchar(15) NOT NULL,
  `Ssn` char(9) NOT NULL,
  `Bdate` date DEFAULT NULL,
  `Address` varchar(35) DEFAULT NULL,
  `Sex` char(1) DEFAULT NULL,
  `Salary` decimal(10,2) DEFAULT NULL,
  `Super_ssn` char(9) DEFAULT NULL,
  `Dno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `employee`
--

INSERT INTO `employee` (`Fname`, `Minit`, `Lname`, `Ssn`, `Bdate`, `Address`, `Sex`, `Salary`, `Super_ssn`, `Dno`) VALUES
('Jared', 'D', 'James', '111111100', '1966-10-10', '123 Peachtree, Atlanta, GA', 'M', '85000.00', NULL, 6),
('Jon', 'C', 'Jones', '111111101', '1967-11-14', '111 Allgood, Atlanta, GA', 'M', '45000.00', '111111100', 6),
('Justin', NULL, 'Mark', '111111102', '1966-01-12', '2342 May, Atlanta, GA', 'M', '40000.00', '111111100', 6),
('Brad', 'C', 'Knight', '111111103', '1968-02-13', '176 Main St., Atlanta, GA', 'M', '44000.00', '111111100', 6),
('John', 'B', 'Smith', '123456789', '1955-01-09', '731 Fondren, Houston, TX', 'M', '30000.00', '333445555', 5),
('Evan', 'E', 'Wallis', '222222200', '1958-01-16', '134 Pelham, Milwaukee, WI', 'M', '92000.00', NULL, 7),
('Josh', 'U', 'Zell', '222222201', '1954-05-22', '266 McGrady, Milwaukee, WI', 'M', '56000.00', '222222200', 7),
('Andy', 'C', 'Vile', '222222202', '1944-06-21', '1967 Jordan, Milwaukee, WI', 'M', '53000.00', '222222200', 7),
('Tom', 'G', 'Brand', '222222203', '1966-12-16', '112 Third St, Milwaukee, WI', 'M', '62500.00', '222222200', 7),
('Jenny', 'F', 'Vos', '222222204', '1967-11-11', '263 Mayberry, Milwaukee, WI', 'F', '61000.00', '222222201', 7),
('Chris', 'A', 'Carter', '222222205', '1960-03-21', '565 Jordan, Milwaukee, WI', 'F', '43000.00', '222222201', 7),
('Kim', 'C', 'Grace', '333333300', '1970-10-23', '6677 Mills Ave, Sacramento, CA', 'F', '79000.00', NULL, 6),
('Jeff', 'H', 'Chase', '333333301', '1970-01-07', '145 Bradbury, Sacramento, CA', 'M', '44000.00', '333333300', 6),
('Franklin', 'T', 'Wong', '333445555', '1945-12-08', '638 Voss, Houston, TX', 'M', '40000.00', '888665555', 5),
('Alex', 'D', 'Freed', '444444400', '1950-10-09', '4333 Pillsbury, Milwaukee, WI', 'M', '89000.00', NULL, 7),
('Bonnie', 'S', 'Bays', '444444401', '1956-06-19', '111 Hollow, Milwaukee, WI', 'F', '70000.00', '444444400', 7),
('Alec', 'C', 'Best', '444444402', '1966-06-18', '233 Solid, Milwaukee, WI', 'M', '60000.00', '444444400', 7),
('Sam', 'S', 'Snedden', '444444403', '1977-07-31', '987 Windy St, Milwaukee, WI', 'M', '48000.00', '444444400', 7),
('Joyce', 'A', 'English', '453453453', '1962-07-31', '5631 Rice, Houston, TX', 'F', '25000.00', '333445555', 5),
('HAMANA', 'H', 'HAMANA', '464564897', '2001-01-01', 'DKFKF', 'M', '5959.00', NULL, 5),
('PILINGON', 'T', 'MIRINGON', '464984984', '2001-01-01', 'llll', 'M', '84848.00', NULL, 5),
('PILINGON', 'T', 'MIRINGON', '464984985', '2001-01-01', 'llll', 'M', '84848.00', NULL, 5),
('Luisa', 'F', 'Estrada', '498464983', '2004-01-01', 'kaka', 'M', '90.00', NULL, 4),
('Luisa', 'F', 'Estrada', '498464984', '2004-01-01', 'kaka', 'M', '90.00', NULL, 8),
('Batista', 'P', '1', '498494191', '2001-01-01', 'Lalo', 'M', '800000.00', NULL, 1),
('Alfonso', 'A', 'Nieto', '545645645', '2001-01-01', 'Tec', 'M', '50.00', NULL, 5),
('John', 'C', 'James', '555555500', '1975-06-30', '7676 Bloomington, Sacramento, CA', 'M', '81000.00', NULL, 6),
('Nandita', 'K', 'Ball', '555555501', '1969-04-16', '222 Howard, Sacramento, CA', 'M', '62000.00', '555555500', 6),
('Bob', 'B', 'Bender', '666666600', '1968-04-17', '8794 Garfield, Chicago, IL', 'M', '96000.00', NULL, 8),
('Jill', 'J', 'Jarvis', '666666601', '1966-01-14', '6234 Lincoln, Chicago, IL', 'F', '36000.00', '666666600', 8),
('Kate', 'W', 'King', '666666602', '1966-04-16', '1976 Boone Trace, Chicago, IL', 'F', '44000.00', '666666600', 8),
('Lyle', 'G', 'Leslie', '666666603', '1963-06-09', '417 Hancock Ave, Chicago, IL', 'M', '41000.00', '666666601', 8),
('Billie', 'J', 'King', '666666604', '1960-01-01', '556 Washington, Chicago, IL', 'F', '38000.00', '666666603', 8),
('Jon', 'A', 'Kramer', '666666605', '1964-08-22', '1988 Windy Creek, Seattle, WA', 'M', '41500.00', '666666603', 8),
('Ray', 'H', 'King', '666666606', '1949-08-16', '213 Delk Road, Seattle, WA', 'M', '44500.00', '666666604', 8),
('Gerald', 'D', 'Small', '666666607', '1962-05-15', '122 Ball Street, Dallas, TX', 'M', '29000.00', '666666602', 8),
('Arnold', 'A', 'Head', '666666608', '1967-05-19', '233 Spring St, Dallas, TX', 'M', '33000.00', '666666602', 8),
('Helga', 'C', 'Pataki', '666666609', '1969-03-11', '101 Holyoke St, Dallas, TX', 'F', '32000.00', '666666602', 8),
('Naveen', 'B', 'Drew', '666666610', '1970-05-23', '198 Elm St, Philadelphia, PA', 'M', '34000.00', '666666607', 8),
('Carl', 'E', 'Reedy', '666666611', '1977-06-21', '213 Ball St, Philadelphia, PA', 'M', '32000.00', '666666610', 8),
('Sammy', 'G', 'Hall', '666666612', '1970-01-11', '433 Main Street, Miami, FL', 'M', '37000.00', '666666611', 8),
('Red', 'A', 'Bacher', '666666613', '1980-05-21', '196 Elm Street, Miami, FL', 'M', '33500.00', '666666612', 8),
('Ramesh', 'K', 'Narayan', '666884444', '1952-09-15', '971 Fire Oak, Humble, TX', 'M', '38000.00', '333445555', 5),
('Claudia', 'V', 'Montiel', '84744444', '1999-01-01', 'Tec', 'M', '1000.00', NULL, 8),
('Prueba', 'P', 'Prueba', '849849645', '0000-00-00', 'afeawfw', 'M', '66556565.00', NULL, 4),
('Alfonso', 'A', 'Nieto', '84988498', '2001-03-27', 'Mexicali', 'M', '1000.00', NULL, 7),
('James', 'E', 'Borg', '888665555', '1970-11-10', '450 Stone, Houston, TX', 'M', '55000.00', NULL, 1),
('Jennifer', 'S', 'Wallace', '987654321', '1931-06-20', '291 Berry, Bellaire, TX', 'F', '43000.00', '888665555', 4),
('Ahmad', 'V', 'Jabbar', '987987987', '1959-03-29', '980 Dallas, Houston, TX', 'M', '25000.00', '987654321', 4),
('Alicia', 'J', 'Zelaya', '999887777', '1958-07-19', '3321 Castle, Spring, TX', 'F', '25000.00', '987654321', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE `project` (
  `Pname` varchar(18) NOT NULL,
  `Pnumber` int(11) NOT NULL,
  `Plocation` varchar(15) DEFAULT NULL,
  `Dnum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`Pname`, `Pnumber`, `Plocation`, `Dnum`) VALUES
('Product X', 1, 'Bellaire', 5),
('Product Y', 2, 'Sugarland', 5),
('Product Z', 3, 'Houston', 5),
('Computerization', 10, 'Stafford', 4),
('Reorganization', 20, 'Houston', 1),
('Newbenefits', 30, 'Stafford', 4),
('Operating Systems', 61, 'Jacksonville', 6),
('Database Systems', 62, 'Birmingham', 6),
('Middleware', 63, 'Jackson', 6),
('Inkjet Printers', 91, 'Phoenix', 7),
('Laser Printers', 92, 'LasVegas', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test`
--

CREATE TABLE `test` (
  `fname` text NOT NULL,
  `minit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `test`
--

INSERT INTO `test` (`fname`, `minit`) VALUES
('e', ''),
('e', ''),
('eminit=e', ''),
('e', 'e'),
('', 'e'),
('e', 'e'),
('A', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `works_on`
--

CREATE TABLE `works_on` (
  `Essn` char(9) NOT NULL,
  `Pno` int(11) NOT NULL,
  `Hours` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `works_on`
--

INSERT INTO `works_on` (`Essn`, `Pno`, `Hours`) VALUES
('111111100', 61, '40.0'),
('111111101', 61, '40.0'),
('111111102', 61, '40.0'),
('111111103', 61, '40.0'),
('123456789', 1, '32.5'),
('123456789', 2, '7.5'),
('222222200', 62, '40.0'),
('222222201', 62, '48.0'),
('222222202', 62, '40.0'),
('222222203', 62, '40.0'),
('222222204', 62, '40.0'),
('222222205', 62, '40.0'),
('333333300', 63, '40.0'),
('333333301', 63, '46.0'),
('333445555', 2, '10.0'),
('333445555', 3, '10.0'),
('333445555', 10, '10.0'),
('333445555', 20, '10.0'),
('444444400', 91, '40.0'),
('444444401', 91, '40.0'),
('444444402', 91, '40.0'),
('444444403', 91, '40.0'),
('453453453', 1, '20.0'),
('453453453', 2, '20.0'),
('555555500', 92, '40.0'),
('555555501', 92, '44.0'),
('666666601', 91, '40.0'),
('666666603', 91, '40.0'),
('666666604', 91, '40.0'),
('666666605', 92, '40.0'),
('666666606', 91, '40.0'),
('666666607', 61, '40.0'),
('666666608', 62, '40.0'),
('666666609', 63, '40.0'),
('666666610', 61, '40.0'),
('666666611', 61, '40.0'),
('666666612', 61, '40.0'),
('666666613', 61, '30.0'),
('666666613', 62, '10.0'),
('666666613', 63, '10.0'),
('666884444', 3, '40.0'),
('888665555', 20, '10.0'),
('987654321', 20, '15.0'),
('987654321', 30, '20.0'),
('987987987', 10, '35.0'),
('987987987', 30, '5.0'),
('999887777', 30, '30.0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dnumber`),
  ADD UNIQUE KEY `KE` (`Dname`),
  ADD KEY `department_fk_Mgr_ssn` (`Mgr_ssn`);

--
-- Indices de la tabla `dependent`
--
ALTER TABLE `dependent`
  ADD PRIMARY KEY (`Essn`,`Dependent_name`);

--
-- Indices de la tabla `dept_locations`
--
ALTER TABLE `dept_locations`
  ADD PRIMARY KEY (`Dnumber`,`Dlocation`);

--
-- Indices de la tabla `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Ssn`),
  ADD KEY `employee_fk_Super_ssn` (`Super_ssn`),
  ADD KEY `employee_fk_Dno` (`Dno`);

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Pnumber`),
  ADD UNIQUE KEY `Pname` (`Pname`),
  ADD KEY `project_fk_Dnum` (`Dnum`);

--
-- Indices de la tabla `works_on`
--
ALTER TABLE `works_on`
  ADD PRIMARY KEY (`Essn`,`Pno`),
  ADD KEY `works_on_fk_Pno` (`Pno`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_fk_Mgr_ssn` FOREIGN KEY (`Mgr_ssn`) REFERENCES `employee` (`Ssn`);

--
-- Filtros para la tabla `dependent`
--
ALTER TABLE `dependent`
  ADD CONSTRAINT `dependent_fk_Essn` FOREIGN KEY (`Essn`) REFERENCES `emloyee` (`Ssn`);

--
-- Filtros para la tabla `dept_locations`
--
ALTER TABLE `dept_locations`
  ADD CONSTRAINT `dept_locations_fk_Dnumber` FOREIGN KEY (`Dnumber`) REFERENCES `department` (`Dnumber`);

--
-- Filtros para la tabla `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_fk_Dno` FOREIGN KEY (`Dno`) REFERENCES `department` (`Dnumber`),
  ADD CONSTRAINT `employee_fk_Super_ssn` FOREIGN KEY (`Super_ssn`) REFERENCES `employee` (`Ssn`);

--
-- Filtros para la tabla `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_fk_Dnum` FOREIGN KEY (`Dnum`) REFERENCES `department` (`Dnumber`);

--
-- Filtros para la tabla `works_on`
--
ALTER TABLE `works_on`
  ADD CONSTRAINT `works_on_fk_Essn` FOREIGN KEY (`Essn`) REFERENCES `emloyee` (`Ssn`),
  ADD CONSTRAINT `works_on_fk_Pno` FOREIGN KEY (`Pno`) REFERENCES `project` (`Pnumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
