

CREATE TABLE `allocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO allocation VALUES("2","Wednesday","2023-06-15 09:01:44");
INSERT INTO allocation VALUES("3","Friday","2023-06-15 09:01:52");
INSERT INTO allocation VALUES("5","Tuesday","2023-06-27 10:13:35");
INSERT INTO allocation VALUES("6","Sunday","2023-06-27 10:15:15");
INSERT INTO allocation VALUES("7","Tuesday","2023-06-27 10:20:51");
INSERT INTO allocation VALUES("8","Monday","2023-06-27 10:22:39");



CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO customer VALUES("1","202306191001","5000.00","Novel Chavez","lapaychavez1996@gmail.com","09197595268","2023-06-19 14:00:48");
INSERT INTO customer VALUES("2","202306191002","3500.00","Arthur Mariano","arth@gmail.com","03322266655","2023-06-19 14:01:46");
INSERT INTO customer VALUES("3","202306191003","10000.00","leonel nino andalajao","leonel@gmail.com","56666658998","2023-06-19 14:03:29");
INSERT INTO customer VALUES("4","202306191004","6700.00","Elaiza Llego","elai@gmail.com","09898989898","2023-06-19 14:04:03");
INSERT INTO customer VALUES("5","202306191005","11000.00","mark villaceran","mark@gmail.com","59896546454","2023-06-19 14:09:51");
INSERT INTO customer VALUES("6","202306191006","20000.00","troy rosal","","","2023-06-19 17:38:45");
INSERT INTO customer VALUES("7","202306201001","5000.00","rachel del socorro","rachel@gmail.com","09555999555","2023-06-20 09:04:16");
INSERT INTO customer VALUES("8","202306201002","10000.00","yongson huan","yongson@gmail.com","89898989989","2023-06-20 10:22:21");
INSERT INTO customer VALUES("9","202306261001","10000.00","irene carbillero","irene@gmail.com","32222222656","2023-06-26 08:51:19");
INSERT INTO customer VALUES("10","202306261002","5000.00","OLASIMAN, JENELI","olasiman@gmail.com","09139995858","2023-06-26 11:29:38");
INSERT INTO customer VALUES("11","202306271001","20000.00","TERANDO, JACQUELYN","terando@gmail.com","23121212121","2023-06-27 12:12:42");



CREATE TABLE `customer_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_invoice` varchar(50) NOT NULL,
  `num_of_entries` int(11) NOT NULL,
  `total_entries` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO customer_entries VALUES("1","202306191001","2","0");
INSERT INTO customer_entries VALUES("2","202306191002","1","0");
INSERT INTO customer_entries VALUES("3","202306191003","5","0");
INSERT INTO customer_entries VALUES("4","202306191004","3","0");
INSERT INTO customer_entries VALUES("5","202306191005","5","0");
INSERT INTO customer_entries VALUES("6","202306191006","8","0");
INSERT INTO customer_entries VALUES("7","202306201001","2","0");
INSERT INTO customer_entries VALUES("8","202306201002","5","0");
INSERT INTO customer_entries VALUES("9","202306261001","5","0");
INSERT INTO customer_entries VALUES("10","202306261002","2","0");
INSERT INTO customer_entries VALUES("11","202306271001","10","2");



CREATE TABLE `customer_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_invoice` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO customer_status VALUES("1","202306191001","Done");
INSERT INTO customer_status VALUES("2","202306191002","Done");
INSERT INTO customer_status VALUES("3","202306191003","Done");
INSERT INTO customer_status VALUES("4","202306191004","Done");
INSERT INTO customer_status VALUES("5","202306191005","Done");
INSERT INTO customer_status VALUES("6","202306191006","Done");
INSERT INTO customer_status VALUES("7","202306201001","Done");
INSERT INTO customer_status VALUES("8","202306201002","Done");
INSERT INTO customer_status VALUES("9","202306261001","Done");
INSERT INTO customer_status VALUES("10","202306261002","Done");
INSERT INTO customer_status VALUES("11","202306271001","Pending");



CREATE TABLE `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO entries VALUES("1","2500.00","Inactive","2023-06-19 17:38:20");
INSERT INTO entries VALUES("2","2000.00","Inactive","2023-06-20 09:28:52");
INSERT INTO entries VALUES("3","3000.00","Inactive","2023-06-20 09:31:59");
INSERT INTO entries VALUES("4","2000.00","Active","2023-06-20 09:32:04");



