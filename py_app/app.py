# -*- encoding: utf-8 -*-
from flask import Flask, jsonify
import redis
from datetime import datetime
import os
import socket


app = Flask(__name__)
redis_conn = redis.from_url(os.environ.get('REDIS_URL'))


@app.route("/")
def home():
    local_ip = socket.gethostbyname(socket.gethostname())
    redis_conn.incr('API_COUNTER')
    return jsonify(ip=local_ip, counter=redis_conn.get('API_COUNTER').decode('utf-8'), time=datetime.now().isoformat()) 


if __name__ == "__main__":
    app.run(debug=True)