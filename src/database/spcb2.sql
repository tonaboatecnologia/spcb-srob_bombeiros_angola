-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE Ocorrencias_ClinicoTraumasDiversos (
Id_ClinicoTD Número(4) PRIMARY KEY,
Nome Número(4),
idade Número(4),
local_ocorrencia Número(4),
motivo_ativacao Número(4),
acordada Número(4),
respirando Número(4),
sangramento Número(4),
fraturas_visiveis Número(4),
Data_criação Número(4),
date_modificacao Número(4)
)

CREATE TABLE Endereco_ocorrenca (
Id_endereco Número(4) PRIMARY KEY,
Cidade Número(4),
Bairro Número(4),
Rua Número(4),
Referencia Número(4),
Data_criacao Número(4)
)

CREATE TABLE Ocorrencias_Obstretico (
Id_aciedente_obstretico Número(4) PRIMARY KEY,
idade_gestante Número(4),
tempo_gestante Número(4),
primeira_gravidez Número(4),
ha_contracoes Número(4),
Data_criação Número(4),
perda_sange Número(4),
date_modificacao Número(4)
)

CREATE TABLE Ocorrencias_Incendio (
Id_aciedente_incendio Número(4) PRIMARY KEY,
Objecto_queimado Número(4),
Edificio_proximo Número(4),
Data_criação Número(4)
)

CREATE TABLE Ocoorrencias_Acidentes_Transito (
Id_aciedente_transito Número(4) PRIMARY KEY,
veiculos_envolvidos Número(4),
Qtd_Veiculos_envolvidos Número(4),
Preso_algo Número(4),
Produtos_perigosos Número(4),
Data_criação Número(4)
)

CREATE TABLE Equipes (
Id_equipe Número(4) PRIMARY KEY,
Id_Bombeiro Número(4),
Id_Viaturas Número(4)
)

CREATE TABLE Controle_de_Horarios_de_viaturas (
Id_chv Número(4) PRIMARY KEY,
tipo_deslocamento Número(4),
data_hora Número(4),
Longitude Número(4),
guarnicoes Número(4),
Latitude Número(4),
observacoes Número(4),
Data_criacao Número(4),
Data_modificacao Número(4)
)

CREATE TABLE Solicitante (
IdSolicitante Número(4) PRIMARY KEY,
Nome Número(4),
Nif Número(4),
Telefone Número(4),
Email Número(4),
Data_Criacao Número(4),
relato Número(4),
Id_endereco Número(4),
FOREIGN KEY(Id_endereco) REFERENCES Endereco_ocorrenca (Id_endereco)
)

CREATE TABLE Situacao_vitimas (
Id_vitimas_situacao Número(4) PRIMARY KEY,
Febril Número(4),
Consciente Número(4),
Orientado Número(4),
Medida_Pupilar Número(4),
Imobilizacoes_efectuadas Número(4),
Pressao-Arterial Número(4),
Saturacao_Oxigenio Número(4),
BPM Número(4),
Procedimentos_realizados Número(4),
quantidade_vitima Número(4),
Id_DadosVitima Número(4)
)

CREATE TABLE Detalhes_Ocorrencia (
Id_Detalhes_ocorrencia Número(4) PRIMARY KEY,
Horario_inicio Número(4),
local_ocorrencia Número(4),
gravidade_ocorrencia Número(4),
Estado Número(4),
Data_criacao Número(4),
Id_Solicitante Número(4),
Id_ocorrencia Número(4),
Id_apoios Número(4),
Id_Viaturas Número(4),
Id_Atendimentos Número(4),
FOREIGN KEY(Id_Solicitante) REFERENCES Solicitante (IdSolicitante)
)

CREATE TABLE Atendimentos (
Id_Atendimentos Número(4) PRIMARY KEY,
HorarioChegada Número(4),
HorarioInicio Número(4),
HorarioTermino Número(4),
ResumoAtendimento Número(4),
Id_Equipes Número(4),
Id_Viaturas Número(4),
Data_Criacao Número(4),
FOREIGN KEY(Id_Equipes) REFERENCES Equipes (Id_equipe)
)

CREATE TABLE Tipo_Ocorrencia (
Id_tipoOcorrencia Número(4) PRIMARY KEY,
Nome Número(4),
Id_ClinicoTD Número(4),
Id_Acidente Número(4),
Id_obtrectico Número(4),
Id_Incendio Número(4),
FOREIGN KEY(Id_ClinicoTD) REFERENCES Ocorrencias_ClinicoTraumasDiversos (Id_ClinicoTD),
FOREIGN KEY(Id_Acidente) REFERENCES Ocoorrencias_Acidentes_Transito (Id_aciedente_transito),
FOREIGN KEY(Id_obtrectico) REFERENCES Ocorrencias_Obstretico (Id_aciedente_obstretico),
FOREIGN KEY(Id_Incendio) REFERENCES Ocorrencias_Incendio (Id_aciedente_incendio)
)

