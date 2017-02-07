FROM php:5.6-cli
RUN apt-get update -qq && apt-get install -y -qq git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

COPY composer.json /usr/src/slackwolf/composer.json
COPY composer.lock /usr/src/slackwolf/composer.lock
WORKDIR /usr/src/slackwolf
RUN composer install --prefer-source --no-interaction

COPY . /usr/src/slackwolf
WORKDIR /usr/src/slackwolf

CMD [ "php", "./bot.php" ]
