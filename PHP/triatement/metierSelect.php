<?php 
require_once 'PHP/config/config.php';

$sql = mysqli_query($conn, 'SELECT * from metier');

ob_start();
while($metiers = $sql->fetch_assoc()) {
    $option =  <<<HTML
    <option value="{$metiers['id_metier']}">{$metiers['description_metier']}</option>
HTML;

}
$metier = ob_get_clean();


?>
<pre>
    <?=var_dump($option);?>
</pre>