CREATE TABLE `lottery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_invoice` varchar(50) NOT NULL,
  `lottery_a` varchar(4) DEFAULT NULL,
  `lottery_b` varchar(4) DEFAULT NULL,
  `lottery_c` varchar(4) DEFAULT NULL,
  `result_a` varchar(4) DEFAULT NULL,
  `result_b` varchar(4) DEFAULT NULL,
  `result_c` varchar(4) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT NULL,
  `prize` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

INSERT INTO lottery VALUES("1","202306191001","1","2","3","6","4","2","2023-06-19 14:04:18","Lose","N/A");
INSERT INTO lottery VALUES("2","202306191001","1","2","3","1","8","0","2023-06-19 14:04:29","Win","3rd Prize");
INSERT INTO lottery VALUES("3","202306191002","2","5","7","9","3","9","2023-06-19 14:05:53","Lose","N/A");
INSERT INTO lottery VALUES("4","202306191003","1","5","9","7","8","4","2023-06-19 14:06:37","Lose","N/A");
INSERT INTO lottery VALUES("5","202306191003","9","8","5","4","9","7","2023-06-19 14:06:48","Lose","N/A");
INSERT INTO lottery VALUES("6","202306191003","1","2","3","3","1","5","2023-06-19 14:07:02","Lose","N/A");
INSERT INTO lottery VALUES("7","202306191003","3","6","9","3","8","3","2023-06-19 14:07:10","Win","3rd Prize");
INSERT INTO lottery VALUES("8","202306191003","4","5","6","3","3","7","2023-06-19 14:07:21","Lose","N/A");
INSERT INTO lottery VALUES("9","202306191004","2","3","5","7","6","6","2023-06-19 14:08:23","Lose","N/A");
INSERT INTO lottery VALUES("10","202306191004","2","5","5","9","5","0","2023-06-19 14:08:38","Win","3rd Prize");
INSERT INTO lottery VALUES("11","202306191004","2","5","6","8","8","5","2023-06-19 14:08:48","Lose","N/A");
INSERT INTO lottery VALUES("12","202306191005","2","5","6","9","0","0","2023-06-19 14:10:17","Lose","N/A");
INSERT INTO lottery VALUES("13","202306191005","7","8","9","6","1","1","2023-06-19 14:10:27","Lose","N/A");
INSERT INTO lottery VALUES("14","202306191005","9","5","1","3","4","8","2023-06-19 14:10:38","Lose","N/A");
INSERT INTO lottery VALUES("15","202306191005","1","2","3","7","3","9","2023-06-19 14:10:49","Lose","N/A");
INSERT INTO lottery VALUES("16","202306191005","6","5","4","7","6","1","2023-06-19 14:10:56","Lose","N/A");
INSERT INTO lottery VALUES("17","202306191006","1","2","5","8","2","3","2023-06-19 17:39:01","Win","3rd Prize");
INSERT INTO lottery VALUES("18","202306191006","3","6","5","0","2","7","2023-06-19 17:39:17","Lose","N/A");
INSERT INTO lottery VALUES("19","202306191006","4","5","2","9","2","1","2023-06-19 17:39:27","Lose","N/A");
INSERT INTO lottery VALUES("20","202306191006","2","2","3","0","8","0","2023-06-19 17:40:01","Lose","N/A");
INSERT INTO lottery VALUES("21","202306191006","5","6","3","6","4","0","2023-06-19 17:40:14","Lose","N/A");
INSERT INTO lottery VALUES("22","202306191006","3","5","6","8","9","3","2023-06-19 17:40:57","Lose","N/A");
INSERT INTO lottery VALUES("23","202306191006","0","5","3","6","7","3","2023-06-19 17:41:05","Win","3rd Prize");
INSERT INTO lottery VALUES("24","202306191006","3","5","4","5","2","2","2023-06-20 09:01:40","Lose","N/A");
INSERT INTO lottery VALUES("25","202306201001","1","2","3","0","9","1","2023-06-20 09:41:24","Lose","N/A");
INSERT INTO lottery VALUES("26","202306201001","1","2","5","3","1","1","2023-06-20 10:19:38","Lose","N/A");
INSERT INTO lottery VALUES("27","202306201002","1","2","3","1","6","6","2023-06-20 10:22:43","Win","3rd Prize");
INSERT INTO lottery VALUES("28","202306201002","1","5","9","0","4","5","2023-06-20 10:23:10","Lose","N/A");
INSERT INTO lottery VALUES("29","202306201002","9","8","9","6","0","4","2023-06-20 10:23:21","Lose","N/A");
INSERT INTO lottery VALUES("30","202306201002","4","7","8","0","3","8","2023-06-20 10:23:31","Win","3rd Prize");
INSERT INTO lottery VALUES("31","202306201002","2","5","8","1","8","1","2023-06-20 15:20:08","Lose","N/A");
INSERT INTO lottery VALUES("32","202306261001","1","5","9","9","0","1","2023-06-26 08:51:43","Lose","N/A");
INSERT INTO lottery VALUES("33","202306261001","1","2","3","7","8","6","2023-06-26 08:51:52","Lose","N/A");
INSERT INTO lottery VALUES("34","202306261001","6","5","4","3","9","5","2023-06-26 08:52:02","Lose","N/A");
INSERT INTO lottery VALUES("35","202306261001","1","4","5","2","4","3","2023-06-26 08:52:13","Win","3rd Prize");
INSERT INTO lottery VALUES("36","202306261001","2","5","8","2","3","9","2023-06-26 08:53:07","Win","3rd Prize");
INSERT INTO lottery VALUES("37","202306261002","5","8","6","1","6","9","2023-06-26 11:31:45","Lose","N/A");
INSERT INTO lottery VALUES("38","202306261002","4","8","9","6","8","0","2023-06-26 11:32:03","Win","3rd Prize");
INSERT INTO lottery VALUES("39","202306271001","1","2","3","5","7","8","2023-06-27 13:44:28","Lose","N/A");
INSERT INTO lottery VALUES("40","202306271001","2","5","4","0","9","1","2023-06-27 13:44:39","Lose","N/A");
INSERT INTO lottery VALUES("41","202306271001","2","6","5","0","8","2","2023-06-27 13:44:46","Lose","N/A");
INSERT INTO lottery VALUES("42","202306271001","3","5","9","9","3","4","2023-06-27 13:44:57","Lose","N/A");
INSERT INTO lottery VALUES("43","202306271001","1","2","3","6","2","1","2023-06-30 09:04:43","Win","3rd Prize");
INSERT INTO lottery VALUES("44","202306271001","1","2","3","8","5","6","2023-06-30 09:04:55","Lose","N/A");
INSERT INTO lottery VALUES("45","202306271001","2","3","5","1","4","4","2023-06-30 09:05:04","Lose","N/A");
INSERT INTO lottery VALUES("46","202306271001","3","6","5","6","0","3","2023-06-30 09:05:12","Lose","N/A");



