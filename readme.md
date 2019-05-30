# Example TYPO3 installation for production docker hosting

This is just an example configuration and needs to be adapted for
custom purpose. Please keep in mind, that this configuration should
just help by getting into the Docker hosting topic.

## Build local docker containers

Run this command to build the necessary docker containers.
    
    docker build -t docker-hosting/nginx -f .docker/nginx/Dockerfile .
    docker build -t docker-hosting/php -f .docker/php/Dockerfile .
    docker build -t docker-hosting/backup -f .docker//backup/Dockerfile .
    
## Generate SSL self-signed certificates (for testing)

Run `openssl req -x509 -nodes -newkey rsa:1024 -days 365 -keyout shared/ssl/conf/live/docker-hosting.localhost/privkey.pem -out shared/ssl/conf/live/docker-hosting.localhost/fullchain.pem -subj '/CN=docker-hosting.localhost'`

## Start Docker containers
Run `docker-compose -f .docker/docker-compose.yaml up -d`