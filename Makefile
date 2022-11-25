IP := $(shell ipconfig getifaddr en0)

echo:
	@echo $(IP)
# Docker-compose wrapper command
websh: # webコンテナ内のshに接続
	docker-compose exec web sh

rebuild: # キャッシュを無視してコンテナのビルドを行う ※推奨
	docker-compose build --no-cache

build: # コンテナのビルドを行う
	docker-compose build

run: # コンテナをバックグラウンドで起動
	docker-compose up -d
	@echo "If you want to connect to develop environment from external host, link http://$(IP):8000"

stop: # コンテナを一時停止する
	docker-compose stop

start: # コンテナを一時停止から復帰させる
	docker-compose restart

restart: destroy run # コンテナを破棄して再起動を行う

destroy: # コンテナを破棄する
	docker-compose down

delete: # コンテナイメージを削除する
	docker-compose down --rmi all

status: # コンテナの状態を確認する
	docker ps


# PHP application wrapper command
appsh: # appコンテナ内のshに接続
	docker-compose exec app sh

setup: # Laravelの初期設定を行う
	docker-compose exec app sh -c "composer install"
	docker-compose exec app sh -c "cp .env.example .env; php artisan key:generate"
	docker-compose exec app sh -c "php artisan migrate:fresh --seed"

install: # composer インストール
	docker-compose exec app sh -c "composer install"

migrate: # migrate
	docker-compose exec app sh -c "php artisan migrate"

refresh: # refresh
	docker-compose exec app sh -c "php artisan migrate:refresh"

update: install migrate cache-clear

#routes:
#	docker-compose exec app sh -c "php artisan route:list"

dump: # composer dump-autoload
	docker-compose exec app sh -c "composer dump-autoload"

clear: # cache clear
	docker-compose exec app sh -c "php artisan cache:clear; php artisan config:clear; php artisan config:cache; php artisan route:clear; php artisan view:clear"

cache-clear:  # キャッシュクリア
	docker-compose exec app sh -c "php artisan cache:clear"

#DB
dbsh: # dbコンテナ内のshに接続
	docker-compose exec db sh


#other
establish: # README.mdをエンジニア向けの説明からプロジェクト用に切り替える
	cp README.example.md README.md