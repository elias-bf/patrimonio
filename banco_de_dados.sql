CREATE DATABASE appelias;


CREATE TABLE `bempatrimonial` (
  `numero` int(11) NOT NULL,
  `data_aquisicao` date NOT NULL,
  `descricao` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `valor_compra` decimal(12,2) NOT NULL,
  `departamento` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `sala` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `bempatrimonial` (`numero`, `data_aquisicao`, `descricao`, `valor_compra`, `departamento`, `sala`) VALUES
(1, '2017-03-06', 'Notebook ASUS i5, 6GB', '3500.00', '', 0),
(2, '2016-09-10', 'Impressora 3D', '8000.00', '', 0),
(3, '2018-01-25', 'iMac', '9500.00', '', 0),
(4, '2017-07-02', 'Desktop i7 - 16GB', '4700.00', '', 0),
(5, '2017-11-14', 'Armário de aço', '2800.00', '', 0);

-- --------------------------------------------------------



CREATE TABLE `orcamento` (
  `codigo` int(11) NOT NULL,
  `data` date NOT NULL,
  `prazo_dias` int(11) NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cod_os` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO orcamento (codigo, data, prazo_dias, valor, empresa, telefone, cod_os) VALUES
  (1, '2017-12-12', 5, '300.00', 'Conserta tudo informática', '(62) 8855-3311', 1);
INSERT INTO orcamento (codigo, data, prazo_dias, valor, empresa, telefone, cod_os) VALUES
  (2, '2017-12-13', 6, '250.00', 'Socorro informática', '(62) 9977-5566', 1);
INSERT INTO orcamento (codigo, data, prazo_dias, valor, empresa, telefone, cod_os) VALUES
  (3, '2017-12-13', 3, '320.00', 'Hospital dos computadores', '(62) 7733-2244', 1);
-- --------------------------------------------------------

CREATE TABLE `ordemservico` (
  `codigo` int(11) NOT NULL,
  `data_solicitacao` date NOT NULL,
  `descricao_defeito` varchar(500) NOT NULL,
  `data_conclusao` date DEFAULT NULL,
  `urgencia` tinyint(4) NOT NULL COMMENT '1-Baixa (meno preço, menor tempo); 2-Média (primeiro que seja menor ou igual ao tempo médio, e preço);3-Alta (menor tempo, menor preço)',
  `numero_bem` int(11) NOT NULL,
  `cod_orcamento_escolhido` int(11) DEFAULT NULL,
  `situacao` char(1) NOT NULL COMMENT 'A-Aberto; F-Fechada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO ordemservico (codigo, data_solicitacao, descricao_defeito, data_conclusao, urgencia, numero_bem, cod_orcamento_escolhido, situacao) VALUES
    (1, '2017-12-12', 'Fonte com problema', NULL, 1, 1, NULL, 'A');
INSERT INTO ordemservico (codigo, data_solicitacao, descricao_defeito, data_conclusao, urgencia, numero_bem, cod_orcamento_escolhido, situacao) VALUES
    (2, '2018-01-03', 'Aviso de problema com a memória', NULL, 2, 4, NULL, 'A');
INSERT INTO ordemservico (codigo, data_solicitacao, descricao_defeito, data_conclusao, urgencia, numero_bem, cod_orcamento_escolhido, situacao) VALUES
    (3, '2018-01-05', 'Fechadura danificada', NULL, 3, 5, NULL, 'A');

ALTER TABLE `bempatrimonial`
  ADD PRIMARY KEY (`numero`);

ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`codigo`);

ALTER TABLE `ordemservico`
  ADD PRIMARY KEY (`codigo`);

ALTER TABLE `orcamento`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `ordemservico`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
