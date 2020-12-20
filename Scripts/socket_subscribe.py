#!/usr/bin/python3
import websocket
import json
from urllib import request, parse
try:
    import thread
except ImportError:
    import _thread as thread
import time

ACCESS_TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiIyMWY1NTMxZmU3Yjk0ZGNmYjVkMzkxMjI2Y2MxMTY1MSIsImlhdCI6MTYwODQ3MDUxNCwiZXhwIjoxOTIzODMwNTE0fQ.mmaXUP7PM6QqQZHMgdhILloVnPChVzv1YJLvFAWJYi4'

def on_message(ws, message):
    data = parse.urlencode(message).encode()
    req =  request.Request(<your url>, data=data) # this will make the method "POST"
    resp = request.urlopen(req)
    print(message)

def on_error(ws, error):
    print(error)

def on_close(ws):
    print("### closed ###")

def on_open(ws):
    def run(*args):
        for i in range(1):
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


if __name__ == "__main__":
    websocket.enableTrace(True)
    ws = websocket.WebSocketApp("wss://bjornmulder.duckdns.org:8123/api/websocket",
                              on_message = on_message,
                              on_error = on_error,
                              on_close = on_close)
    ws.on_open = on_open
    ws.run_forever()


