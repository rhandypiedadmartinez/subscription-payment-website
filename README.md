# subscription-payment-website

A website to pay your bills for subscription plans including Spotify Premium, Youtube Premium, Netflix, etc.

----------------- EZ STEPS --------------------------
1. Install docker on your system
2. cd to project folder
3. run ./run-lap-container.sh (if docker container not yet created) else $ sudo docker restart [docker id]
4. http://localhost:8006/setdb to auto set up db and then redirected to login page

---------------------- HARD STEPS ------------------------
for terminal
sudo docker run -p 8006:80 -p 33061:3306   -v ${PWD}/app:/app   -v ${PWD}/mysql:/var/lib/mysql  subscription-payment-website

to run server and mysql:
`sudo docker build -t subscription-payment-website . && sudo docker run -p 8006:80 -v ${PWD}/app:/app -v ${PWD}/mysql:/var/lib/mysql subscription-payment-website`

`sudo docker exec -ti (id/name) mysql -uroot`


--------- Run on Windows ---------------
1. Install Git
2. Install Docker Desktop
3. Enable WSL or Windows Subsystem Linux
4. Open Git Bash
5. Change directory to this folder then type `./run-lamp-container.sh` 
6. Run this command: `docker build -t subscription-payment-website . && docker run -p 8006:80 -p 33061:3306 -v %cd%/app:/app -v %cd%/mysql:/var/lib/mysql subscription-payment-website`
7. http://localhost:8006 and it will redirect to login.php
8. Enjoy.
