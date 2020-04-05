--  start table.sql

drop table Area cascade constraints;                          
drop table Mission_takePlace_assign1 cascade constraints;     
drop table Mission_takePlace_assign2 cascade constraints;     
drop table Mission_takePlace_assign3 cascade constraints;     
drop table General cascade constraints;                       

drop table MilitaryUnit cascade constraints;    
drop table MissionBudgetReport_record cascade constraints;    
drop table MUBudgetReport_record cascade constraints;   

drop table Combatant cascade constraints;                     
drop table Commander cascade constraints;                     
drop table Soldier_enrolls cascade constraints;      

drop table Vehicle_has1 cascade constraints;                  
drop table Vehicle_has2 cascade constraints;                  
drop table Vehicle_has3 cascade constraints;      
             
drop table Weapon_equip1 cascade constraints;                 
drop table Weapon_equip2 cascade constraints;                 
drop table Weapon_equip3 cascade constraints;           


CREATE TABLE General(
    GID NUMBER primary key,
	General_name varchar2(50),
	General_rank varchar2(50)
);
-- grant ALL PRIVILEGES on General to public;

CREATE TABLE Area(
    AreaName VARCHAR2(50), 
    AreaID NUMBER Primary Key, 
    Terrain VARCHAR2(50), 
    Country VARCHAR2(50)
);


CREATE TABLE MilitaryUnit(
	MUID NUMBER Primary Key,
	Capacity  NUMBER,
    CID   NUMBER,
    Death NUMBER
);

CREATE TABLE Mission_takePlace_assign1(
    MissionID VARCHAR2(50) Primary Key, 
    Title VARCHAR2(50), 
    StartDate VARCHAR2(50)
);


CREATE TABLE Mission_takePlace_assign2(
    EndDate VARCHAR2(50) Primary Key, 
    Mission_status VARCHAR2(50)
);


CREATE TABLE Mission_takePlace_assign3(
    MissionID VARCHAR2(50), 
    AreaID NUMBER, 
    GID NUMBER, 
    MUID NUMBER, 
    EndDate VARCHAR2(50),
    Primary Key(MissionID, AreaID, GID, MUID, EndDate), 
    Foreign Key(AreaID) References Area (AreaID) ON DELETE CASCADE,
    Foreign Key(GID) References General (GID) ON DELETE CASCADE,
    Foreign Key(MUID) References MilitaryUnit (MUID) ON DELETE CASCADE,
    Foreign Key(EndDate) References Mission_takePlace_assign2 (EndDate) ON DELETE CASCADE,
    Foreign Key(MissionID) References Mission_takePlace_assign1 (MissionID) ON DELETE CASCADE
);
CREATE TABLE MissionBudgetReport_record(
	MUID NUMBER,
    Amount NUMBER,
    FileNumber NUMBER,
    Primary Key(MUID, FileNumber), 
	Foreign Key (MUID) References MilitaryUnit (MUID) ON DELETE CASCADE
);

CREATE TABLE MUBudgetReport_record(
	Budget_year  NUMBER,
    Amount  NUMBER,
	MUID NUMBER,
    Primary Key(MUID, Budget_year), 
	Foreign Key (MUID) References MilitaryUnit (MUID) ON DELETE CASCADE
);


CREATE TABLE Combatant(
    CID NUMBER Primary Key,
    Combatant_name varchar2(50), 
    HealthStatus varchar2(50), 
    Hometown varchar2(50), 
    Height NUMBER, 
    Combatant_weight NUMBER, 
    Age NUMBER, 
    Service_year NUMBER,
    MUID NUMBER,
    Foreign Key (MUID) References MilitaryUnit (MUID) ON DELETE CASCADE
);


CREATE TABLE Commander(
	CMID NUMBER primary key,
	Commander_rank varchar2(50), 
    Foreign Key (CMID) References Combatant (CID) ON DELETE CASCADE
);
CREATE TABLE Soldier_enrolls(
    SoID NUMBER primary key,  
    Kills NUMBER,
    Foreign Key (SoID) References Combatant (CID) ON DELETE CASCADE
);

