CREATE TABLE IF NOT EXISTS product_final_project (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    short_description VARCHAR(255) NOT NULL,
    full_description TEXT NOT NULL,
    product_price FLOAT NOT NULL,
    product_image VARCHAR(255) NOT NULL,
    quantity_in_stock INT NOT NULL
);

INSERT INTO product_final_project VALUES (NULL, 'Galaxy Adventures', 
										'Galaxy Adventures is a 16-bit RPG where Noah travels around the galaxy looking for his wife, who has disappeared.', 
                                        'In a vast and dangerous universe, Noah is no ordinary hero—he is a husband on an impossible mission. Galaxy Adventures brings the nostalgia of classic 16-bit RPGs to life. Journey through distant galaxies, interact with alien civilizations, and uncover the truth behind the disappearance of the person you love most.', 
                                        50.99, 
                                        './assets/GalaxyAdventure.png', 3);

INSERT INTO product_final_project VALUES (NULL, 'Cyber City Punk', 
										'Cyber City Punk: A high-stakes action-RPG in a neon-drenched dystopia. Survive, hack, and fight to dismantle a corrupt corporate empire.', 
                                        'In a sprawling, neon-drenched metropolis where humanity is measured by how much of your body is left, survival is the only objective. Cyber City Punk places you in the heart of a decaying urban sprawl, a world ruled by monolithic corporations that treat human life as a replaceable component. As an outcast operative living on the edge, you are drawn into a web of corporate espionage, high-stakes heists, and underground warfare. The city is a multi-layered beast—from the high-tech, sterile towers of the elite to the dark, rain-soaked slums where the only law is the one you enforce.', 
                                        29.99, 
                                        './assets/CyberCityPunk.jpg', 3);

INSERT INTO product_final_project VALUES (NULL, 'The Legend of Thyren', 
										'The Legend of Thyren: An epic fantasy adventure. Journey through a vast, enchanted realm to reclaim a stolen legacy and restore balance to a kingdom on the brink of collapse.', 
                                        'In a world where ancient magic once thrived, the land of Thyren has fallen into shadow. The Legend of Thyren invites you to explore a sprawling, high-fantasy continent filled with forgotten ruins, mystical forests, and towering mountain citadels. As a chosen guardian burdened with an ancient power, your journey is one of rediscovery and defiance against an encroaching darkness. The history of Thyren is written in its crumbling architecture and the whispers of its people. As you travel, you will uncover the truth behind the cataclysm that shattered the realm, realizing that the key to salvation lies not just in the strength of your blade, but in the wisdom of the past.', 
                                        35.00, 
                                        './assets/TheLegendofThyren.png', 3);

INSERT INTO product_final_project VALUES (NULL, 'Programmer Life', 
										'Programmer Life: A comedic, soul-crushing life-sim. Survive the endless struggle of debugging CSS layouts that defy physics and untangling legacy PHP code while trying to maintain your sanity.', 
                                        "Step into the shoes of a weary developer in Programmer Life, a brutally honest life-simulation game where the ultimate boss isn't a dragon —it's a server error you can't trace. Set in the fluorescent-lit purgatory of a cramped home office, you must balance tight deadlines, endless cups of cold coffee, and the soul-draining reality of modern web development. You’ll face the two greatest foes known to man: a CSS layout that breaks whenever you sneeze and a legacy PHP codebase that hasn't been updated since 2005. Can you deliver the product before your health bars—Caffeine and Sanity—reach zero?", 
                                        35.00, 
                                        './assets/ProgrammerLife.png', 3);
SELECT * FROM product_final_project;