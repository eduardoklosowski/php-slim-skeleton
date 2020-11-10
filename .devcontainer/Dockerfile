# https://github.com/microsoft/vscode-dev-containers/tree/v0.148.0/containers/php-mariadb

ARG VARIANT=7
FROM mcr.microsoft.com/vscode/devcontainers/php:dev-${VARIANT}

RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && apt-get install -y mariadb-client \
    && apt-get clean -y && rm -rf /var/lib/apt/lists/*

ARG USER_UID=1000
ARG USER_GID=$USER_UID
RUN if [ "$USER_GID" != "1000" ] || [ "$USER_UID" != "1000" ]; then \
        groupmod --gid $USER_GID vscode \
        && usermod --uid $USER_UID --gid $USER_GID vscode \
        && chown -R $USER_UID:$USER_GID /home/vscode \
        && chown -R $USER_UID:root /usr/local/share/nvm; \
    fi

ARG INSTALL_NODE="true"
ARG NODE_VERSION="lts/*"
RUN if [ "${INSTALL_NODE}" = "true" ]; then su vscode -c "source /usr/local/share/nvm/nvm.sh && nvm install ${NODE_VERSION} 2>&1"; fi

RUN echo 'xdebug.remote_connect_back=on' >> /usr/local/etc/php/conf.d/xdebug.ini \
    && docker-php-ext-install -j$(nproc) --ini-name /usr/local/etc/php/conf.d/pdo_mysql.ini pdo_mysql
