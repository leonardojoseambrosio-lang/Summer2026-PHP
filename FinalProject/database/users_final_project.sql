CREATE TABLE IF NOT EXISTS users_final_project (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100) NOT NULL,
    user_email VARCHAR(255) NOT NULL UNIQUE,
    user_password VARCHAR(255) NOT NULL,
    permission VARCHAR(50) NOT NULL DEFAULT 'user',
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users_final_project VALUES (NULL, 
                                        'admin', 
										'leo@leo.com',
                                        '$2y$10$wE9K2sQhV5X5vN8Jb5Z1/u1Qv7Y3x2L4mZ5N6k7p8q9r0s1t2u3v4', -- password: 123@123
                                        'admin',
                                        NOW() 
                                        );

SELECT * FROM users_final_project;