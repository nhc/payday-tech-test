-- put in ./dump directory 

USE lumen;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE Logger (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(255),
    query_month varchar(255),
    query_year varchar(255),
    payday varchar(255),
    bank_day varchar(255),
    ts integer
);


INSERT INTO `Logger` (`id`, `username`,`query_month`, `query_year`,`payday`, `bank_day`,`ts`) VALUES
(1, 'William', '1', '2018', 'Tue, 30th Jan 2018', 'Tue, 30th Jan 2018', 1517215845)

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;