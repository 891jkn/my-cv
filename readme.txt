 
how to install project ?
if haven't : install a localhost app (xampp , laragon , warmpp ,lampp,vvv) end move your project file to www folder in localhost folder
vd : 
locahost(laragon) :
	laragon
		- bin 
		- data 
		- etc 
		- tmp 
		- usr
		- www(move to here)
- run laragon app 
- start locahost and database 
- open project in your code editor 
- config your info in config-server.json
- default is :
{
    "ServerName":"localhost",
    "UserName":"root",
    "Password":"",
    "Database":"mycv1",
    "DatabaseType":"MySql",
    "AppKey":"AJA89UE1QKAASC09H2AC",
    "ProjectName":"mycv"
}
- run file ./App/Core/initDatabase.php - syntax: php initDatabase.php(required install php on your device) 
- next to your browers 
- type : locahost:yourport(usually 8080,if you have skype application , you can change port in laragon) + /your project folder name

don't change project file name =)) because it relation to some config in App.php

