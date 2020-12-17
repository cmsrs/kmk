sudo mysql --default-character-set=utf8 -e  "DROP DATABASE IF EXISTS kmk_test;"
sudo mysql --default-character-set=utf8 -e  "CREATE DATABASE kmk_test CHARACTER SET utf8 COLLATE utf8_general_ci;"
php bin/console   doctrine:migrations:migrate   --env=test
php bin/console doctrine:fixtures:load --env=test
php bin/phpunit
