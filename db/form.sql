CREATE DATABASE registration_form;

CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
   `email` varchar(255) NOT NULL,
   `city` varchar(255) NOT NULL,
   `gender` varchar(255) NOT NULL
);
