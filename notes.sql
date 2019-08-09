CREATE DATABASE notepad;

CREATE TABLE notes
(
id              INT(255)        NULL, 
date_posted     DATETIME        DEFAULT CURRENT_TIMESTAMP , 
title           VARCHAR(255)    NOT NULL, 
note            TEXT            NULL,
PRIMARY KEY (title)
);