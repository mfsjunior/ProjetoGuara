
CREATE DATABASE cadastro ;
use cadastro;

CREATE TABLE usuario
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);