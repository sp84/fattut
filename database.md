#CREATE DATABASE `fattuts`;
USE `fattuts`;
ENGINE = InnoDB
CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE TABLE `fattuts`.`relationships` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `follower_id` INTEGER UNSIGNED NOT NULL,
  `followed_id` INTEGER UNSIGNED NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `Index_follower_id_followed_id`(`follower_id`, `followed_id`),
  CONSTRAINT `FK_relationships_follower_id` FOREIGN KEY `FK_relationships_follower_id` (`follower_id`)
    REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_relationships_followed_id` FOREIGN KEY `FK_relationships_followed_id` (`followed_id`)
    REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
ENGINE = InnoDB
CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE TABLE `fattuts`.`articles` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` INTEGER UNSIGNED,
  `user_id` INTEGER UNSIGNED NOT NULL,
  `title` TEXT NOT NULL,
  `content` TEXT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_articles_user_id` FOREIGN KEY `FK_articles_user_id` (`user_id`)
    REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
ENGINE = InnoDB
CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE TABLE `fattuts`.`article_comments` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INTEGER UNSIGNED NOT NULL,
  `article_id` INTEGER UNSIGNED NOT NULL,
  `message` TEXT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_article_comments_user_id` FOREIGN KEY `FK_article_comments_user_id` (`user_id`)
    REFERENCES `users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_article_comments_article_id` FOREIGN KEY `FK_article_comments_article_id` (`article_id`)
    REFERENCES `articles` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
ENGINE = InnoDB
CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `fattuts`.`ratings` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `article_id` VARCHAR(100) NOT NULL,
  `user_id` VARCHAR(100) NOT NULL,
  `rating` TINYINT(1) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
CHARACTER SET utf8 COLLATE utf8_general_ci;
