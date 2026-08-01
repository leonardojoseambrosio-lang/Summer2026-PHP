Virtua816 - Project Documentation
Project developed as an academic portfolio to showcase full-stack web development skills using PHP (Object-Oriented), MySQL, HTML, and modern CSS. The project simulates an indie game studio website focused on retro 8-bit and 16-bit pixel art games.

## Structure
- **classes/**: Contains the OOP logic (database handling, products, and user management).
- **templates/**: Reusable layout pieces (header, footer, etc.).
- **database/**: SQL script to create and setup the database.
- **assets/ & css/**: Stylesheets and media files.
- **config.php**: Centralized database connection settings.
- **index.php**: Main entry point and request router.
- **.php**: Application views and pages using a mix of PHP and HTML.

## Features
- Object-oriented architecture for managing products and user permissions.
- Role-based access control (Standard users can browse tables and items; Admins can create, edit, and delete products/users).
- Centralized request handling through index.php.
- Clean retro-modern interface styling.

## Test Accounts
You can use the following accounts to test the application:

- **Admin Account:**
  - User: admin
  - Password: 123@123

- **Standard User Account:**
  - User: user
  - Password: 123@123