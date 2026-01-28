# GEMINI Project Analysis

## Project Overview

This project is a PHP-based web application for a painter's portfolio. It allows artists to showcase their work, and visitors to browse and comment on the paintings. The application features a public-facing website and an admin panel for content management.

**Key Technologies:**

*   **Backend:** PHP
*   **Database:** MySQL/MariaDB
*   **Frontend:** HTML, CSS, JavaScript, Bootstrap, jQuery
*   **Architecture:** The application follows a Model-View-Controller (MVC) like pattern.

## Building and Running

This is a standard PHP web application. To run it, you need a web server (like Apache or Nginx) with PHP and a MySQL/MariaDB database.

1.  **Web Server:** Place the project files in the document root of your web server (e.g., `htdocs` for XAMPP, `www` for WampServer).
2.  **Database:**
    *   Create a new database named `painters_online`.
    *   The database connection details are located in `inc/Database.php`. You may need to update the `$user` and `$password` variables to match your database credentials.
    *   The project does not include a database schema file. You will need to create the necessary tables manually. Based on the code, the following tables are likely required:
        *   `paintings`
        *   `styles`
        *   `comments`
        *   `users`

3.  **Running the Application:**
    *   Access the project through your web browser (e.g., `http://localhost/Painters/`).
    *   The admin panel is accessible at `http://localhost/Painters/admin/`.

## Development Conventions

*   **File Structure:** The project is organized into the following main directories:
    *   `admin/`: Contains the admin panel files.
    *   `controller/`: Contains the main application logic.
    *   `model/`: Contains the database interaction logic.
    *   `view/`: Contains the presentation files (HTML templates).
    *   `inc/`: Contains the database connection class.
    *   `public/`: Contains static assets like CSS, JavaScript, and fonts.
    *   `route/`: Contains the routing logic.
*   **Routing:** The application uses a simple routing mechanism based on the URL path. The main routing is handled by `route/routing.php` and the admin routing by `admin/routeAdmin/routingAdmin.php`.
*   **Database Access:** Database queries are performed using a custom `database` class in `inc/Database.php` which uses PDO for database interaction.
*   **Styling:** The project uses Bootstrap for the base styling, with custom styles defined in `style.css`.
*   **Multilingual Support:** The application supports English and Estonian. Language files are located in the `lang/` directory. The language can be switched using the `?lang=` query parameter.
