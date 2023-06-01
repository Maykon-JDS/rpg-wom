CREATE DATABASE teste;

use teste;

CREATE TABLE mestre(
    id_mestre INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255)
);

CREATE TABLE jogador(
    id_jogador INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255)
);

CREATE TABLE personagem(
    id_personagem INT PRIMARY KEY AUTO_INCREMENT,
    fk_jogador INT,
    fk_raca INT,
    nome_personagem VARCHAR(255) NOT NULL,
    vida INT NOT NULL,
    forca INT NOT NULL,
    agilidade INT NOT NULL,
    inteligencia INT NOT NULL,
    defesa INT NOT NULL,
    mana INT NOT NULL,
    nivel INT NOT NULL,
    ativo BOOLEAN NOT NULL
);

CREATE TABLE raca(
    id_raca INT PRIMARY KEY AUTO_INCREMENT,
    tipo VARCHAR(255)
);

CREATE TABLE habilidade(
    id_habilidade INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    forca INT NOT NULL,
    agilidade INT NOT NULL,
    defesa INT NOT NULL,
    vida INT NOT NULL,
    mana INT NOT NULL,
    descricao_habilidade VARCHAR(255)
);

CREATE TABLE r_personagem_habilidades(
    id_relacionamento INT PRIMARY KEY AUTO_INCREMENT,
    fk_personagem INT,
    fk_habilidade INT
);

CREATE TABLE equipamento(
    id_equipamento INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    descricao_habilidade VARCHAR(255) NOT NULL,
    forca INT NOT NULL,
    agilidade INT NOT NULL,
    defesa INT NOT NULL,
    vida INT NOT NULL,
    mana INT NOT NULL
);

CREATE TABLE r_personagem_equipamentos(
    id_relacionamento INT PRIMARY KEY AUTO_INCREMENT,
    fk_personagem INT,
    fk_equipamento INT
);


ALTER TABLE personagem
    ADD CONSTRAINT fk_jogador_personagem_constraint
    FOREIGN KEY (fk_jogador) REFERENCES jogador(id_jogador);

ALTER TABLE personagem
    ADD CONSTRAINT fk_raca_raca_constraint
    FOREIGN KEY (fk_raca) REFERENCES raca(id_raca);

ALTER TABLE r_personagem_habilidades
    ADD CONSTRAINT fk_personagem_r_personagem_habilidades 
    FOREIGN KEY (fk_personagem) REFERENCES personagem(id_personagem);

ALTER TABLE r_personagem_habilidades
    ADD CONSTRAINT fk_habilidade_r_personagem_habilidades
    FOREIGN KEY (fk_habilidade) REFERENCES habilidade(id_habilidade);

ALTER TABLE r_personagem_equipamentos
    ADD CONSTRAINT fk_personagem_r_personagem_equipamentos
    FOREIGN KEY (fk_personagem) REFERENCES personagem(id_personagem);

ALTER TABLE r_personagem_equipamentos
    ADD CONSTRAINT fk_equipamento_r_personagem_equipamentos
    FOREIGN KEY (fk_equipamento) REFERENCES equipamento(id_equipamento);



INSERT INTO jogador VALUES(null, "Maykon", "Maykon@gmail.com", "123");
INSERT INTO raca VALUES(null, "lutador");
INSERT INTO personagem VALUES(null, 1, 1, "Personagem Teste", 10, 10, 10, 10, 10, 10, 1, 1);
INSERT INTO habilidade VALUE(null, "Socar", 10, 0, 0, 0, 0, 0);
INSERT INTO r_personagem_habilidades VALUE(1,1);

select J.nome, J.email, P.nome_personagem as "nome do personagem", R.tipo as "raça", P.vida, P.forca,  P.mana, P.defesa, P.inteligencia,P.nivel, P.ativo as "Conta Ativa?", H.nome as "Habilidade"
from jogador J
inner join personagem P on J.id_jogador = P.fk_jogador
inner join raca R on P.fk_raca = R.id_raca
inner join r_personagem_habilidades rH on rH.fk_personagem = P.id_personagem 
inner join habilidade H on H.id_habilidade = rH.fk_habilidade;