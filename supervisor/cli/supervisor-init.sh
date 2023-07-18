#!/bin/sh

sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start horizon 

