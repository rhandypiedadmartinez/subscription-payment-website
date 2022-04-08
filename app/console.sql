
CREATE TABLE persons (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `first_name` VARCHAR(64),
    `last_name` VARCHAR(64),
    `sex` ENUM('male','female'),
    `birthdate` DATE,
    `address` VARCHAR(128),
    `email` VARCHAR(256),
    `sha1_password` VARCHAR(40),
    `phone_number` VARCHAR(32),
    `parent_id` INT,
    UNIQUE (`first_name`,`last_name`),
    UNIQUE(`email`),
    FOREIGN KEY (parent_id)
        REFERENCES persons(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
    );

ALTER TABLE person
    ADD COLUMN `blood_type`
    ENUM('A+','A-','B+','B-','O+','O-','AB');

INSERT INTO persons(`birthdate`,`first_name`,`last_name`,`sex`)
    VALUES('1990-03-05','Clark','Testerson','Male');

INSERT INTO persons(`birthdate`,`first_name`,`last_name`,`sex`)
VALUES('1990-03-05','Heda','Testerson','Male');

INSERT INTO persons(`birthdate`,`first_name`,`last_name`,`sex`)
VALUES('1990-03-05','Rhandy','Testerson','Male');

UPDATE `persons`
SET email = 'pedro.testerson@gmail.com'
WHERE  first_name = 'Pedro' AND `last_name` = 'Testerson'
LIMIT 1;

UPDATE `persons`
SET sha1_password = SHA1('BirthdayCake')
WHERE  first_name = 'Pedro' AND `last_name` = 'Testerson'
LIMIT 1;
