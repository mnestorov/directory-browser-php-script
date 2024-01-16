<?php
/**
 * Directory Browser Script
 * 
 * This script provides a web interface for browsing the contents of directories.
 * It lists all files and folders within a specified base directory. The first layer 
 * of folders is clickable and will display their contents (files or subfolders) within the script.
 * The second layer of folders and all files will be displayed as links that can be opened in the browser.
 * 
 * Note: This script is designed for use in a controlled environment due to potential security risks
 * associated with directory listing. Ensure proper security measures are in place when deploying.
 */

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

$baseDirectory = '/path/to/your/directory'; // Specify the directory
$currentDirectory = $baseDirectory;

// Check for directory traversal
if (isset($_GET['folder'])) {
    $folder = $_GET['folder'];
    if (strpos($folder, '..') !== false || strpos($folder, '/') !== false || strpos($folder, '\\') !== false) {
        echo 'Access Denied';
        exit;
    }
    $folder = basename($folder); // Ensuring the folder name is isolated
    if (!is_dir($baseDirectory . '/' . $folder)) {
        echo 'Directory not found';
        exit;
    }
    $currentDirectory = $baseDirectory . '/' . $folder;
}

// Check if a specific folder is requested
if (isset($_GET['folder']) && is_dir($baseDirectory . '/' . $_GET['folder'])) {
    $currentDirectory = $baseDirectory . '/' . $_GET['folder'];
}

// Extracting the name of the current directory
$currentDirName = basename($currentDirectory);

// Determine the depth of the current directory relative to the base directory
$depth = substr_count(str_replace($baseDirectory, '', $currentDirectory), '/');

echo "<p><b>Contents of:</b> <em>" . htmlspecialchars($currentDirectory) . "</em></p>";
echo "<p><b>" . htmlspecialchars(ucfirst($currentDirName)) . "</b></p>";

$contents = scandir($currentDirectory);

if ($contents) {
	echo "<ul>";
	foreach ($contents as $item) {
		if ($item !== "." && $item !== "..") {
			$itemPath = $currentDirectory . '/' . $item;
			if (is_dir($itemPath)) {
				// First layer folders are clickable, second layer folders open as links
				if ($depth < 1) {
					// Make directory names clickable for first layer
					$queryParam = urlencode(str_replace($baseDirectory . '/', '', $itemPath));
					echo "<li><strong>Directory:</strong> <a href='?folder={$queryParam}'>" . htmlspecialchars($item) . "</a></li>";
				} else {
					// Display second layer directories as links
					$urlPath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $itemPath);
					echo "<li><strong>Directory:</strong> <a href='{$urlPath}' target='_blank'>" . htmlspecialchars($item) . "</a></li>";
				}
			} else {
				echo "<li><strong>File:</strong> " . htmlspecialchars($item) . "</li>";
			}
		}
	}
	echo "</ul>";

	// Back link
	if ($currentDirectory != $baseDirectory) {
		echo "<a href='javascript:history.back()'>Go Back</a>";
	}
} else {
    echo "Cannot access or read directory.";
}
