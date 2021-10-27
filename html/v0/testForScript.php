<?php
    $command = escapeshellcmd('/var/www/projects/s21-05/KnowledgebaseReader/test.py');
    $output = shell_exec($command);
    echo $output;
?>
