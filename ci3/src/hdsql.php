<?php
/**
 * Created by PhpStorm.
 * User: tama
 * Date: 2017/02/05
 * Time: 2:36
 */

$sql = <<<SQL

CREATE DATABASE hdde_db DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

GRANT SELECT,INSERT,UPDATE,DELETE,CREATE ON hdde_db.* TO hdde_master@localhost IDENTIFIED BY 'tabeta129';
GRANT SELECT ON hdde_db.* TO hdde_slave@localhost IDENTIFIED BY 'tabeta129';





SQL;


