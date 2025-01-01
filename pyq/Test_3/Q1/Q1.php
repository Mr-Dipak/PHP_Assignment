<?php
// Define file paths
$file1 = 'abc.txt';
$file2 = 'xyz.txt';

// Read content from both files
$content1 = file_get_contents($file1);
$content2 = file_get_contents($file2);

// Swap the contents
file_put_contents($file1, $content2);
file_put_contents($file2, $content1);

echo "Content swapped successfully.";
?>