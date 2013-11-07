@echo off
set scriptdir=C:\Progra~1\Ookla
set pid=
cd %scriptdir%
for /f "tokens=2 delims= " %%i in ('pv -l ^| find /i "VoipServer" ^| find /v /i "find"') do set pid=%%i
if (%pid%)==() java -jar VoipServer.jar > NUL