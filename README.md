# subscription-payment-website

A website to pay your bills for subscription plans including Spotify Premium, Youtube Premium, Netflix, etc.

1. Install docker on your system
2. Run ./run-lap-container.sh
3. access localhost:80


for terminal

sudo docker run -p 8006:80 -p 33061:3306   -v ${PWD}/app:/app   -v ${PWD}/mysql:/var/lib/mysql   tiktok_tuts


to run server and mysql:

`sudo docker build -t subscription-payment-website . && sudo docker run -p 8006:80 -v ${PWD}/app:/app -v ${PWD}/mysql:/var/lib/mysql subscription-payment-website`

`sudo docker exec -ti (id/name) mysql -uroot`



*** Di ko pa nalalagay yung update MySql Codes ***
