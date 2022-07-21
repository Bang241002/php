CREATE TABLE IF NOT EXISTS `employees`(
    `id` int (11) NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `address` varchar(255) NOT NULL,
    `salary` int(10) NOT NULL,
    PRIMARY KEY(`id`)
)ENGINE=InnoDB DEFAULT ChARSET=latin1 AUTO_INCREMENT=4;


INSERT INTO `employees` (`id`,`name`,`address`,`salary`) VALUES
(1, 'Roland Mendel', 'C/ Araquil, 67, Madrid' , 5000),
(2, 'Victoria Ashowrth', '35 King George, London' , 6500),
(3, 'Martin Blank', '25, Rue Lauriton, Paris', 8000);