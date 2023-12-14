# Hursty WP Theme

Hursty WP is a custom WordPress theme designed for portfolio and blog use, showcasing the work of a UX/UI Designer, WordPress Developer, and Graphic/Print Designer. This theme includes live reload features for efficient development.

## Prerequisites

- WordPress environment (Local by Flywheel, XAMPP, MAMP, etc.)
- Node.js and npm

## Installation

1. **Clone the Repository**:  
    Clone this repository into your WordPress themes directory.
    ```bash
    git clone https://github.com/ChrisHursty/hursty-wp.git
2. **Navigate to the Theme Directory**:  
Change to the theme directory.
3. **Install Node Modules**:  
Install the required Node modules.
    ```bash
    npm install
4. **Setting Local for Live Reload**
Open the `gulpfile.mjs` and update the `proxy`:
    ```bash
    browserSyncInstance.init({
        proxy: "change_to_your_local_install.local/"
    });
5. **Running the Development Environment**:  
Start the development environment with live reloading.
    ```bash
    npx gulp
This will watch your SASS, JS, and PHP files for changes and automatically reload the browser.

## Structure

- `/scss`: SCSS files for styling.
- `/css`: Compiled CSS files.
- `/js`: JavaScript files.
- `functions.php`: WordPress theme functions.
- `index.php`: Main template file.

## Contributing

Contributions to the Hursty WP theme are welcome. Please ensure you follow the existing code structure and style.

1. Fork the repository.
2. Create a new branch for your feature (`git checkout -b feature/AmazingFeature`).
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`).
4. Push to the branch (`git push origin feature/AmazingFeature`).
5. Open a Pull Request.

## License

Distributed under the MIT License. See `LICENSE` for more information.
