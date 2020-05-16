<<<<<<< HEAD
# nextcloud
Repository with my docker-compose file to setup nextcloud. As well my used config.

# What's included?
Right now the docker-compose file includes the following docker containers:

- nextcloud - nextcloud itself
- mariaDB - the database backend to be used
- collabora/ code - the developer version of collabora
- phpmyadmin - to be able to easily access the mariaDB for administration purposes
- nginx - as reverse proxy for all http frontends (http is in fact forwarded to https)
- jwilder-dockergen - which generates the reverse proxy configuration for nginx
- keycloak (which is not used right now)

Each service has it's own hostname defined via the VIRTUAL_HOST environment setting. I've created my own root certificate and each hostname has it's own certificate.

# How to use?

First of all you should go through the files and check for password placeholder (<...>). Especially in the following files you need to do this:
- docker-compose.yml
- nextcloud/config/config.php

I use the following directory structure:

```
|-/
|- opt /
|   |-docker /
|       |- nextcloud / ...
|       |- nginx / ...
|       |- docker-compose.yml
|- srv /
|   |- nextcloud-data / ...
 ```

The srv directory is an extra mount point on my hosts with a 1 TB disk. Which is only used to store all nextcloud data. This directory is also backed up via rsnapshot and the host is monitored via nagios. For both I don't describe here how I did it. If you're interested in this drop me a message.

The directory structure abovce just shows out that you just need to checkout this repo under /opt/docker and you need to create the /srv/nextcloud-data folder and that's it. Now you can run the setup via:

```sh
docker-compose up -d
```

If you're using self signed certificates you need to add those root certificates to your nextcloud (make sure that the docker container can read the certificate as the command below is executed inside the container e.g. by placing the certificates into /opt/docker/nextcloud/config folder):
```sh
 sudo docker-compose exec --user www-data nextcloud_app php occ  security:certificates:import /var/www/html/config/sid.crt
```
In my case I had the sid.crt in /opt/docker/nextcloud/config/sid.crt.

Note: you could also use `docker exec` but in that case you need to get the container id first with `docker ps | grep collabora`. When using docker-compose this is a bit easier.

Also you need to install all necessary apps. This is the list I use:

```sh
sudo docker-compose exec --user www-data nextcloud_app php occ app:list
```

**Enabled**:
  - accessibility: 1.0.1
  - activity: 2.7.0
  - admin_audit: 1.4.0
  - calendar: 1.6.2
  - cloud_federation_api: 0.0.1
  - comments: 1.4.0
  - contacts: 2.1.6
  - dav: 1.6.0
  - federatedfilesharing: 1.4.0
  - federation: 1.4.0
  - files: 1.9.0
  - files_pdfviewer: 1.3.2
  - files_sharing: 1.6.2
  - files_texteditor: 2.6.0
  - files_trashbin: 1.4.1
  - files_versions: 1.7.1
  - files_videoplayer: 1.3.0
  - firstrunwizard: 2.3.0
  - gallery: 18.1.0
  - logreader: 2.0.0
  - lookup_server_connector: 1.2.0
  - nextcloud_announcements: 1.3.0
  - notifications: 2.2.1
  - oauth2: 1.2.1
  - password_policy: 1.4.0
  - provisioning_api: 1.4.0
  - richdocuments: 2.0.13
  - serverinfo: 1.4.0
  - sharebymail: 1.4.0
  - support: 1.0.0
  - survey_client: 1.2.0
  - systemtags: 1.4.0
  - theming: 1.5.0
  - twofactor_backupcodes: 1.3.1
  - updatenotification: 1.4.1
  - workflowengine: 1.4.0

**Disabled**:
  - encryption
  - files_external
  - user_external
  - user_ldap

# Open Points
- Use KeyCloak to manage nextcloud users

# Further reading

- https://github.com/jwilder/nginx-proxy
- https://github.com/jwilder/docker-gen
- https://hub.docker.com/_/nextcloud/
- https://docs.nextcloud.com/server/12/admin_manual/configuration_server/occ_command.html#security-commands-label
- https://nextcloud.com/collaboraonline/
=======
# nextcloud
Repository with my docker-compose file to setup nextcloud. As well my used config.

