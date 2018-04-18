<?php // video 12.35min
/*pour modif document en ligne ********************************************/
if ($_POST) {
    $fileToModify = $_POST['fileName'];
    $openedFile = fopen($fileToModify, "w");
    fwrite($openedFile, stripcslashes($_POST['content']));
    fclose($openedFile);
    $content = '';
    }

include('inc/head.php');

/* function d'affichage récursif de l'arborescence************************************/
function dirList($dirPath)
{
    $dir = opendir($dirPath);
    if (is_dir($dirPath)) {
        echo '<ul>';
        while($file = readdir($dir)) {
            if (!in_array($file, array(".", ".."))) {
                echo '<li><a href="?file=' . $dirPath . '/' . $file . '">';
                echo $file;
                echo '</a><a class="btn btn-danger" type="submit" name="delete" href="?delete='. $dirPath . '/' .
                    $file . '">supprimer</a></li>';
                if (is_dir($dirPath . '/' . $file)) {
                    dirList($dirPath . '/' . $file);
                }
            }
        }
        echo '</ul>';
    }
}



?>


<?php
/*affichage et modif du document ***********************************************/
if (isset($_GET['file']) && !$_POST) {
    $fileToOpen = $_GET['file'];
    $content = file_get_contents($fileToOpen);?>

    <form method="post" action="">
        <textarea name="content"><?php if (isset($content)) echo $content ?></textarea>
    <input type="hidden" name="fileName" value="<?php echo $fileToOpen ?>">
    <input type="submit" name="submit" value="envoyer">
    </form>
<?php
}
/* suppression du fichier ou du dossier *************************************/
// ok mais echec si dossier non vide
if (isset($_GET['delete'])) {
    if (is_dir($_GET['delete'])) {
        $contentDeleteFolder = scandir($_GET['delete']);

        if (count($contentDeleteFolder) <= 2) {
            rmdir($_GET['delete']);
        } else {
            echo 'Le dossier doit etre vide pour pouvoir etre supprimé';
        }
    } else {
        unlink($_GET['delete']);
    }
}

dirList("files");
?>

<?php include('inc/foot.php'); ?>