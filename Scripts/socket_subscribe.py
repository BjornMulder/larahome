#!/usr/bin/python3
import websocket
import json
import os

from urllib import request, parse
try:
    import thread
except ImportError:
    import _thread as thread
import time

ACCESS_TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiIyMWY1NTMxZmU3Yjk0ZGNmYjVkMzkxMjI2Y2MxMTY1MSIsImlhdCI6MTYwODQ3MDUxNCwiZXhwIjoxOTIzODMwNTE0fQ.mmaXUP7PM6QqQZHMgdhILloVnPChVzv1YJLvFAWJYi4'

def on_message(ws, message):
    obj = json.loads(message)
    data = json.dumps(obj)
    command = "php artisan hass:updatestate '{}'".format(data)

    if obj.get('type') == "event":
        os.system(command)

#    print(message)

def on_error(ws, error):
    print(error)

def on_close(ws):
    start()
    print("### closed ###")

def on_open(ws):
    def run(*args):
        for i in range(30):
            time.sleep(1)
            ws.send(json.dumps(
        {'type': 'auth',
         'access_token': ACCESS_TOKEN}
        ))
            ws.send(json.dumps(
                {'id': 1, 'type': 'subscribe_events', 'event_type': 'state_changed'}
            ))
        time.sleep(1)
    thread.start_new_thread(run, ())


def start():
    websocket.enableTrace(True)
    ws = websocket.WebSocketApp("ws://192.168.86.41:8123/api/websocket",
                              on_message = on_message,
                              on_error = on_error,
                              on_close = on_close)
    ws.on_open = on_open
    ws.run_forever()

start()
