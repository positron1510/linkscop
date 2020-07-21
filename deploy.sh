echo "Deploy..."

#echo "Обновляем зависимости при помощи composer ..."
#composer update

echo "Клонируем git ..."
git checkout master -f
git pull origin master


echo "Очищаем кэш"
php bin/console redis:flushdb --client=cache
php bin/console cache:clear --env prod

#echo "Обновляем зависимости при помощи composer ..."
#composer update

echo "Обновляем схему БД..."
php bin/console doctrine:schema:update --force

echo "Подогреваем кэш..."
php bin/console cache:warmup --env=prod
