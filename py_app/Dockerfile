FROM python:3.9-alpine3.13

ADD requirements.txt /app/requirements.txt
RUN pip install -r /app/requirements.txt

ADD . /app
WORKDIR /app