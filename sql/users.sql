CREATE TABLE user_details(
   user_id INT AUTO_INCREMENT,
   user_name VARCHAR(50) NOT NULL,
   user_email  VARCHAR(50) NOT NULL,
   user_gender   ENUM('female','male'),
   user_receive  ENUM('true','false'),
   primary key ( user_id )
   );

