CREATE TABLE PRODUCTS
(
  	id int(11) NOT NULL AUTO_INCREMENT,
  	name varchar(500) NOT NULL,
  	price decimal(18,2) NOT NULL,
  	city int(11) NOT NULL,
  	description varchar(500) DEFAULT NULL,
  	created datetime NOT NULL,
  	modified datetime DEFAULT NULL,
  	CONSTRAINT prodpk PRIMARY KEY (id),
  	CONSTRAINT prodfk FOREIGN KEY (city) REFERENCES CITYS (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE CITYS
(
  	id int(11) NOT NULL,
  	nome varchar(500) NOT NULL,
  	uf varchar(5) NOT NULL,
  	total_hab int(11) DEFAULT NULL,
  	created datetime NOT NULL,
  	modified datetime DEFAULT NULL,
  	CONSTRAINT citypk PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO PRODUCTS VALUES
(1, 'Cadeira', '20.00', 1000, 1, '0', '2020-09-16 07:52:41', NULL),
(2, 'Suporte de partitura', '10.00', 1000, 1, '0', '2020-09-17 00:14:44', NULL),
(3, 'Notebook', '2000.00', 1000, 5, '0', '2020-09-16 07:53:00', NULL),
(4, 'Cadeira de rodinha', '2.00', 2, 2, '0', '2020-09-19 09:05:18', NULL),
(6, 'Camiseta', '30.00', 1000, 3, '0', '2020-09-16 07:59:51', NULL),
(7, 'Caneta', '1.00', 1000, 1, '0', '2020-09-16 08:07:17', NULL),
(8, 'Lapis', '1.00', 1000, 1, '0', '2020-09-16 08:11:04', NULL),


CREATE TABLE ACCESS_LVL (
  id int NOT NULL AUTO_INCREMENT,
    nome varchar(100) NOT NULL,
    descricao varchar(500) NOT NULL,
    CONSTRAINT accesspk PRIMARY KEY(id)
);

CREATE TABLE USERS (
  id int NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    email varchar(200) NOT NULL,
    pwd varchar(500) NOT NULL,
    access_lvl int NOT NULL,
    created datetime NOT NULL,
    modified datetime,
    CONSTRAINT userpk PRIMARY KEY(id),
    CONSTRAINT userfk FOREIGN KEY(access_lvl) REFERENCES (id)
    
)


INSERT INTO USERS VALUES
(1, 'Pedro', 'pedro@email.com', '$2y$10$NxTl6IByvk0axUg1z9x3kuAZlc7DJjJFLYGzEoQM..Ad/R4rwGS1C', 1, '2020-09-16 07:52:41', NULL),