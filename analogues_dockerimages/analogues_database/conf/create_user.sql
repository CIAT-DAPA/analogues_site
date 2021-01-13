create user 'analoguesuserdb'@'%' identified by 'root123';
grant all on `analogues_db`.* to 'analoguesuserdb'@'%' identified by 'root123';
grant all on `analogues_downloads`.* to 'analoguesuserdb'@'%' identified by 'root123';
grant all on `bioversity_stations`.* to 'analoguesuserdb'@'%' identified by 'root123';
flush privileges;