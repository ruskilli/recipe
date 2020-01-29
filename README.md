# Random recipe generator #

Generates random recipes in HTML or Markdown format

## Requirements ##
Fairly new PHP and a webserver (Apache or Nginx should work) 

If you want to store the random recipes, pdo_sqlite is needed

You need to make either the sqlite_path directory writeable for the webserver user or touch that file and make that writeable 

### Install PDO Sqlite on Ubuntu ###
    sudo apt install php-sqlite3
    sudo phpenmod pdo_sqlite
    sudo apache2ctl graceful

## Install ##
Download files:

    git clone https://github.com/ruskilli/recipe.git

..or..

    wget https://github.com/ruskilli/recipe/archive/master.zip
    unzip master.zip

## Configuration ##
Copy config.example to config.php and make your changes (token needed for Mattermost integration)

    cp config.example config.php

If storing results, make sqlite_path directory writeable

    chmod 777 var/

..or..

    touch var/db.sqlite
    chmod 666 var/db.sqlite 
    
(or use chgrp to a suitable group where webserver user is member and 775 or 664)

## New recipes ## 
Make a copy of food.json and try to understand the "template" part to build your own style of recipe
