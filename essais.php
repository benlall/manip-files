<?php

//ok
$dirPath = "files";
$file = [];
$i = 0;

$dir[$i] = opendir($dirPath);
if (is_dir($dirPath)) {
    echo '<ul>';
    while($file[$i] = readdir($dir[$i])) {
        if (!in_array($file[$i], array(".", ".."))) {
            echo '<li><a href="?file=' . $dirPath . '/' . $file[$i] . '">';
            echo $file[$i];
            echo '</a></li>';

            $dir[$i+1] = opendir($dirPath . '/' . $file[$i]);
            if (is_dir($dirPath . '/' . $file[$i])) {
                echo '<ul>';
                while($file[$i+1] = readdir($dir[$i+1])) {
                    if (!in_array($file[$i+1], array(".", ".."))){
                        echo '<li><a href="?file=' . $dirPath . '/' . $file[$i] . '/' . $file[$i+1] . '">';
                        echo $file[$i+1];
                        echo '</a></li>';
                    }
                }
                echo '</ul>';
            }
        }
    }
    echo '</ul>';
}


// ok
$dirPath = "files";
$file = [];

$dir[0] = opendir($dirPath);
if (is_dir($dirPath)) {
    echo '<ul>';
    while($file[0] = readdir($dir[0])) {
        if (!in_array($file[0], array(".", ".."))) {
            echo '<li><a href="?file=' . $dirPath . '/' . $file[0] . '">';
            echo $file[0];
            echo '</a></li>';

            $dir[1] = opendir($dirPath . '/' . $file[0]);
            if (is_dir($dirPath . '/' . $file[0])) {
                echo '<ul>';
                while($file[1] = readdir($dir[1])) {
                    if (!in_array($file[1], array(".", ".."))){
                        echo '<li><a href="?file=' . $dirPath . '/' . $file[0] . '/' . $file[1] . '">';
                        echo $file[1];
                        echo '</a></li>';
                    }
                }
                echo '</ul>';
            }
        }
    }
    echo '</ul>';
}


// ok

$dir = opendir($dirPath);
if (is_dir($dirPath)) {
    echo '<ul>';
    while($file = readdir($dir)) {
        if (!in_array($file, array(".", ".."))) {
            echo '<li><a href="?file=' . $dirPath . '/' . $file . '">';
            echo $file;
            echo '</a></li>';

            $subdir = opendir($dirPath . '/' . $file);
            if (is_dir($dirPath . '/' . $file)) {
            echo '<ul>';
                while($subfile = readdir($subdir)) {
                if (!in_array($subfile, array(".", ".."))){
                echo '<li><a href="?file=' . $dirPath . '/' . $file . '/' . $subfile . '">';
                        echo $subfile;
                        echo '</a></li>';
                }
            }
            echo '</ul>';
            }
        }
    }
    echo '</ul>';
}
