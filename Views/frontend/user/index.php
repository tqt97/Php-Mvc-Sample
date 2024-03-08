<h1>Index user page</h1>

<?php
foreach ($users as $user) {
    echo  $user['id'].'-'.$user['name'].'-'.$user['email'].'<br>';
}
?>