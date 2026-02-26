CREATE DATABASE sistema_condominio;

USE sistema_condominio;

CREATE TABLE tab_usuarios (
	id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    senha VARCHAR(20) NOT NULL
);

CREATE TABLE tab_moradores (
    id_morador INT AUTO_INCREMENT PRIMARY KEY,
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
	id_correspondencia INT AUTO_INCREMENT PRIMARY KEY,
	id_moradores_correspondencia INT NOT NULL,
    tipo VARCHAR(30) NOT NULL,
    data_hora DATETIME NOT NULL,
	CONSTRAINT FK_id_moradores_correspondencia FOREIGN KEY (id_moradores_correspondencia) REFERENCES tab_moradores (id_morador)
);

CREATE TABLE tab_reservas (
	id_reserva INT AUTO_INCREMENT PRIMARY KEY,
	id_moradores_reserva INT NOT NULL,
    reserva VARCHAR(30) NOT NULL,
    data_reserva DATE NOT NULL,
    CONSTRAINT FK_id_moradores_reserva FOREIGN KEY (id_moradores_reserva) REFERENCES tab_moradores (id_morador)
);

CREATE TABLE tab_servicos (
    id_servico INT AUTO_INCREMENT PRIMARY KEY,
    servico VARCHAR(255) NOT NULL,
    prestador VARCHAR(255) NOT NULL,
    cnpj VARCHAR(20) NOT NULL,
    data_servico DATE NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    descricao VARCHAR(255) NOT NULL
);