
CREATE TABLE persons (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `first_name` VARCHAR(64),
    `last_name` VARCHAR(64),
    `email` VARCHAR(256),
    `sha1_password` VARCHAR(40),
    `e_wallet` INT(11),
    `spotify_bill` INT(11),
    `discord_nitro_bill` INT(11),
    `ph_premium_bill` INT(11),
    
    UNIQUE (`first_name`,`last_name`),
    UNIQUE(`email`)
    );

	INSERT INTO persons(`first_name`,`last_name`,`email`,`sha1_password`,`e_wallet`,`spotify_bill`,`discord_nitro_bill`,`ph_premium_bill`)
    VALUES('Clark','Testerson','@ereh',SHA1('BirthdayCake'),999999,100,500,630);

   INSERT INTO persons(`first_name`,`last_name`,`email`,`sha1_password`,`e_wallet`,`spotify_bill`,`discord_nitro_bill`,`ph_premium_bill`)
    VALUES('Heda','Testerson','@bertoroto',SHA1('BirthdayParty'),999999,100,600,610);

    INSERT INTO persons(`first_name`,`last_name`,`email`,`sha1_password`,`e_wallet`,`spotify_bill`,`discord_nitro_bill`,`ph_premium_bill`)
    VALUES('Rhandy','Martinez','@armin',SHA1('Funeral'),9999999,1020,700,600);
