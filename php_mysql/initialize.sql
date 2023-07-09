CREATE TABLE `student` (
    name varchar(255) NOT NULL,
    erp varchar(30) NOT NULL,
    email varchar(255) NOT NULL,
    gender varchar(5) NOT NULL,
    comment text,
    website varchar(255)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;