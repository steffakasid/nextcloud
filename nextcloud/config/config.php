<?php
$CONFIG = array (
  'htaccess.RewriteBase' => '/',
  'memcache.local' => '\\OC\\Memcache\\APCu',
  'apps_paths' => 
  array (
    0 => 
    array (
      'path' => '/var/www/html/apps',
      'url' => '/apps',
      'writable' => false,
    ),
    1 => 
    array (
      'path' => '/var/www/html/custom_apps',
      'url' => '/custom_apps',
      'writable' => true,
    ),
  ),
  'instanceid' => '<your instance id>',
  'passwordsalt' => '<you password salt>',
  'secret' => '<your secret>',
  'trusted_domains' => 
  array (
    0 => 'nextcloud.sid',
    1 => '192.168.0.185',
  ),
  'datadirectory' => '/var/www/html/data',
  'overwrite.cli.url' => 'http://nextcloud.sid',
  'dbtype' => 'mysql',
  'version' => '14.0.0.19',
  'dbname' => 'nextcloud',
  'dbhost' => 'nextcloud_mariadb',
  'dbport' => '',
  'dbtableprefix' => 'oc_',
  'mysql.utf8mb4' => true,
  'dbuser' => 'nextcloud',
  'dbpassword' => '<your nextcloud mariadb password here>',
  'installed' => true,
  'mail_from_address' => '',
  'mail_smtpmode' => 'php',
  'mail_smtpauthtype' => 'LOGIN',
  'mail_domain' => '',
  'mail_smtphost' => '',
  'mail_smtpsecure' => 'tls',
  'mail_smtpport' => '465',
  'mail_smtpauth' => 1,
  'maintenance' => false,
  'ldapIgnoreNamingRules' => false,
  'ldapProviderFactory' => '\\OCA\\User_LDAP\\LDAPProviderFactory',
  'loglevel' => 0,
  'theme' => '',
);
