DROP TABLE commonuser;	
		DROP TABLE packages;
		DROP TABLE deliveryman;
		DROP TABLE pakotgain;


		CREATE TABLE `commonuser` (
			`name` text NOT NULL,
			`email` varchar(255) NOT NULL,
			`rating` text NOT NULL,
			`phone` text NOT NULL,
			`packages` text NOT NULL,
			`payment` text NOT NULL,
			`cpf` varchar(255) NOT NULL,
			`wallet` float(10,2),
			`id` bigint(20) NOT NULL AUTO_INCREMENT,
			PRIMARY KEY (`id`),
			UNIQUE KEY `email` (`email`),
			UNIQUE KEY `cpf` (`cpf`)
		);
			
		CREATE TABLE `packages` (
			`id` bigint(20) NOT NULL AUTO_INCREMENT,
			`nickname` text NOT NULL,
			`description` text NOT NULL,
			`priority` text NOT NULL,
			`size` text NOT NULL,
			`weight` text NOT NULL,
			`sender` text NOT NULL,
			`deliveryman` text NOT NULL,
			`price` text NOT NULL,
			`payment` text NOT NULL,
			`assigned` text NOT NULL,
			`dispatched` text NOT NULL,
			`arrived` text NOT NULL,
			`canceled` text NOT NULL,
			`experienceRating` text NOT NULL,
			`origin` text NOT NULL,
			`destination` text NOT NULL,
			`datecreate` text NOT NULL,
			`dateassigned` text NOT NULL,
			`datedispatched` text NOT NULL,
			`datearrived` text NOT NULL,
			`datecanceled` text NOT NULL,
			PRIMARY KEY (`id`)
		);

		CREATE TABLE `deliveryman` (
			`name` text NOT NULL,
			`email` varchar(255) NOT NULL,
			`rating` text NOT NULL,
			`phone` text NOT NULL,
			`packages` text NOT NULL,
			`cpf` varchar(255) NOT NULL,
			`wallet` float(10,2),
			`id` bigint(20) NOT NULL AUTO_INCREMENT,
			PRIMARY KEY (`id`),
			UNIQUE KEY `email` (`email`),
			UNIQUE KEY `cpf` (`cpf`)
		);

		CREATE TABLE `pakotgain` (
			id int(1) auto_increment,
			`wallet` float(20,2), 
			PRIMARY KEY (`id`)
		);

		INSERT INTO pakotgain(wallet) values (1);