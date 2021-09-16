<?php 

exec("php artisan config:clear", $output, $retval);
echo "Returned with status $retval and output:\n";
print_r($output);
echo"<hr>";
exec("php artisan view:clear", $output, $retval);
echo "Returned with status $retval and output:\n";
print_r($output);
echo"<hr>";
exec("php artisan cache:clear", $output, $retval);
echo "Returned with status $retval and output:\n";
print_r($output);
echo"<hr>";
exec("php artisan optimize:clear", $output, $retval);
echo "Returned with status $retval and output:\n";
print_r($output);
echo"<hr>";

exec("php artisan key:generate", $output, $retval);
echo "Returned with status $retval and output:\n";
print_r($output);
echo"<hr>";
phpinfo();
