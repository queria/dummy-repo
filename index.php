<?php
require_once('./init.php');
if($isWEB) {
    echo '<pre>';
}

echo "Accounts:\n\t";
$accounts = Accounts::findAll();
if(count($accounts) > 0) {
    echo implode("\n\t", $accounts);
} else {
    echo "No accounts found\n";
}
echo "\n";

echo "Test: (byName, byName-null, byName-characters, all chars)\n";

echo Accounts::findByName('queria')."\n";
echo Accounts::findByName('queriaNull')."\n";
echo implode(',', Accounts::findByName('queria')->characters())."\n";
echo implode(',', Characters::findAll())."\n";

if($isWEB) {
    echo '</pre>';
}
?>