CREATE TABLE Vehicle_has1(
    Make varchar2(50), 
    VehicleType varchar2(50), 
    Capacity NUMBER,
    FuelUsage NUMBER,
    primary key(Make, VehicleType)
);
CREATE TABLE Vehicle_has2(
    PID varchar2(50),
    MUID NUMBER,
    primary key(PID),
    Foreign Key (MUID) References MilitaryUnit (MUID) ON DELETE SET NULL
);
CREATE TABLE Vehicle_has3(
    PID varchar2(50),
    Make varchar2(50),
    VehicleType varchar2(50),
    primary key(PID, Make, VehicleType),
    Foreign Key (PID) References Vehicle_has2 (PID) ON DELETE CASCADE,
    Foreign Key (Make, VehicleType) References Vehicle_has1 (Make, VehicleType) ON DELETE CASCADE
);
CREATE TABLE Weapon_equip1(
    Manufacturer varchar2(50),  
    WeaponName varchar2(50), 
    Damage NUMBER, 
    WeaponRange NUMBER, 
    MagazineCapacity NUMBER, 
    AmmoType NUMBER, 
    primary key(Manufacturer, WeaponName)
);

CREATE TABLE Weapon_equip2(
    WID NUMBER,
    WeaponYear NUMBER,
    SoID NUMBER,
    Condition VARCHAR2(50),
    Primary Key(WID),
	Foreign Key (SoID) References Soldier_enrolls (SoID) ON DELETE SET NULL
);

CREATE TABLE Weapon_equip3 (
    WID NUMBER, 
    Manufacturer varchar2(50), 
    WeaponName varchar2(50),
    Primary Key (WID, Manufacturer, WeaponName),
    Foreign Key (WID) References Weapon_equip2 (WID) ON DELETE CASCADE,
    Foreign Key (Manufacturer, WeaponName) References Weapon_equip1 (Manufacturer, WeaponName) ON DELETE CASCADE
);

insert into General values(1,'Theo Walsh','Lieutenant-General');
insert into General values(2,'Zac Matthews','Colonel');
insert into General values(3,'Emily Irwin','Lieutenant');
insert into General values(4,'Sara Baxter','Second Lieutenant');
insert into General values(5,'Julien Barron','Second Lieutenant'); 

insert into Area values('Vancouver',1,'Urban','Canada'); 
insert into Area values('British Columbia Mountain Range',2,'Mountain','Canada'); 
insert into Area values('South Dakota Plain',3,'Plain','United States'); 
insert into Area values('Northeast Siberia',4,'Plain','Russia'); 
insert into Area values('Picardy Forest',5,'Forest','France'); 

insert into MilitaryUnit values(1,7,1,1);
insert into MilitaryUnit values(2,12,2,0);
insert into MilitaryUnit values(3,5,3,2);
insert into MilitaryUnit values(4,10,4,0);
insert into MilitaryUnit values(5,8,5,0);

insert into Mission_takePlace_assign1 values(1,'Storm Operation', '2020-01-03');
insert into Mission_takePlace_assign1 values(2,'Code001', '2017-06-08');
insert into Mission_takePlace_assign1 values(3,'Rescue X', '2018-03-15');
insert into Mission_takePlace_assign1 values(4,'Black Sea Operation', '2020-02-11');
insert into Mission_takePlace_assign1 values(5,'BKSN', '2019-12-26');

insert into Mission_takePlace_assign2 values('2020-01-05', 'FAILED');
insert into Mission_takePlace_assign2 values('2017-11-20','SUCCESS');
insert into Mission_takePlace_assign2 values('2018-03-18','SUCCESS');
insert into Mission_takePlace_assign2 values('2020-03-09', 'SUCCESS');
insert into Mission_takePlace_assign2 values('2020-01-26', 'FAILED');

insert into Mission_takePlace_assign3 values(1,1,1,5,'2020-01-05');
insert into Mission_takePlace_assign3 values(2,5,4,2,'2017-11-20');
insert into Mission_takePlace_assign3 values(3,3,3,4,'2018-03-18');
insert into Mission_takePlace_assign3 values(4,4,5,3,'2020-03-09');
insert into Mission_takePlace_assign3 values(5,2,2,1,'2020-01-26');
insert into Mission_takePlace_assign3 values(5,1,2,1,'2020-01-26');
insert into Mission_takePlace_assign3 values(5,2,1,1,'2020-01-26');
insert into Mission_takePlace_assign3 values(5,3,2,1,'2020-01-26');
insert into Mission_takePlace_assign3 values(5,4,2,1,'2020-01-26');
insert into Mission_takePlace_assign3 values(5,5,2,1,'2020-01-26');

