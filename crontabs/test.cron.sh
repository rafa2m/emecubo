#!/bin/sh
php /kunden/homepages/16/d380803416/htdocs/crontabs/scripts/test.cron.php

#cada 5 minutos
*/5 * * * * /usr/local/bin/php /kunden/homepages/16/d380803416/htdocs/crontabs/scripts/testmail.php
