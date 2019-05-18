CREATE TABLE IF NOT EXISTS messages;
GRANT SELECT, ALTER, CREATE, UPDATE, INSERT, DELETE, DROP ON $1.* TO 'test_ci'@'localhost'IDENTIFIED BY 'adgjl0864264';
FLUSH PRIVILEGES;
CREATE TABLE messages(
    msg_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
    uname VARCHAR(32) NOT NULL ,
    timestamp TIMESTAMP NOT NULL ,
    message TEXT(256) NOT NULL ,
    PRIMARY KEY(msg_id)    
);