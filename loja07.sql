 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'S',
  `endereco` varchar(150) NOT NULL,
  `cep` varchar(70) NOT NULL,
  `estado` varchar(70) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

 

INSERT INTO `cliente` (`id`, `nome`, `valor`, `ip`, `cpf`, `email`, `whatsapp`, `status`, `endereco`, `cep`, `estado`, `cidade`, `data`) VALUES
(3, 'Kayque Pereira', '266.00', '::1', '682.511.120-52', 'kayquepc@gmail.com', '(41)99999-9999', 'S', 'Rua 12, 2866000', '8445-600', '  RJ', 'Nova Friburgo', '2023-10-04 10:00:00');

 

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'N',
  `ip` varchar(255) NOT NULL,
  `numero_pedido` varchar(100) NOT NULL,
  `boleto` varchar(255) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

 

INSERT INTO `compras` (`id`, `foto`, `titulo`, `valor`, `total`, `id_cliente`, `status`, `ip`, `numero_pedido`, `boleto`, `data`) VALUES
(9, 'images/2023/06/2023-06-14-1686743004.jpg', 'Cupcake de flocos ', '17.00', '17.00', 3, 'S', '::1', '320142023', 'https://jsjsjddd.com', '2023-10-14');
 

  CREATE TABLE `produtos` (
    `id` int(11) NOT NULL,
    `capa` varchar(255) NOT NULL,
    `nome` varchar(150) NOT NULL,
    `valor` decimal(10,2) NOT NULL,
    `data` datetime NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

 

INSERT INTO `produtos` (`id`, `capa`, `nome`, `valor`, `data`) VALUES
(1, 'images/2023/05/2023-05-12-1683927702.png', 'Cupcake de flocos', '19', '2023-05-12 18:41:42'),
(2, 'images/2023/05/2023-05-12-1683928003.jpg', 'Cupcake de chocolate', '18', '2023-12-20 18:46:43'),
(3, 'images/2023/05/2023-05-12-1683927455.png', 'Cupcake de chocolate duplo', '16', '2023-02-02 16:40:43'),
(4, 'images/2023/05/2023-05-12-1683927491.png', 'Cupcake de chocolate com morango', '19', '2023-06-22 18:13:00'),
(5, 'images/2023/05/2023-05-12-1683928032.jpg', 'Cupcake de creme', '17', '2023-04-12 15:00:40');

 
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`);

 
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

 
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

 
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

 
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

 
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

 
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

 
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;
 