CREATE DATABASE sistema_condominio;

USE sistema_condominio;

CREATE TABLE tab_usuarios (
	id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE tab_moradores (
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

CREATE TABLE tab_correspondencias (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_moradores INT NOT NULL,
    tipo VARCHAR(20) NOT NULL,
    datahora DATETIME NOT NULL,
	CONSTRAINT FK_id_moradores FOREIGN KEY (id_moradores) REFERENCES tab_moradores (id)
);