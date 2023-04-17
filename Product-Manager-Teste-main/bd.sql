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

CREATE TABLE PRODUCTS
(
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(500) NOT NULL,
    price decimal(18,2) NOT NULL,
    amount int(11) NOT NULL,
    city int(11) NOT NULL,
    description varchar(500) DEFAULT NULL,
    created datetime NOT NULL,
    modified datetime DEFAULT NULL,
    CONSTRAINT prodpk PRIMARY KEY (id),
    CONSTRAINT prodfk FOREIGN KEY (city) REFERENCES CITYS (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE ACCESS_LVL (
    id int(11) NOT NULL,
    nome varchar(100) NOT NULL,
    descricao varchar(500) NOT NULL,
    CONSTRAINT access_pk PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE USERS (
    id int(11) NOT NULL,
    name varchar(100) NOT NULL,
    email varchar(200) NOT NULL,
    pwd varchar(500) NOT NULL,
    access_lvl int(11) NOT NULL,
    created datetime NOT NULL,
    modified datetime DEFAULT NULL,
    CONSTRAINT userpk PRIMARY KEY (id),
    CONSTRAINT userfk FOREIGN KEY (access_lvl) REFERENCES access_lvl (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;





INSERT INTO access_lvl VALUES
(1, 'SuperAdm', 'Acesso a todo o conteudo'),
(2, 'Adm', 'Acesso parcial ao conteudo');

INSERT INTO users VALUES
(1, 'Pedro', 'pedro@email.com', '$2y$10$Q2iHm7PqE8BbPF9E3nnoguc2UnD.OU3UF3L5XF9p/QsnYTuZAR5E.', 1, '2020-09-21 04:18:39', NULL);

INSERT INTO citys VALUES
(1, 'Uberlandia', 'MG', NULL, '2020-09-16 02:21:53', NULL),
(2, 'Uberaba', 'MG', NULL, '2020-09-16 02:22:13', NULL),
(3, 'Sao Paulo', 'SP', NULL, '2020-09-16 02:23:13', NULL),
(4, 'Ribeirao Preto', 'SP', NULL, '2020-09-16 02:22:50', NULL),
(5, 'Manaus', 'AM', NULL, '2020-09-16 02:24:50', NULL);


INSERT INTO PRODUCTS VALUES
(1, 'Cadeira', '20.00', 1000, 1, '0', '2020-09-16 07:52:41', NULL),
(2, 'Suporte de partitura', '10.00', 1000, 1, '0', '2020-09-17 00:14:44', NULL),
(3, 'Notebook', '2000.00', 1000, 5, '0', '2020-09-16 07:53:00', NULL),
(4, 'Cadeira de rodinha', '2.00', 2, 2, '0', '2020-09-19 09:05:18', NULL),
(6, 'Camiseta', '30.00', 1000, 3, '0', '2020-09-16 07:59:51', NULL),
(7, 'Caneta', '1.00', 1000, 1, '0', '2020-09-16 08:07:17', NULL),
(8, 'Lapis', '1.00', 1000, 1, '0', '2020-09-16 08:11:04', NULL);