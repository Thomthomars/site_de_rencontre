<?php
echo "<meta charset='utf8'>";
echo "<h1>hobbies : </h1><p>";
echo $profil[0]['hobbies'];
echo "</p>";
echo"<pre>";
print_r($profil);
echo "</pre>";

echo "<a href='?action=back_office' >modifier votre profil</a> ";

?>
