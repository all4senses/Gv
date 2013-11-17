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

  
  cd /home/gvadmin/a4s_httpd_restart_and_alert_if_its_down

  echo "$ts: checking last time" > httpd_check_last_time.log  

  ###test###echo "$ts: not running, restarting..." >> httpd_check_last_time.log && ` echo "$ts: GV was down, restarted!" | mail -s "GV is Down!!!"  all4senses@gmail.com`

  ###echo "$ts: begin checking..." >> httpd_check_times.log
  ###echo "$ts: begin checking..."

  check_process "httpd"
  ###[ $? -eq 0 ] && echo "$ts: not running, restarting..." >> httpd_check.log && ` /etc/init.d/httpd restart >> httpd_check.log`
  [ $? -eq 0 ] && echo "$ts: not running, restarting..." >> httpd_check.log && ` /etc/init.d/httpd restart >> httpd_check.log` && ` echo "$ts: GV just was down, restarted!" | mail -s "GV just was Down!!!" all4senses@gmail.com`
  #sleep 5
#done