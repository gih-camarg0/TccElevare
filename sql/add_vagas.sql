CREATE DATABASE add_vagas;

USE add_vagas;

CREATE TABLE vaga (
  id INT AUTO_INCREMENT PRIMARY KEY,
  funcao VARCHAR(100),
  cidade VARCHAR(100),
  estado
  atuacao TEXT,
  requisitos TEXT,
  informacoes TEXT,
  nivel VARCHAR(50),
  carga VARCHAR(50),
  setor VARCHAR(50)
);