CREATE TABLE `second_prize_allocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO second_prize_allocation VALUES("1","Tuesday","2023-06-14 17:02:12");
INSERT INTO second_prize_allocation VALUES("3","Friday","2023-06-15 09:15:39");
INSERT INTO second_prize_allocation VALUES("4","Saturday","2023-06-15 09:23:17");
INSERT INTO second_prize_allocation VALUES("5","Sunday","2023-06-15 09:23:26");
INSERT INTO second_prize_allocation VALUES("6","Thursday","2023-06-15 14:30:54");



CREATE TABLE `store` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch` varchar(255) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO store VALUES("1","south","09233261347","General Maxilom Avenue, North Reclamation Area, Cebu City, Philippines");



CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO user VALUES("administrator","Gaisano Capital Corp","$2y$10$ks3BlWcAeO2NTUuOmTi7IuVvuK7hwGRZnbkVRIKfAM9oR9cc103cy","Admin","2023-03-25 10:31:41");
INSERT INTO user VALUES("corp","Gaisano Capital Corporate","$2y$10$b.nQvzZR23Osq6R8SCapGuAaovlitNaBLYBmHDqKR8MH.JWdfxcsy","Corp","2023-06-26 13:14:30");
INSERT INTO user VALUES("gcap","Gaisano Corp.","$2y$10$tQNJRhGjrFLmVBAHCXCB1uXROTUYTruiq6hwu/nA2v0DRxf9j.9IK","User","2023-02-23 13:34:58");



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwcustomer` AS select `customer`.`id` AS `id`,`customer`.`amount` AS `amount`,`customer`.`fullname` AS `fullname`,`customer`.`email` AS `email`,`customer`.`phone` AS `phone`,`customer`.`date_created` AS `date_created`,`customer_status`.`status` AS `status` from (`customer` join `customer_status` on(`customer`.`invoice` = `customer_status`.`customer_invoice`));

INSERT INTO vwcustomer VALUES("1","5000.00","Novel Chavez","lapaychavez1996@gmail.com","09197595268","2023-06-19 14:00:48","Done");
INSERT INTO vwcustomer VALUES("2","3500.00","Arthur Mariano","arth@gmail.com","03322266655","2023-06-19 14:01:46","Done");
INSERT INTO vwcustomer VALUES("3","10000.00","leonel nino andalajao","leonel@gmail.com","56666658998","2023-06-19 14:03:29","Done");
INSERT INTO vwcustomer VALUES("4","6700.00","Elaiza Llego","elai@gmail.com","09898989898","2023-06-19 14:04:03","Done");
INSERT INTO vwcustomer VALUES("5","11000.00","mark villaceran","mark@gmail.com","59896546454","2023-06-19 14:09:51","Done");
INSERT INTO vwcustomer VALUES("6","20000.00","troy rosal","","","2023-06-19 17:38:45","Done");
INSERT INTO vwcustomer VALUES("7","5000.00","rachel del socorro","rachel@gmail.com","09555999555","2023-06-20 09:04:16","Done");
INSERT INTO vwcustomer VALUES("8","10000.00","yongson huan","yongson@gmail.com","89898989989","2023-06-20 10:22:21","Done");
INSERT INTO vwcustomer VALUES("9","10000.00","irene carbillero","irene@gmail.com","32222222656","2023-06-26 08:51:19","Done");
INSERT INTO vwcustomer VALUES("10","5000.00","OLASIMAN, JENELI","olasiman@gmail.com","09139995858","2023-06-26 11:29:38","Done");
INSERT INTO vwcustomer VALUES("11","20000.00","TERANDO, JACQUELYN","terando@gmail.com","23121212121","2023-06-27 12:12:42","Pending");



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwlottery_result` AS select `lottery`.`id` AS `id`,`lottery`.`c_invoice` AS `c_invoice`,`customer`.`fullname` AS `fullname`,concat(`lottery`.`lottery_a`,`lottery`.`lottery_b`,`lottery`.`lottery_c`) AS `placed_no`,concat(`lottery`.`result_a`,`lottery`.`result_b`,`lottery`.`result_c`) AS `result`,`lottery`.`status` AS `status`,`lottery`.`prize` AS `prize`,`lottery`.`date` AS `date` from (`lottery` join `customer` on(`lottery`.`c_invoice` = `customer`.`invoice`));

