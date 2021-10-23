create database sis_gestao_esc_lhanguene;

create table aluno(
cod_aluno int not null,
aluno_nome varchar(30),
aluno_apelido varchar(20),
aluno_data_nasc date,
aluno_bairro varchar(30),
aluno_documento enum('BI','NUIT', 'DIRE'),
aluno_nr_documento varchar(30),
aluno_telf1 double,
aluno_telf2 double,
aluno_email varchar(40),
aluno_provinvia varchar(30),
aluno_cidade varchar(30),
primary key(cod_aluno)
);
CREATE Table professor(
cod_professor int not null,
professor_nome varchar(30),
professor_apelido varchar(20),
professor_data_nasc date,
professor_bairro varchar(30),
professor_documento enum('BI','NUIT', 'DIRE'),
professor_nr_documento varchar(30),
professor_telf1 double,
professor_telf2 double,
professor_email varchar(40),
professor_provinvia varchar(30),
professor_cidade varchar(30),
professor_nivel_academico varchar(30),
professor_data_admissao date,
professor_area_formacao varchar(30),
primary key(cod_professor)
);
alter table professor
add column professor_username varchar(30),
add column professor_senha varchar(20); 

create table emcaregado(
cod_encaregado int not null,
encaregado_nome varchar(30),
encaregado_apelido varchar(20),
encaregado_data_nasc date,
encaregado_bairro varchar(30),
encaregado_documento enum('BI','NUIT', 'DIRE'),
encaregado_nr_documento varchar(30),
encaregado_telf1 double,
encaregado_telf2 double,
encaregado_email varchar(40),
encaregado_provinvia varchar(30),
encaregado_cidade varchar(30),
encaregado_username varchar(30),
encaregado_senha varchar(20),
encaregado_ocupacao varchar(30),
primary key(cod_encaregado)
);

Create table administrador(
cod_administrador int not null,
administrador_nome varchar(30),
administrador_apelido varchar(20),
administrador_data_nasc date,
administrador_bairro varchar(30),
administrador_documento enum('BI','NUIT', 'DIRE'),
administrador_nr_documento varchar(30),
administrador_telf1 double,
administrador_telf2 double,
administrador_email varchar(40),
administrador_provinvia varchar(30),
administrador_cidade varchar(30),
administrador_username varchar(30),
administrador_senha varchar(20),
administrador_formacao varchar(30),
primary key(cod_administrador)
);

CREATE TABLE classe(
cod_classe int not null,
designacao_classe varchar(20),
primary key(cod_classe)
);

CREATE TABLE Turma(
cod_turma int not null,
nr_estudantes int,
nr_sala int,
primary key(cod_turma)
);

CREATE TABLE disciplina(
cod_disciplina int not null,
nome_disciplina varchar(30),
tipo_disciplina enum('curicular', 'extra curicular'),
primary key(cod_disciplina)
);

CREATE TABLE reunicao(
cod_reuniao int not null,
data_reuniao date,
duracao int,
assunto text, 
primary key(cod_reuniao)
);

CREATE TABLE matricula(
cod_matricula int not null,
data_matricula date,
classe_cod int,
aluno_cod int,
primary key(cod_matricula),
constraint fk_matricula1 foreign key(classe_cod) references classe(cod_classe),
constraint fk_matricula2 foreign key(aluno_cod) references aluno(cod_aluno));

CREATE TABLE estuda(
cod_turma int not null,
designacao_turma varchar(10),
aluno_cod int,
turma_cod int,
primary key(cod_turma)
);
alter table aluno
add constraint fk_aluno1 foreign key(encaregado_cod) references emcaregado(cod_encaregado);
alter table estuda
add column datainicio date,
add column datafim date ;
alter table estuda
add constraint fk_estuda1 foreign key(aluno_cod) references aluno(cod_aluno),
add constraint fk_estuda2 foreign key(turma_cod) references turma(cod_turma);

create table professor_leciona(
cod_professor_leciona int not null,
professor_cod int,
turma_cod int,
primary key(cod_professor_leciona));

alter table professor_leciona
add constraint professor_leciona1 foreign key(professor_cod) references professor(cod_professor),
add constraint professor_leciona2 foreign key(turma_cod) references turma(cod_turma);

create table professor_disciplina(
cod_professor_disciplina int not null,
disciplina_cod int,
professor_cod int,
primary key(cod_professor_disciplina)
);
alter table professor_disciplina
add constraint professor_disciplina1 foreign key(disciplina_cod) references disciplina(cod_disciplina),
add constraint professor_disciplina2 foreign key(professor_cod) references professor(cod_professor);

create table disciplina_classe(
cod_disciplina_classe int not null,
classe_cod int,
disciplina_cod int,
primary key(cod_disciplina_classe),
constraint disciplina_classe1 foreign key(classe_cod) references classe(cod_classe),
constraint disciplina_classe2 foreign key(disciplina_cod)references disciplina(cod_disciplina)
);

alter table turma 
add constraint turma3 foreign key(classe_cod) references classe(cod_classe);

create table solicitacao(
cod_solicitacao int not null,
professor_cod int,
reuniao_cod int,
primary key(cod_solicitacao)
);
alter table solicitacao 
add column autor varchar(20);

alter table reunicao
add column professor_cod int,
add constraint fk_reuniao3 foreign key(professor_cod) references professor(cod_professor);

create table encaregado_recebe(
encaregado_recebe int not null,
encaregado_cod int,
solicitacao_cod int,
primary key(encaregado_recebe),
constraint fk_encargado_recebe foreign key(encaregado_cod) references emcaregado(cod_encaregado),
constraint fk_encaregado_recebe2 foreign key(solicitacao_cod) references solicitacao(cod_solicitacao)
);

create table encaregado_participa_reuniao(
cod_encaregado_participa_reuniao int not null,
encaregado_cod int,
reuniao_cod int,
primary key(cod_encaregado_participa_reuniao ),
constraint encaregado_participa1 foreign key(encaregado_cod)references emcaregado(cod_encaregado),
constraint encaregado_participa2 foreign key(reuniao_cod)references reunicao(cod_reuniao)
);


select *from usuarios;
create table usuarios(
id_usuarios int not null auto_increment, 
nome_usuario varchar(50),
senha varchar(20),
primary key(id_usuarios)
);
select *from usuarios;
SELECT id_usuarios FROM usuarios WHERE nome_usuario='israel' AND senha=1960;


