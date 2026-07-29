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
                                        '$2y$10$4PHpwzhTExDnMn6pWvQ6JukWHAuRFGzhdVnXRNNuQa6jjAteRLg3q' , -- password: 123@123
                                        'admin',
                                        NOW() 
                                        );

SELECT * FROM users_final_project;