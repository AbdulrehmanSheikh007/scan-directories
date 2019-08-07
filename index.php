<?php
/*
 * This code will scan all your directory, sub directory and files inside your given location
 * You can perform any action you want to do with any type of junk files 
 * Description: Actually this idea came to my mind when I have 5 folders containing
 * thousands of folders having few .html , .mp4 and few junk files but I required
 * only .html and mp4 files. I had to delete all junk files to save my occupied space.
 * 
 * Then I wrote this script which can scan all the directories and sub directories
 * It will delete all the junk files and only mp4 and html will be left to copy
 * 
 * Author: Abdulrehman Sheikh
 * Language: PHP 7.0
 * URI: https://pk.linkedin.com/in/abdulrehman-sheikh-a08695a7
 */
function scan_directory($directory) {
    $dir = scandir($directory);
    foreach ($dir as $d) {
        if ($d === '.' or $d === '..')
            continue;

        if (is_dir($directory . '/' . $d)) {
            //code to use if directory
            scan_directory($directory . '/' . $d);
        } else {
            //code to use if file 
            $type = pathinfo($directory . '/' . $d, PATHINFO_EXTENSION);
            if ($type == "mp4" || $type == "html") {
                //do nothing 
                continue;
            } else {
                if (unlink($directory . '/' . $d)) {
                    echo '<strong>Deleted</strong>'.$directory . '/' . $d . '<br/><br/>';
                }
            }
        }
    }
}

scan_directory("PATH_TO_YOUR_DIRECTORY");
//e.g scan_directory("../htdocs");
