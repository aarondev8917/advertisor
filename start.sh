#!/bin/sh

sudo apt update
sh install-docker.sh
alias sail='bash vendor/bin/sail'
sail up -d