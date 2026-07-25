CREATE TABLE IF NOT EXISTS product_final_project (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    short_description VARCHAR(255) NOT NULL,
    full_description TEXT NOT NULL,
    product_price FLOAT NOT NULL,
    product_image VARCHAR(255) NOT NULL
);

INSERT INTO product_final_project VALUES (NULL, 'Galaxy Adventures', 
										'Galaxy Adventures is a 16-bit RPG where Noah travels around the galaxy looking for his wife, who has disappeared.', 
                                        'In a vast and dangerous universe, Noah is no ordinary hero—he is a husband on an impossible mission. Galaxy Adventures brings the nostalgia of classic 16-bit RPGs to life. Journey through distant galaxies, interact with alien civilizations, and uncover the truth behind the disappearance of the person you love most.', 
                                        50.99, 
                                        './assets/GalaxyAdventure.png' );

SELECT * FROM product_final_project;