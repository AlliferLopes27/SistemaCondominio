CREATE DATABASE condominio;

USE condominio;

CREATE TABLE usuarios (
	id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE moradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    rg VARCHAR(20) NOT NULL,
    cpf VARCHAR(20) NOT NULL,
    nascimento DATE NOT NULL,
    apartamento INT NOT NULL,
    bloco CHAR(1) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone VARCHAR(20) NOT NULL
);

