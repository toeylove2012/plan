DROP TABLE IF EXISTS `running_balance`;
CREATE TABLE `running_balance` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `balance_type` tinyint(1) NOT NULL COMMENT '1=budget, 2=expense',
  `md_id` int(14) NOT NULL,
  `amount` float NOT NULL,
  `remarks` text NOT NULL,
  `installment` int(12) NOT NULL,
  `m_id` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `md_id` (`md_id`),
  CONSTRAINT `running_balance_ibfk_1` FOREIGN KEY (`md_id`) REFERENCES `money_detail` (`md_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