INSERT INTO vwlottery_result VALUES("1","202306191001","Novel Chavez","123","642","Lose","N/A","2023-06-19 14:04:18");
INSERT INTO vwlottery_result VALUES("2","202306191001","Novel Chavez","123","180","Win","3rd Prize","2023-06-19 14:04:29");
INSERT INTO vwlottery_result VALUES("3","202306191002","Arthur Mariano","257","939","Lose","N/A","2023-06-19 14:05:53");
INSERT INTO vwlottery_result VALUES("4","202306191003","leonel nino andalajao","159","784","Lose","N/A","2023-06-19 14:06:37");
INSERT INTO vwlottery_result VALUES("5","202306191003","leonel nino andalajao","985","497","Lose","N/A","2023-06-19 14:06:48");
INSERT INTO vwlottery_result VALUES("6","202306191003","leonel nino andalajao","123","315","Lose","N/A","2023-06-19 14:07:02");
INSERT INTO vwlottery_result VALUES("7","202306191003","leonel nino andalajao","369","383","Win","3rd Prize","2023-06-19 14:07:10");
INSERT INTO vwlottery_result VALUES("8","202306191003","leonel nino andalajao","456","337","Lose","N/A","2023-06-19 14:07:21");
INSERT INTO vwlottery_result VALUES("9","202306191004","Elaiza Llego","235","766","Lose","N/A","2023-06-19 14:08:23");
INSERT INTO vwlottery_result VALUES("10","202306191004","Elaiza Llego","255","950","Win","3rd Prize","2023-06-19 14:08:38");
INSERT INTO vwlottery_result VALUES("11","202306191004","Elaiza Llego","256","885","Lose","N/A","2023-06-19 14:08:48");
INSERT INTO vwlottery_result VALUES("12","202306191005","mark villaceran","256","900","Lose","N/A","2023-06-19 14:10:17");
INSERT INTO vwlottery_result VALUES("13","202306191005","mark villaceran","789","611","Lose","N/A","2023-06-19 14:10:27");
INSERT INTO vwlottery_result VALUES("14","202306191005","mark villaceran","951","348","Lose","N/A","2023-06-19 14:10:38");
INSERT INTO vwlottery_result VALUES("15","202306191005","mark villaceran","123","739","Lose","N/A","2023-06-19 14:10:49");
INSERT INTO vwlottery_result VALUES("16","202306191005","mark villaceran","654","761","Lose","N/A","2023-06-19 14:10:56");
INSERT INTO vwlottery_result VALUES("17","202306191006","troy rosal","125","823","Win","3rd Prize","2023-06-19 17:39:01");
INSERT INTO vwlottery_result VALUES("18","202306191006","troy rosal","365","027","Lose","N/A","2023-06-19 17:39:17");
INSERT INTO vwlottery_result VALUES("19","202306191006","troy rosal","452","921","Lose","N/A","2023-06-19 17:39:27");
INSERT INTO vwlottery_result VALUES("20","202306191006","troy rosal","223","080","Lose","N/A","2023-06-19 17:40:01");
INSERT INTO vwlottery_result VALUES("21","202306191006","troy rosal","563","640","Lose","N/A","2023-06-19 17:40:14");
INSERT INTO vwlottery_result VALUES("22","202306191006","troy rosal","356","893","Lose","N/A","2023-06-19 17:40:57");
INSERT INTO vwlottery_result VALUES("23","202306191006","troy rosal","053","673","Win","3rd Prize","2023-06-19 17:41:05");
INSERT INTO vwlottery_result VALUES("24","202306191006","troy rosal","354","522","Lose","N/A","2023-06-20 09:01:40");
INSERT INTO vwlottery_result VALUES("25","202306201001","rachel del socorro","123","091","Lose","N/A","2023-06-20 09:41:24");
INSERT INTO vwlottery_result VALUES("26","202306201001","rachel del socorro","125","311","Lose","N/A","2023-06-20 10:19:38");
INSERT INTO vwlottery_result VALUES("27","202306201002","yongson huan","123","166","Win","3rd Prize","2023-06-20 10:22:43");
INSERT INTO vwlottery_result VALUES("28","202306201002","yongson huan","159","045","Lose","N/A","2023-06-20 10:23:10");
INSERT INTO vwlottery_result VALUES("29","202306201002","yongson huan","989","604","Lose","N/A","2023-06-20 10:23:21");
INSERT INTO vwlottery_result VALUES("30","202306201002","yongson huan","478","038","Win","3rd Prize","2023-06-20 10:23:31");
INSERT INTO vwlottery_result VALUES("31","202306201002","yongson huan","258","181","Lose","N/A","2023-06-20 15:20:08");
INSERT INTO vwlottery_result VALUES("32","202306261001","irene carbillero","159","901","Lose","N/A","2023-06-26 08:51:43");
INSERT INTO vwlottery_result VALUES("33","202306261001","irene carbillero","123","786","Lose","N/A","2023-06-26 08:51:52");
INSERT INTO vwlottery_result VALUES("34","202306261001","irene carbillero","654","395","Lose","N/A","2023-06-26 08:52:02");
INSERT INTO vwlottery_result VALUES("35","202306261001","irene carbillero","145","243","Win","3rd Prize","2023-06-26 08:52:13");
INSERT INTO vwlottery_result VALUES("36","202306261001","irene carbillero","258","239","Win","3rd Prize","2023-06-26 08:53:07");
INSERT INTO vwlottery_result VALUES("37","202306261002","OLASIMAN, JENELI","586","169","Lose","N/A","2023-06-26 11:31:45");
INSERT INTO vwlottery_result VALUES("38","202306261002","OLASIMAN, JENELI","489","680","Win","3rd Prize","2023-06-26 11:32:03");
INSERT INTO vwlottery_result VALUES("39","202306271001","TERANDO, JACQUELYN","123","578","Lose","N/A","2023-06-27 13:44:28");
INSERT INTO vwlottery_result VALUES("40","202306271001","TERANDO, JACQUELYN","254","091","Lose","N/A","2023-06-27 13:44:39");
INSERT INTO vwlottery_result VALUES("41","202306271001","TERANDO, JACQUELYN","265","082","Lose","N/A","2023-06-27 13:44:46");
INSERT INTO vwlottery_result VALUES("42","202306271001","TERANDO, JACQUELYN","359","934","Lose","N/A","2023-06-27 13:44:57");
INSERT INTO vwlottery_result VALUES("43","202306271001","TERANDO, JACQUELYN","123","621","Win","3rd Prize","2023-06-30 09:04:43");
INSERT INTO vwlottery_result VALUES("44","202306271001","TERANDO, JACQUELYN","123","856","Lose","N/A","2023-06-30 09:04:55");
INSERT INTO vwlottery_result VALUES("45","202306271001","TERANDO, JACQUELYN","235","144","Lose","N/A","2023-06-30 09:05:04");
INSERT INTO vwlottery_result VALUES("46","202306271001","TERANDO, JACQUELYN","365","603","Lose","N/A","2023-06-30 09:05:12");

