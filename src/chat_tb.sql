CREATE TABLE IF NOT EXISTS 'messages'(
    'msg_id' INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
    'uname' VARCHAR(32) NOT NULL ,
    'timestamp' TIMESTAMP NOT NULL ,
    'message' VARCHAR(256) NOT NULL ,
    PRIMARY KEY('msg_id')    
);