insert into MissionBudgetReport_record values(1,20000,1000);
insert into MissionBudgetReport_record values(2,50000,1001);
insert into MissionBudgetReport_record values(3,42000,1002);
insert into MissionBudgetReport_record values(4,8000,1003);
insert into MissionBudgetReport_record values(5,5000,1004);

insert into MUBudgetReport_record values(2015,5000,1);
insert into MUBudgetReport_record values(2019,9000,2);
insert into MUBudgetReport_record values(2018,4000,3);
insert into MUBudgetReport_record values(2018,4500,4);
insert into MUBudgetReport_record values(2017,8000,5);

insert into Combatant values(1, 'Jayden Young', 'Healthy', 'Vancouver', 1.84, 76, 43, 10, 1);
insert into Combatant values(2, 'Natasha Thompson', 'Healthy', 'Richmond', 1.7, 62, 45, 12, 2);
insert into Combatant values(3, 'Rene Jarvis', 'Healthy', 'Mission', 1.76, 61, 32, 7, 3);
insert into Combatant values(4, 'Leo Anderson', 'Healthy', 'Arkham', 1.9, 80, 37, 9, 4);
insert into Combatant values(5, 'Journey Elliott', 'Healthy', 'Toronto', 1.82, 84, 38, 10, 5);
insert into Combatant values(6, 'Harriet Gray', 'Healthy', 'London', 1.84, 83, 31, 8, 1);
insert into Combatant values(7, 'Katelyn Dotson', 'Injured', 'Ottawa', 1.75, 65, 29, 6, 2);
insert into Combatant values(8, 'Darrell Richmond', 'Healthy', 'Ottawa', 1.74, 69, 35, 5, 5);
insert into Combatant values(9, 'Georgia Brown', 'Healthy', 'Kelowna', 1.76, 77, 36, 6, 3);
insert into Combatant values(10, 'Emiliano Mullen', 'Injured', 'Vancouver', 1.88, 84, 27, 4, 4);

insert into Commander values(1, 'Team Leader');
insert into Commander values(2, 'Team Leader');
insert into Commander values(3, 'Group Leader');
insert into Commander values(4, 'Second Group Leader');
insert into Commander values(5, 'Second Team Leader');

insert into Soldier_enrolls values(6, 2);
insert into Soldier_enrolls values(7, 1);
insert into Soldier_enrolls values(8, 0);
insert into Soldier_enrolls values(9, 0);
insert into Soldier_enrolls values(10, 2);

insert into Vehicle_has1 values('Krauss-Maffei Wegmann Maschinenbau Kiel', 'Army', 50, 5);
insert into Vehicle_has1 values('Textron Marine and Land Systems', 'Airforce', 30, 4);
insert into Vehicle_has1 values('Krauss-Maffei Wegmann Maschinenbau Kiel zwei', 'Army', 50, 5);
insert into Vehicle_has1 values('Krauss-Maffei Wegmann Maschinenbau Kiel drei', 'Amry', 50, 5);
insert into Vehicle_has1 values('AVIC I', 'Navy', 35, 3);
insert into Vehicle_has1 values('AVIC II', 'Navy', 30, 3);
insert into Vehicle_has1 values('Norinco', 'Airforce', 30, 5);
insert into Vehicle_has1 values('MacDonald Dettwiler', 'Airforce', 30, 6);
insert into Vehicle_has1 values('Colt Canada', 'Airforce', 45, 4);
insert into Vehicle_has1 values('Arva Industries', 'Army', 45, 4);
insert into Vehicle_has1 values('Aeryon Labs', 'Army', 120, 5);
insert into Vehicle_has1 values('Rose Mons', 'Navy', 120, 3);
insert into Vehicle_has1 values('Bombardier', 'Army', 120, 5);
insert into Vehicle_has1 values('Glock', 'Amry', 150, 4);
insert into Vehicle_has1 values('German Naval Group', 'Navy', 150, 4);

