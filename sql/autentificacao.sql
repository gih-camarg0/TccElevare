CREATE DATABASE autentificacao;

USE autentificacao;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('pessoa_fisica', 'empresa') NOT NULL,
    documento VARCHAR(30),
    telefone VARCHAR(30),
    escolaridade VARCHAR(100),
    formacao VARCHAR(150),
    segmento VARCHAR(150),
    site VARCHAR(200),
    localizacao VARCHAR(150),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);