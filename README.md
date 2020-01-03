# Run multiple WordPress Docker containers with NGINX Proxy, LetsEncrypt and Composer

Each WordPress site runs its own container and is proxied by an NGINX Proxy that handles SSL thanks to LetsEncrypt.
This setup relies on https://github.com/jwilder/nginx-proxy and https://github.com/JrCs/docker-letsencrypt-nginx-proxy-companion

## Requirements

* Docker https://docs.docker.com/install/
* Docker Compose https://docs.docker.com/compose/install/

## NGINX Proxy and LetsEncrypt

Run `docker-compose up -d` in the `nginx` directory to start the NGINX Proxy and LetsEncrypt Proxy
Companion containers. These containers will handle https.  
The `-d` option starts the containers in the background and leaves them running.

You can list the running containers with ``docker-compose ps``.

Note: WordPress Multisite works only on ports 80 and/or 443. If you get an error message about binding 0.0.0.0 to port 80 or 443, it is likely that the port you configured for WordPress is already in use by another service.

## WordPress Setup

* In each site directory is a `sample.env` - copy that file, edit the environment variables and
rename it to `.env`. Each site directory must contain this environment file.
* Make sure that the container names are unique for each site. (`DB_CONTAINER, WP_CONTAINER and COMPOSER_CONTAINER`). 
* I recommend highly choosing different database credentials for each site.
* Make optional changes to `wp-config.php` or copy the file `xcustom-sample.ini`, edit the variables and
rename it to `xcustom.ini`. 
* The `wp-content` folder is mounted locally to `/www/${VIRTUAL_HOST}/wp_content` for
persistency. This folder contains themes, plugins and uploads.
* Database files are mounted here: `/www/${VIRTUAL_HOST}/db_data`

## Custom Theme & Plugins Development
* You can develop a custom theme in `theme` or custom plugins in
`custom_plugins`. The theme is named after the according environment variable `WP_CUSTOM_THEME` defined in `.env`.

## Composer

Add plugins and/or theme dependencies to `composer/composer.json`.
They will be installed by the composer container on `docker-compose up --build`.

``` arbitrary
{
    "name": "wordpress-docker-composer",
    "description": "WordPress Docker & Composer Setup",
    "repositories":[
        {
            "type":"composer",
            "url":"https://wpackagist.org"
        }
    ],
    "require": {
        "wpackagist-plugin/wordpress-seo":"*",
        "wpackagist-plugin/wp-super-cache":"*"
    }
}
```

## Build and run containers

For each site navigate to its directory and:

``docker-compose up --build -d``

## Shutdown and cleanup

The command ``docker-compose down`` removes the containers and the network, but preserves your WordPress database and the `wp-content` folder.

To restart the containers or the network, run ``docker-compose up -d`` in the appropriate directory.

## Local Development

For local development set the values of `VIRTUAL_HOST` environment variables to an arbitrary domain (e.g. my-wordpress.com) and set `LETSENCRYPT_TEST` to `TRUE`. Make sure to use a valid domain ending and to add the domain to your hosts file. On Linux or MacOS add this line `127.0.0.1    my-wordpress.com` to `/etc/hosts` and restart the browser. On Windows the hosts file is located here - `C:\Windows\System32\drivers\etc\hosts`

To connect to the databases, install sequel pro https://www.sequelpro.com/ and configure each database connection with the following values (leave the Standard connection by default):    
Host: 127.0.0.1  
User: `DB_USER`  
Password: `DB_PASSWORD`  
Database: `DB_NAME`  
Port: 3308|3309|... (check the value of the first db port in `docker-compose.yml`, for example for "3308:3306", use 3308)

After connecting to a database, you can import an existing database (use the WP Migrate DB plugin to export a sql dump with find & replace on URLs for adaptation to another environment).  
To benefit from the uploaded files, copy the `wp-content/uploads` directory of the source site to the local site directory `uploads`.  
Note: with an ssh connection to the source server, it will be possible to locally launch the import of the database and `wp-content/uploads` directory via a shell script.

