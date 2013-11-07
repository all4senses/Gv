#!/bin/sh

if [ `ps x | grep VoipServer | grep -v grep | grep -vi screen | wc -l` = "0" ]
then
  #cd ~/
  #java -jar VoipServer.jar > voipserver.log &
  
  cd ~/ookla
  java -jar VoipServer.jar > voipserver.log &
fi