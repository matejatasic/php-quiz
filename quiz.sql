IF php-quiz('php-quiz') IS NULL 
    CREATE DATABASE dbname

GO

CREATE TABLE questions (
    question_id INT(11) NOT NULL,
    question_title VARCHAR(255) NOT NULL,
    PRIMARY KEY(questoin_id) 
); 

CREATE TABLE dbname.dbo.TABLEN (
    choice_id INT(11) NOT NULL,
    question_id INT(11) NOT NULL,
    is_correct TINYINT(4) NOT NULL,
    choice_title VARCHAR(255) NOT NULL,
    PRIMARY KEY(choice_Id) 
); 