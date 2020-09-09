/*
	Создание базы данных "TestAppDB"
*/
CREATE DATABASE TestAppDB;

/*
	Список Пользователей
*/
CREATE TABLE Users (
	UserID		INT AUTO_INCREMENT NOT NULL UNIQUE,
	Username	CHAR(24) NOT NULL,
	Password	CHAR(24) NOT NULL,
	PRIMARY KEY (UserID)
);

/*
	Список Задач
*/
CREATE TABLE TaskList (
	TaskID		INT AUTO_INCREMENT NOT NULL,
	Username	CHAR(24) NOT NULL,
	EMail		CHAR(32) NOT NULL,
	Content		TEXT NOT NULL,
	IsDone		BOOLEAN NOT NULL,
	EditDate	DATETIME,
	EditedBy	INT,
	PRIMARY KEY (TaskID)
);


/*
	Добавление записи об Админах
*/
INSERT INTO Users (Username, Password) VALUES
('admin',	'123'),
('timur',	'root');


/*
	Заполнение списка задач
*/
INSERT INTO TaskList (Username, EMail, Content, IsDone, EditDate, EditedBy) VALUES
('Freeman', 	'hellsame97@gmail.com', 'xcc5y99sih3eh3xxtk8tkz0a5', 		'0', 	NULL,			NULL),
('Jovanni', 	'deleniti@ya.com', 		'34ksozhr4jxtd8t1qb5q16365lm', 		'1', 	'2013-03-03',	1),
('Jovanni', 	'hellsame97@gmail.com', 'iwqg98cr45p2vvudyr339mkofr66ov', 	'1', 	'2013-08-15',	1),
('Anonymous', 	'admin@izzylaif.com', 	'yywkoho33qvc2lacxqjrtskfjdf6', 	'0', 	NULL,			NULL),
('Steve', 		'ducimus@gmail.com', 	'9hy8cpk75ivmayj020zw5aksg4ueo3a', 	'1', 	'2013-12-23',	1),
('Mario', 		'evijewym@yopmail.com', '5ik3kb63vo857wv6mkoc79bmub', 		'0', 	NULL,			NULL),
('Jovanni', 	'corrupti@yandex.ru', 	'mm6kuiaaiw3m392pgnoy08uimmn7u7', 	'1', 	'2014-02-22',	1),
('Jovanni', 	'deleniti@ya.com', 		'rof0hgquo2ziknn3fnfb7scfvwhzez', 	'1', 	'2014-03-16',	1),
('Jovanni', 	'dolores@rambler.ru', 	'iama1c86z5pkbqqb92m525h2', 		'0', 	NULL,			NULL),
('Izzy Laif', 	'hellsame97@gmail.com', 'erv3h3ot4fi4ly22u39juoh6dvdt', 	'0', 	NULL,			NULL),
('Steve', 		'evijewym@yopmail.com', 'wch86lvnoennbs6rqboh6aa8', 		'0', 	NULL,			NULL),
('David', 		'corrupti@yandex.ru', 	'g603cwjh65k2i6anacpustkqs7', 		'0', 	NULL,			NULL),
('Steve', 		'deleniti@ya.com', 		'hf2oauifiplhisl63w95rvsmwr504v', 	'0', 	NULL,			NULL),
('RX4D', 		'hellsame97@gmail.com', 'xjnjeo98m9xb8zbim0d2qt8e1d', 		'0', 	NULL,			NULL),
('Freeman', 	'molestias@rambler.ru', 'mltr7q8st6f86eq54tjdyrtj95c', 		'0', 	NULL,			NULL),
('RX4D', 		'deleniti@ya.com', 		'd6au1z7z6d3mz00wvohtvvyqs2uhpbkm', '1', 	'2014-12-28',	1),
('Mario', 		'accusamus@gmail.com', 	'96icv9ns637qera4u37qbbzekcqqtx', 	'0', 	NULL,			NULL),
('Freeman', 	'hellsame97@gmail.com', 'n76179gjqs10ogna2n9l7p2qsz', 		'1', 	'2015-01-17',	1),
('Maria', 		'dolores@rambler.ru', 	'qzq80u5spdlh5b05qs3l1aq7hy6g69n', 	'0', 	NULL,			NULL),
('Altair', 		'admin@izzylaif.com', 	'rk3aj60wbpwoy2efywt0sn2s', 		'0', 	NULL,			NULL),
('Maria', 		'corrupti@yandex.ru', 	'ic87nf8fk7tvoy0140z0k579', 		'1', 	'2015-10-08',	1),
('Izzy Laif', 	'hellsame97@gmail.com', 'g6vof8g8q5aasvr29k6kvw3jh', 		'0', 	NULL,			NULL),
('Freeman', 	'ducimus@gmail.com', 	'hcpc73sixjzix85r3imyuy3f8jt7bh0g', '0', 	NULL,			NULL),
('Mario', 		'admin@izzylaif.com', 	'0pdlotls06m1ye9achwgjepig', 		'1', 	'2016-06-03',	1),
('Freeman', 	'dolores@rambler.ru', 	'vxbyu31wj5jpp7x9oc73ealfsaw0w3z', 	'0', 	NULL,			NULL),
('Freeman', 	'accusamus@gmail.com', 	't52yacy1xgz5or07rl08t6ybms', 		'0', 	NULL,			NULL),
('Mario', 		'accusamus@gmail.com', 	'm2km64dsqgvnpzezzb0v0zozk93', 		'0', 	NULL,			NULL),
('Steve', 		'corrupti@yandex.ru', 	'xxdbqsuy3sykzb4ztzvky9nl7rse', 	'0', 	NULL,			NULL),
('David', 		'molestias@rambler.ru', 'wj3ks2t16sp4zsztwijuxf37nx50n', 	'1', 	'2017-06-07',	1),
('Steve', 		'dolores@rambler.ru', 	'q6old6hltt67satka2gtqtfdhvks7', 	'0', 	NULL,			NULL),
('Altair', 		'dolores@rambler.ru', 	'wur67eadgz7vnq2u5ucebc0j4ve6nn', 	'0', 	NULL,			NULL),
('Anonymous', 	'admin@izzylaif.com', 	'gco6fb4mo5o69m9el7mzpb61kxm', 		'1', 	'2018-07-22',	1),
('RX4D', 		'hellsame97@gmail.com', 'a32rqrk789qrhpxfdct6cmxm', 		'0', 	NULL,			NULL),
('Izzy Laif', 	'ducimus@gmail.com', 	'swp6tpiulaa7gfj5gm9e1ulf2amgvgb', 	'1', 	'2018-11-12',	1),
('David', 		'ducimus@gmail.com', 	'4s9fil56dv4mpbxppem5tax8g', 		'1', 	'2019-02-16',	1),
('Jovanni', 	'corrupti@yandex.ru', 	'fcbio34f2vwg1yopp5p70hufbok28yy', 	'1', 	'2019-03-02',	1),
('Izzy Laif', 	'hellsame97@gmail.com', 'jxkztd5hy5h2vqjxxi1x7e2q9jqglgpp', '0', 	NULL,			NULL),
('Steve', 		'deleniti@ya.com', 		'c6tr9nryos6afc8ofisry7ip5m', 		'1', 	'2019-05-18',	1),
('Maria', 		'deleniti@ya.com', 		'g0fohj2caq40mqpva5zswllvat7w', 	'0', 	NULL,			NULL),
('Altair', 		'evijewym@yopmail.com', 'zmw0ta1oy43hj6znlud4sy25q481q', 	'1', 	'2020-06-13',	1);
