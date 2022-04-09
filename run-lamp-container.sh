docker build -t subscription-payment-website .
docker run\
  -p 8006:80 -p 33063:3306\
  -v ${PWD}/app:/app\
  -v ${PWD}/mysql:/var/lib/mysql\
  subscription-payment-website
