--SQL 기초 명령어 필기

--패스 세팅
setx mypath MySQL

--서버 접속
mysql -uroot -p

--비번 변경
set password = 'your password';

--셰마(영국식발음) 생성
create database Anydb;

--셰마 삭제
drop database Anydb;

--셰마 확인
show databases;

--셰마 진입
use Anydb;


--데이터 타입
--https://www.techonthenet.com/mysql/datatypes.php


--테이블 생성
create table Anytable(
	 id
		int(11)
		not null
		auto_increment,
	 title
		varchar(100)
		not null,
	 description
		text
		null,
	 created
		datetime
		not null,
	 author
		varchar(30)
		null,
	 profile
		varchar(100)
		null,
primary key(id)
);


--테이블 목록 확인
show tables;

--테이블 내부 확인
desc Anytable;

--테이블 항목 추가
insert into Anytable (
	attr1,
	attr2,
	created,
	attr3,
	attr4
) values ( 
	‘value1’,
	‘value2’,
	now(),
	‘value3’,
	‘value4’
);

--테이블 속성 추가
alter table Anytable
	add column
		attr5
			int(11);

--테이블 내 항목 조회
--(limit가 없으면 컴퓨터가 터질 수 있음)

--https://dev.mysql.com/doc/refman/8.0/en/select.html

select *
	from Anytable;

select attr1,attr2
	from Anytable;

select attr1,attr2
	from Anytable
	where attr2=’value2’;

select attr1,attr2
	from Anytable
	where attr2=’value2’
	order by attr1 desc;

select attr1,attr2
	from Anytable
	where attr2=’value2’
	order by attr1 desc
	limit 10;




--테이블 내 항목 수정
-- (where가 없으면 db가 날아갈 수 있음)

--https://dev.mysql.com/doc/refman/8.0/en/update.html

update Anytable
	set
		attr2=’newValue2’,
		attr3=’newValue3’
	where
		attr1=’value1’;



--테이블 내 항목 삭제
--(where가 없으면 db가 날아감)
delete from Anytable
	where 
		attr1 = ‘value1’;




--관계형 데이터베이스 조인
select *
	from Anytable1
	inner join Anytable2
		on Anytable1.attr = Anytable2.attr;


--관계형 데이터베이스 풀 조인
(select *
	from Anytable1
	left join Anytable2
		on Anytable1.attr = Anytable2.attr)
union
(select *
	from Anytable1
	right join Anytable2
		on Anytable1.attr = Anytable2.attr)
