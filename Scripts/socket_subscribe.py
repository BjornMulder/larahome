#!/usr/bin/python3
#
# Copyright (c) 2017-2018, Fabian Affolter <fabian@affolter-engineering.ch>
# Released under the ASL 2.0 license. See LICENSE.md file for details.
#
import asyncio
import json

import asyncws

ACCESS_TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiI1YWY3ZDA4MWFmNDU0OTIwYjJmYjdjNGU5MDRmM2QzMCIsImlhdCI6MTYwNjMyNzg1MywiZXhwIjoxOTIxNjg3ODUzfQ.pnq0iSiNlSUMt7TxQDIdGsT9vTaZsQJ_cimmAZNtniw'


async def main():
    """Simple WebSocket client for Home Assistant."""
    websocket = await asyncws.connect('ws:https://zvwnrhcuc1hwic4kygjm8r7vaezayabi.ui.nabu.casa/api/websocket')

    await websocket.send(json.dumps(
        {'type': 'auth',
         'access_token': ACCESS_TOKEN}
    ))

    await websocket.send(json.dumps(
        {'id': 1, 'type': 'subscribe_events', 'event_type': 'state_changed'}
    ))

    while True:
        message = await websocket.recv()
        if message is None:
            break
        print (message)

loop = asyncio.get_event_loop()
loop.run_until_complete(main())
loop.close(sudo apt install python3-pip)
