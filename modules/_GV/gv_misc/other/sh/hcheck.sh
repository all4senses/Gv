#!/bin/sh

check_process() {
  ###echo "$ts: checking $1"
  [ "$1" = "" ]  && return 0
  [ `pgrep -n $1` ] && return 1 || return 0
}

#while [ 1 ]; do 

  # timestamp
  #ts=`date +%T`
  ts=`date +"%Y-%m-%d %H:%M:%S"`

  
  cd /home/gvadmin/ookla
  
  ###echo "$ts: begin checking..." >> hcheck-times.log
  ###echo "$ts: begin checking..."

  check_process "httpd"
  [ $? -eq 0 ] && echo "$ts: not running, restarting..." >> hcheck.log && ` /etc/init.d/httpd restart >> hcheck.log`
  #sleep 5
#done