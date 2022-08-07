drop schema if exists scriptbrasil;
create schema scriptbrasil;
use scriptbrasil;


--
-- CADASTROS
--

drop table if exists records;
create table records
(
  id            varchar(21) not null primary key,
  registration  varchar(21) unique,
  name          varchar(50),
  rg            varchar(50),
  vehicle       varchar(50),
  vehicle_plate varchar(50),
  client_type   varchar(50),
  uf            char(2),
  city          varchar(60),
  company       varchar(60),
  photo         varchar(60),
  status        tinyint(1) comment '0=não;1=liberado',
  created_at    timestamp default current_timestamp,
  updated_at    datetime null
)

USE mysql;
CREATE USER 'user'@'%' IDENTIFIED BY 'P@ssW0rd';
GRANT ALL ON *.* TO 'user'@'%';
FLUSH PRIVILEGES;
