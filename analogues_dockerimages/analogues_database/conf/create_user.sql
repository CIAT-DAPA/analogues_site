create user 'analoguesuserdb'@'%' identified by ''';
grant all on `analogues_db`.* to 'analoguesuserdb'@'%' identified by '';
grant all on `analogues_downloads`.* to 'analoguesuserdb'@'%' identified by '';
grant all on `bioversity_stations`.* to 'analoguesuserdb'@'%' identified by '';
flush privileges;