# What's included?
Right now the docker-compose file includes the following docker containers:

- nextcloud - nextcloud itself
- mariaDB - the database backend to be used
- collabora/ code - the developer version of collabora
- phpmyadmin - to be able to easily access the mariaDB for administration purposes
- nginx - as reverse proxy for all http frontends (http is in fact forwarded to https)
- jwilder-dockergen - which generates the reverse proxy configuration for nginx
- keycloak (which is not used right now)

Each service has it's own hostname defined via the VIRTUAL_HOST environment setting. I've created my own root certificate and each hostname has it's own certificate.

# How to use?

First of all you should go through the files and check for password placeholder (<...>). Especially in the following files you need to do this:
- docker-compose.yml
- nextcloud/config/config.php

I use the following directory structure:

/
- opt /
    - docker /
        - nextcloud / ...
        - nginx / ...
        - docker-compose.yml
- srv /
    - nextcloud-data / ...

The srv directory is an extra mount point on my hosts with a 1 TB disk. Which is only used to store all nextcloud data. This directory is also backed up via rsnapshot and the host is monitored via nagios. For both I don't describe here how I did it. If you're interested in this drop me a message.

The directory structure abovce just shows out that you just need to checkout this repo under /opt/docker and you need to create the /srv/nextcloud-data folder and that's it. Now you can run the setup via:

```sh
docker-compose up -d
```

If you're using self signed certificates you need to add those root certificates to your nextcloud (make sure that the docker container can read the certificate as the command below is executed inside the container e.g. by placing the certificates into /opt/docker/nextcloud/config folder):
```sh
 sudo docker-compose exec --user www-data nextcloud_app php occ  security:certificates:import /var/www/html/config/sid.crt
```
In my case I had the sid.crt in /opt/docker/nextcloud/config/sid.crt.

Note: you could also use `docker exec` but in that case you need to get the container id first with `docker ps | grep collabora`. When using docker-compose this is a bit easier.

Also you need to install all necessary apps. This is the list I use:

```sh
sudo docker-compose exec --user www-data nextcloud_app php occ app:list
```

**Enabled**:
  - accessibility: 1.0.1
  - activity: 2.7.0
  - admin_audit: 1.4.0
  - calendar: 1.6.2
  - cloud_federation_api: 0.0.1
  - comments: 1.4.0
  - contacts: 2.1.6
  - dav: 1.6.0
  - federatedfilesharing: 1.4.0
  - federation: 1.4.0
  - files: 1.9.0
  - files_pdfviewer: 1.3.2
  - files_sharing: 1.6.2
  - files_texteditor: 2.6.0
  - files_trashbin: 1.4.1
  - files_versions: 1.7.1
  - files_videoplayer: 1.3.0
  - firstrunwizard: 2.3.0
  - gallery: 18.1.0
  - logreader: 2.0.0
  - lookup_server_connector: 1.2.0
  - nextcloud_announcements: 1.3.0
  - notifications: 2.2.1
  - oauth2: 1.2.1
  - password_policy: 1.4.0
  - provisioning_api: 1.4.0
  - richdocuments: 2.0.13
  - serverinfo: 1.4.0
  - sharebymail: 1.4.0
  - support: 1.0.0
  - survey_client: 1.2.0
  - systemtags: 1.4.0
  - theming: 1.5.0
  - twofactor_backupcodes: 1.3.1
  - updatenotification: 1.4.1
  - workflowengine: 1.4.0

**Disabled**:
  - encryption
  - files_external
  - user_external
  - user_ldap

# Open Points
- Use KeyCloak to manage nextcloud users

# Further reading

- https://github.com/jwilder/nginx-proxy
- https://github.com/jwilder/docker-gen
- https://hub.docker.com/_/nextcloud/
- https://docs.nextcloud.com/server/12/admin_manual/configuration_server/occ_command.html#security-commands-label
- https://nextcloud.com/collaboraonline/
>>>>>>> Init local
