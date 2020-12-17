sudo mysql --default-character-set=utf8 -e  "DROP DATABASE IF EXISTS kmk;"
sudo mysql --default-character-set=utf8 -e  "CREATE DATABASE kmk CHARACTER SET utf8 COLLATE utf8_general_ci;"
php bin/console doctrine:migrations:migrate
php bin/console app:save-data
