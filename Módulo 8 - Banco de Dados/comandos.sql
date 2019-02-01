CREATE DATABASE nome_banco;

INSERT INTO nome_tabela SET nome = "thaylan", senha = '123', data_nascimento = '1997-07-15';

SELECT * FROM usuarios 
WHERE (email = 'suporte@b7web.com.br' AND senha = '999') OR email = 'fulano@hotmail.com';

coluna temporaria
SELECT *, (id + 10) as soma FROM usuarios;
SELECT *, (id + 10) as soma FROM usuarios HAVING soma < 13;

ASC, DESC

SELECT * FROM usuarios
WHERE ID > 0
ORDER BY nome DESC
LIMIT 1, 2; PULA UM E SELECIONA 2

CREATE TABLE nome_tabela (

    id int auto_increment,
    nome varchar(30) not null,
    salario int,
    primary key(id),
    constraint nome_constraint_fk foreign key(salario) references nome_tabela(salario)
);

constraint nome_constraint_fk foreign key(faixa_salarial) references faixas(id)