insert into Vehicle_has2 values(1, 5);
insert into Vehicle_has2 values(2, 4);
insert into Vehicle_has2 values(3, 1);
insert into Vehicle_has2 values(4, 3);
insert into Vehicle_has2 values(5, 2);
insert into Vehicle_has2 values(6, NULL);
insert into Vehicle_has2 values(7, NULL);
insert into Vehicle_has2 values(8, NULL);
insert into Vehicle_has2 values(9, NULL);
insert into Vehicle_has2 values(10, NULL);
insert into Vehicle_has2 values(11, NULL);
insert into Vehicle_has2 values(12, NULL);
insert into Vehicle_has2 values(13, NULL);
insert into Vehicle_has2 values(14, NULL);
insert into Vehicle_has2 values(15, NULL);

insert into Vehicle_has3 values(1, 'Krauss-Maffei Wegmann Maschinenbau Kiel', 'Army');
insert into Vehicle_has3 values(2, 'Textron Marine and Land Systems', 'Airforce');
insert into Vehicle_has3 values(3, 'Krauss-Maffei Wegmann Maschinenbau Kiel zwei', 'Army');
insert into Vehicle_has3 values(4, 'Krauss-Maffei Wegmann Maschinenbau Kiel drei', 'Amry');
insert into Vehicle_has3 values(5, 'AVIC I', 'Navy');
insert into Vehicle_has3 values(6, 'AVIC II', 'Navy');
insert into Vehicle_has3 values(7, 'Norinco', 'Airforce');
insert into Vehicle_has3 values(8, 'MacDonald Dettwiler', 'Airforce');
insert into Vehicle_has3 values(9, 'Colt Canada', 'Airforce');
insert into Vehicle_has3 values(10, 'Arva Industries', 'Army');
insert into Vehicle_has3 values(11, 'Aeryon Labs', 'Army');
insert into Vehicle_has3 values(12, 'Rose Mons', 'Navy');
insert into Vehicle_has3 values(13, 'Bombardier', 'Army');
insert into Vehicle_has3 values(14, 'Glock', 'Amry');
insert into Vehicle_has3 values(15, 'German Naval Group', 'Navy');

insert into Weapon_equip1 values('United Technologies','M16A4',54,400,30,5.56);
insert into Weapon_equip1 values('BAE System','AWM',85,1600,7,300);
insert into Weapon_equip1 values('BAE System','M249',85,700,100,5.56);
insert into Weapon_equip1 values('Norico','QBZ95',60,400,30,5.56);
insert into Weapon_equip1 values('Norico','RGB-7',100,700,1,93);
insert into Weapon_equip1 values('Norico','Desert Eagle',60,200,7,0.44);
insert into Weapon_equip1 values('Kalashnikov Concern','AK-47',80,400,30,7.62);
insert into Weapon_equip1 values('TsNIITochMash','AN94',78,400,30,7.62);
insert into Weapon_equip1 values('Raytheon','Thompson',60,300,45,0.45);
insert into Weapon_equip1 values('Raytheon','RPK',80,800,60,7.62);
insert into Weapon_equip1 values('TsNIITochMash','DP-28',80,800,47,7.62);
insert into Weapon_equip1 values('Tula Arms Plant','MG42',79,800,100,7.62);
insert into Weapon_equip1 values('ST Kinetics','Gatling',90,1000,500,0.3);
insert into Weapon_equip1 values('Empresa Nacional Santa Bárbara','Type 69 RPG',97,600,1,85);
insert into Weapon_equip1 values('ST Kinetics','PF-89',98,400,1,80);
insert into Weapon_equip1 values('Armament Research and Development Establishment','RPG-2',96,200,1,82);
insert into Weapon_equip1 values('Armament Research and Development Establishment','RPG-16',90,800,1,58.3);

