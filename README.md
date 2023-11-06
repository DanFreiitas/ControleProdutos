# interativa



## Query para gerar a DB;
USE interativa;

CREATE TABLE IF NOT EXISTS fabricante (
  idfabricante INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nomeFabricante VARCHAR(45) NOT NULL,
  categoriaUm VARCHAR(45) NOT NULL,
  categoriaDois VARCHAR(45) NULL,
  categoriaTres VARCHAR(45) NULL
  ) ENGINE INNODB;


CREATE TABLE IF NOT EXISTS produto (
  idproduto INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nomeProduto VARCHAR(255) NOT NULL,
  fabricante VARCHAR(50) NULL,
  categoria VARCHAR(50) NULL,
  preco VARCHAR(50) NULL,
  fabricante_idfabricante INT NOT NULL,
  CONSTRAINT fk_produto_fabricante FOREIGN KEY (fabricante_idfabricante) REFERENCES fabricante (idfabricante)
  ) ENGINE InnoDB;
