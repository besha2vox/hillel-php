CREATE TABLE IF NOT EXISTS `users`
(
    `id`         INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    `name`       CHAR(100) NOT NULL,
    `age`        TINYINT UNSIGNED DEFAULT NULL,
    `email`      CHAR(255) NOT NULL UNIQUE,
    `role_id`    INT UNSIGNED     DEFAULT NULL,
    `password`   CHAR(255) NOT NULL,
    `gender`     ENUM ('male', 'female'),
    `deleted_at` TIMESTAMP        DEFAULT NULL
    ) ENGINE = InnoDB
    CHARACTER SET utf8;

INSERT INTO `users`(`name`, `age`, `email`, `gender`, `password`)
VALUES ('Serhii', 33, 'serhii@gmail.com', 'male', 'qwertypassword'),
       ('Kate', 20, 'kate@gmail.com', 'female', 'qwertypassword'),
       ('John', 31, 'john@gmail.com', 'male', 'qwertypassword'),
       ('Asuna', 19, 'asuna@ganet.ne.jp', 'female', 'qwertypassword'),
       ('Daria', 28, 'daria@ukr.net', 'female', 'qwertypassword');

INSERT INTO `users`(`name`, `email`, `gender`, `password`)
VALUES ('Bob', 'bob@gmail.com', 'male', 'bob12345'),
       ('Tomato', 'tomato@yahoo.com', 'female', 'orange');

UPDATE `users`
SET `age` = 55
WHERE `id` = 6;

DELETE
FROM `users`
WHERE `id` = 7;

CREATE TABLE IF NOT EXISTS `roles`
(
    `id`         INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    `role_name`  CHAR(100) NOT NULL,
    `deleted_at` TIMESTAMP DEFAULT NULL

    );

INSERT INTO `roles` (`role_name`)
VALUES ('Front-End dev'),
       ('Back-End dev'),
       ('Full-Stack dev'),
       ('Designer'),
       ('Quality Assurance'),
       ('Business Analyst'),
       ('Project Manager'),
       ('Product Owner');

CREATE TABLE IF NOT EXISTS `projects`
(
    `id`           INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    `project_name` CHAR(100) NOT NULL,
    `link`         CHAR(255) NOT NULL,
    `description`  CHAR(255),
    `deleted_at`   TIMESTAMP DEFAULT NULL
    );


INSERT INTO `projects` (`project_name`, `description`, `link`)
VALUES ('Junfolio', 'Web service for beginners to gain experience.', 'https://junfolio.top/'),
       ('Go-volonteer', 'A website with a responsive layout to improve volunteering.',
        'https://www.go-volonteer.in.ua/'),
       ('Your Pet', 'Website for finding pets with the ability to register and post ads',
        'https://besha2vox.github.io/your-pet/');

CREATE TABLE IF NOT EXISTS `project_user_role`
(
    `id`         INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    `project_id` INT UNSIGNED,
    `user_id`    INT UNSIGNED,
    `role_id`    INT UNSIGNED,
    FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
    FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
    );

INSERT INTO `project_user_role` (`project_id`, `user_id`, `role_id`)
VALUES (1, 1, 2),
       (2, 1, 1),
       (3, 1, 3),
       (1, 2, 4),
       (1, 3, 1),
       (1, 4, 5),
       (1, 5, 8),
       (1, 6, 7),
       (2, 3, 6),
       (2, 4, 2),
       (2, 6, 5),
       (2, 5, 4),
       (3, 4, 1),
       (3, 3, 2);

SELECT * FROM `projects`;
SELECT `name`, `age` FROM `users`;
SELECT `role_name` FROM `roles`;

SELECT `projects`.`id` AS `project_id`,
       `projects`.`project_name`,
       `projects`.`link`,
       `projects`.`description`,
       GROUP_CONCAT(
               CONCAT(`users`.`name`, ' - ', `roles`.`role_name`) SEPARATOR ', '
       )               AS `team`
FROM `projects`
         JOIN `project_user_role` ON `projects`.`id` = `project_user_role`.`project_id`
         JOIN `users` ON `project_user_role`.`user_id` = `users`.`id`
         JOIN `roles` ON `project_user_role`.`role_id` = `roles`.`id`
WHERE `projects`.`deleted_at` IS NULL
GROUP BY `projects`.`id`, `projects`.`project_name`, `projects`.`link`, `projects`.`description`;

UPDATE `project_user_role` SET `role_id` = 6 WHERE `id` LIKE 6;

SELECT `users`.`id` AS `user_id`,
       `users`.`name`,
       GROUP_CONCAT(
               CONCAT(`projects`.`project_name`, ' - ', `roles`.`role_name`) SEPARATOR ', '
       )            AS `project`
FROM `users`
         JOIN `project_user_role` ON `users`.`id` = `project_user_role`.`user_id`
         JOIN `roles` ON `project_user_role`.`role_id` = `roles`.`id`
         JOIN `projects` ON `project_user_role`.`project_id` = `projects`.`id`
WHERE `users`.`deleted_at` IS NULL
GROUP BY  `users`.`id`, `users`.`name`;