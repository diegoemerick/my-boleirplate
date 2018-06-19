CREATE DATABASE gcpf;

USE gcpf;

CREATE TABLE documents (
id INT AUTO_INCREMENT PRIMARY KEY, 
number VARCHAR(30) NOT NULL, 
blocked boolean);