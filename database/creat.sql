CREATE TABLE `project2`.`customer` 
( `id` INT NOT NULL ,  `name` VARCHAR(255) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  `phone` INT NOT NULL ,
  `address` TEXT NOT NULL ,
  `gender` INT NOT NULL ,
    PRIMARY KEY  (`id`),
    UNIQUE  `email` (`email`)) ENGINE = InnoDB;