CREATE TABLE Ficha_Vitima_DdaosOcorrencia (
Id_Ficha_vitimasdadosocorrencia Número(4) PRIMARY KEY,
Uso_cinto Número(4),
Uso_Capacete Número(4),
Escala_CIPE Número(4),
Abertura_Ocular Número(4),
Melhor_RespostaVerbal Número(4),
Obito Número(4),
Id_Endereco Número(4),
Id_Situacao Número(4),
Id_Dados Número(4),
FOREIGN KEY(Id_Endereco) REFERENCES Endereco_ocorrenca (Id_endereco),
FOREIGN KEY(Id_Situacao) REFERENCES Situacao_vitimas (Id_vitimas_situacao)
)

CREATE TABLE Orgaos de apoio (
Id_Orgaos Número(4) PRIMARY KEY,
Nome Número(4),
Telefone Número(4),
atendente Número(4),
DataHora Número(4),
Data_criacao Número(4),
Id_Oacidente Número(4),
Id_Clinicotd Número(4),
Id_Incendio Número(4),
Id_Obstretico Número(4),
FOREIGN KEY(Id_Oacidente) REFERENCES Ocoorrencias_Acidentes_Transito (Id_aciedente_transito),
FOREIGN KEY(Id_Clinicotd) REFERENCES Ocorrencias_ClinicoTraumasDiversos (Id_ClinicoTD),
FOREIGN KEY(Id_Incendio) REFERENCES Ocorrencias_Incendio (Id_aciedente_incendio),
FOREIGN KEY(Id_Obstretico) REFERENCES Ocorrencias_Obstretico (Id_aciedente_obstretico)
)

CREATE TABLE Viaturas (
Id_viaturas Número(4) PRIMARY KEY,
Marca Número(4),
Modelo Número(4),
Cor Número(4),
Matricula Número(4),
Data_criacao Número(4),
Id_equipes Número(4),
Id_chv Número(4),
Id_Atendimentos Número(4),
Id_DetalhesOcorrencia Número(4),
FOREIGN KEY(Id_equipes) REFERENCES Equipes (Id_equipe),
FOREIGN KEY(Id_chv) REFERENCES Controle_de_Horarios_de_viaturas (Id_chv),
FOREIGN KEY(Id_Atendimentos) REFERENCES Atendimentos (Id_Atendimentos),
FOREIGN KEY(Id_DetalhesOcorrencia) REFERENCES Detalhes_Ocorrencia (Id_Detalhes_ocorrencia)
)

CREATE TABLE Bombeiros (
Id_Bmbeiros Número(4) PRIMARY KEY,
NIP Número(4),
Email Número(4),
Senha Número(4),
Nome Número(4),
Foto Número(4),
Endereco Número(4),
Patente Número(4),
Cargo Número(4),
Permissao Número(4),
Estado Número(4),
Data_Criacao Número(4),
Data_modificaco Número(4)
)

CREATE TABLE Vitimas_DadosBasicos (
Id_vitimas_dadosbasicos Número(4) PRIMARY KEY,
Nome Número(4),
Idade Número(4),
Genero Número(4),
Cidade Número(4),
BI_Cedula Número(4),
Telefone Número(4),

)

ALTER TABLE Equipes ADD FOREIGN KEY(Id_Bombeiro) REFERENCES Bombeiros (Id_Bmbeiros)
ALTER TABLE Equipes ADD FOREIGN KEY(Id_Viaturas) REFERENCES Viaturas (Id_viaturas)
ALTER TABLE Situacao_vitimas ADD FOREIGN KEY(Id_DadosVitima) REFERENCES Vitimas_DadosBasicos (Id_vitimas_dadosbasicos)
ALTER TABLE Detalhes_Ocorrencia ADD FOREIGN KEY(Id_ocorrencia) REFERENCES Ficha_Vitima_DdaosOcorrencia (Id_Ficha_vitimasdadosocorrencia)
ALTER TABLE Detalhes_Ocorrencia ADD FOREIGN KEY(Id_apoios) REFERENCES Orgaos de apoio (Id_Orgaos)
ALTER TABLE Detalhes_Ocorrencia ADD FOREIGN KEY(Id_Viaturas) REFERENCES Tipo_Ocorrencia (Id_tipoOcorrencia)
ALTER TABLE Detalhes_Ocorrencia ADD FOREIGN KEY(Id_Atendimentos) REFERENCES Atendimentos (Id_Atendimentos)
ALTER TABLE Atendimentos ADD FOREIGN KEY(Id_Viaturas) REFERENCES Viaturas (Id_viaturas)
ALTER TABLE Ficha_Vitima_DdaosOcorrencia ADD FOREIGN KEY(Id_Dados) REFERENCES Ficha_Vitima_DdaosOcorrencia (Id_Ficha_vitimasdadosocorrencia)
