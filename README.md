# PHP - Directory Browser Script

[![Licence](https://img.shields.io/github/license/Ileriayo/markdown-badges?style=for-the-badge)](./LICENSE)

## Overview

This PHP script provides a web-based interface for browsing the contents of directories on a server. It's designed to list all files and folders within a specified base directory. The script allows users to navigate through the directory structure, with the first layer of folders being clickable to display their contents, and the second layer of folders, as well as all files, being displayed as links that can be opened in the browser.

## Features

- Lists files and folders in a specified directory.
- Clickable first-layer folders to view contents within the script.
- Second-layer folders and files are displayed as links for direct access.
- Security measures to prevent directory traversal attacks.
- Simple and easy to use interface.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- A web server with PHP installed (e.g., Apache, Nginx).
- Access to the server's filesystem with the appropriate permissions.

## Installation

To install the Directory Browser Script, follow these steps:

1. Download the script file to your server.
2. Place it in a directory you wish to use for browsing other directories.
3. Configure the `$baseDirectory` variable in the script to point to the base directory you want to start browsing from.

## Usage

After installation, access the script via your web browser. The script will display the contents of the base directory. Click on any first-layer folder to view its contents. Second-layer folders and files will be displayed as links that can be opened in the browser.

## Security

This script is designed for use in a controlled environment due to potential security risks associated with directory listing. Ensure proper security measures are in place when deploying, including:

- Restricting access to authorized users.
- Ensuring proper permissions are set on directories.
- Running the script in a secure, non-public environment.

## Contributing

Contributions to the project are welcome. To contribute:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/YourFeature`).
3. Make your changes and commit them (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature/YourFeature`).
5. Create a new Pull Request.

---

## License

This project is licensed under the MIT License.