insert into Weapon_equip2 values(1,1998,6,'Bad');
insert into Weapon_equip2 values(2,1996,8,'Good');
insert into Weapon_equip2 values(3,1984,8,'Good');
insert into Weapon_equip2 values(4,1995,9,'Excellent');
insert into Weapon_equip2 values(5,1961,8,'Good');
insert into Weapon_equip2 values(6,1983,7,'Bad');
insert into Weapon_equip2 values(7,1946,8,'Excellent');
insert into Weapon_equip2 values(8,1980,6,'Good');
insert into Weapon_equip2 values(9,1860,7,'Good');
insert into Weapon_equip2 values(10,1961,9,'Bad');
insert into Weapon_equip2 values(11,1927,10,'Good');
insert into Weapon_equip2 values(12,1942,10,'Good');
insert into Weapon_equip2 values(13,1861,8,'Good');
insert into Weapon_equip2 values(14,1970,7,'Bad');
insert into Weapon_equip2 values(15,1980,7,'Excellent');
insert into Weapon_equip2 values(16,1954,6,'Bad');
insert into Weapon_equip2 values(17,1968,9,'Good');

insert into Weapon_equip3 values(1,'United Technologies','M16A4');
insert into Weapon_equip3 values(2,'BAE System','AWM');
insert into Weapon_equip3 values(3,'BAE System','M249');
insert into Weapon_equip3 values(4,'Norico','QBZ95');
insert into Weapon_equip3 values(5,'Norico','RGB-7');
insert into Weapon_equip3 values(6,'Norico','Desert Eagle');
insert into Weapon_equip3 values(7,'Kalashnikov Concern','AK-47');
insert into Weapon_equip3 values(8,'TsNIITochMash','AN94');
insert into Weapon_equip3 values(9,'Raytheon','Thompson');
insert into Weapon_equip3 values(10,'Raytheon','RPK');
insert into Weapon_equip3 values(11,'TsNIITochMash','DP-28');
insert into Weapon_equip3 values(12,'Tula Arms Plant','MG42');
insert into Weapon_equip3 values(13,'ST Kinetics','Gatling');
insert into Weapon_equip3 values(14,'Empresa Nacional Santa Bárbara','Type 69 RPG');
insert into Weapon_equip3 values(15,'ST Kinetics','PF-89');
insert into Weapon_equip3 values(16,'Armament Research and Development Establishment','RPG-2');
insert into Weapon_equip3 values(17,'Armament Research and Development Establishment','RPG-16');  

/*
-- Select: get units where cap > sl1;
SELECT * FROM MilitaryUnit WHERE Capacity > {$_GET['sl1']};
SELECT * FROM MilitaryUnit WHERE Capacity > 1;

-- Project: project Combatant_name, CID, MUID
SELECT Combatant_name, CID, MUID FROM Combatant;


-- Join: Join Combatant Vehicle_has2 Vehicle_has3
  
SELECT Combatant_name,Make,VehicleType
FROM Combatant, Vehicle_has2, Vehicle_has3
WHERE Combatant.MUID = Vehicle_has2.MUID and Vehicle_has2.PID = Vehicle_has3.PID;


-- Agg: total num of Combatant older than 30.
SELECT Count(*) FROM Combatant WHERE Age >= 30;


-- groupby:
-- find the muid with the lowest avg age (youngest unit)
SELECT MIN(AvgAge) AS LowestAvgAge FROM (SELECT MUID, AVG(Age) AS AvgAge FROM Combatant GROUP BY MUID);


-- todo
-- divide
MUNIT that have been to every location

SELECT m.MUID FROM MilitaryUnit m WHERE NOT EXISTS ((SELECT a.AreaID from Area a) MINUS (select t.AreaID from Mission_takePlace_assign3 t where t.MUID = m.MUID));

SELECT m.MUID
FROM MilitaryUnit as m
WHERE NOT EXISTS
    (
        (SELECT a.AreaID 
        from Area as a) 
    EXCEPT
        (select t.AreaID
        from Mission_takePlace_assign3 as t
        where t.MUID = m.MUID));

SELECT s.SName
FROM student s
WHERE NOT EXISTS
    ((SELECT c.cid from course c) 
    EXCEPT
    (select E.cid
    from Enrolled E
    where E.sid = S.sid));

SELECT * FROM Area;
SELECT * FROM Area a WHERE NOT EXISTS ((SELECT a.AreaID from Area a));
SELECT * FROM Area a WHERE NOT EXISTS ((SELECT a.AreaID from Area a) MINUS (SELECT a.AreaID from Area a));
select * from AREA as a;
*/