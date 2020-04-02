
drop table Area cascade constraints;
-- drop table Mission_takePlace_assign1 cascade constraints;   
-- drop table Mission_takePlace_assign2 cascade constraints;   
-- drop table Mission_takePlace_assign3 cascade constraints;   
drop table Mission_takePlace_assign cascade constraints;  
drop table General cascade constraints;                     
drop table Combatant cascade constraints;                   
drop table Commander cascade constraints;                   
drop table Soldier_enrolls cascade constraints;             
drop table MissionBudgetReport_record cascade constraints;  
drop table MUBudgetReport_record cascade constraints; -- DONE MZ      
drop table MilitaryUnit cascade constraints; -- DONE MZ              
drop table Vehicle_has1 cascade constraints; -- DONE MZ              
drop table Vehicle_has2 cascade constraints; -- DONE MZ      
drop table Vehicle_has3 cascade constraints; -- DONE MZ       
drop table Weapon_equip1 cascade constraints; -- DONE MZ              
drop table Weapon_equip2 cascade constraints; -- DONE MZ        
drop table Weapon_equip3 cascade constraints; -- DONE MZ         

CREATE TABLE Area(
    LID VARCHAR2(50) primary key, 
    AreaName VARCHAR2(50), 
    Terrain VARCHAR2(50), 
    Country VARCHAR2(50)
);

CREATE TABLE General(
	GID NUMBER primary key,
	General_name varchar2(50),
	General_rank varchar2(50)
);

CREATE TABLE Combatant(
    CID NUMBER Primary Key,
    Combatant_name varchar2(50), 
    HealthStatus varchar2(50), 
    Hometown varchar2(50), 
    Height NUMBER, 
    Combatant_weight NUMBER, 
    Age NUMBER, 
    Service_year NUMBER
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

CREATE TABLE Weapon_equip3 (
    WID varchar2(50), 
    Manufacturer‎ varchar2(50), 
    Weapon_name varchar2(50),
    Primary Key (WID, Manufacturer‎, Weapon_name)
);

CREATE TABLE Weapon_equip1(
    Weapon_manufacturer‎ varchar2(50),
    WeaponName varchar2(50), 
    Damage NUMBER, 
    Weapon_range NUMBER, 
    MagazineCapacity NUMBER, 
    AmmoType NUMBER, 
    primary key(Weapon_manufacturer‎, WeaponName)
);

CREATE TABLE Vehicle_has1(
    Make varchar2(50), 
    VehicleType varchar2(50), 
    Vehicle_size NUMBER,
    FuelUsage NUMBER,
    primary key(Make, VehicleType)
);

CREATE TABLE Vehicle_has3(
    PID varchar2(50),
    Make varchar2(50),
    VehicleType varchar2(50),
    primary key(PID, Make, VehicleType)
);

CREATE TABLE Commander(
	CMID NUMBER primary key,
	Commander_rank NUMBER, 
    Foreign Key (CMID) References Combatant (CID) ON DELETE CASCADE
);

CREATE TABLE MilitaryUnit(
	MUID NUMBER Primary Key,
	Unit_size varchar2(50),
    CMID NUMBER,
    Death NUMBER,
    Foreign Key (CMID) References Commander (CMID) ON DELETE CASCADE
);

CREATE TABLE Mission_takePlace_assign(
    MissionID VARCHAR2(50), 
    LID VARCHAR2(50), 
    Title VARCHAR2(50), 
    GID NUMBER, 
    MUID NUMBER, 
    Mission_status VARCHAR2(50),
    StartDate DATE,
    EndDate DATE,
    Primary Key(MissionID), 
    Foreign Key(LID) References Area (LID) ON DELETE CASCADE,
    Foreign Key(GID) References General (GID) ON DELETE CASCADE,
    Foreign Key(MUID) References MilitaryUnit (MUID) ON DELETE CASCADE
);

-- CREATE TABLE Mission_takePlace_assign3(
--     MissionID VARCHAR2(50), 
--     LID VARCHAR2(50), 
--     GID NUMBER, 
--     MUID NUMBER, 
--     EndDate DATE,
--     Primary Key(MissionID, LID, GID, MUID, EndDate), 
--     Foreign Key(LID) References Area (LID) ON DELETE CASCADE,
--     Foreign Key(GID) References General (GID) ON DELETE CASCADE,
--     Foreign Key(MUID) References MilitaryUnit (MUID) ON DELETE CASCADE
-- );

-- CREATE TABLE Mission_takePlace_assign1(
--     MissionID VARCHAR2(50) Primary Key, 
--     Title VARCHAR2(50), 
--     StartDate DATE,
--     Foreign Key(MissionID) References Mission_takePlace_assign3 (MissionID) ON DELETE CASCADE
-- );

-- CREATE TABLE Mission_takePlace_assign2(
--     EndDate DATE Primary Key, 
--     Mission_status VARCHAR2(50),
--     Foreign Key(EndDate) References Mission_takePlace_assign3 (EndDate) ON DELETE CASCADE
-- );

CREATE TABLE MissionBudgetReport_record(
	MUID NUMBER,
    Amount NUMBER,
    FileNumber NUMBER,
    Primary Key(MUID, FileNumber), 
	Foreign Key (MUID) References MilitaryUnit (MUID) ON DELETE CASCADE
);

CREATE TABLE MUBudgetReport_record(
	MUID NUMBER,
	Budget_year NUMBER,
    Amount NUMBER,
    Primary Key(MUID, Budget_year), 
	Foreign Key (MUID) References MilitaryUnit (MUID) ON DELETE CASCADE
);

CREATE TABLE Soldier_enrolls(
    SoID NUMBER primary key,
    Soldier_name varchar2(50), 
    HealthStatus varchar2(50), 
    Hometown varchar2(50), 
    Height NUMBER, 
    Soldier_weight NUMBER, 
    Age NUMBER, 
    Service_year NUMBER, 
    Kills NUMBER,
    MUID NUMBER,
    Foreign Key (MUID) References MilitaryUnit (MUID) ON DELETE CASCADE
);

CREATE TABLE Weapon_equip2(
    WID VARCHAR2(50),
    Weapon_year NUMBER,
    SoID NUMBER,
    Condition VARCHAR2(50),
    Primary Key(WID),
	Foreign Key (SoID) References Soldier_enrolls (SoID) ON DELETE CASCADE
);

CREATE TABLE Vehicle_has2(
    PID varchar2(50),
    MUID NUMBER,
    primary key(PID),
    Foreign Key (MUID) References MilitaryUnit (MUID) ON DELETE CASCADE
);

-- add all the tuples
insert into Weapon_equip1 values('United Technologies','M16A4',54,3.4,400,30,5.56);
insert into Weapon_equip1 values('BAE System','AWM',85,7.2,1600,7,300);
insert into Weapon_equip1 values('BAE System','M249',85,11.3,700,100,5.56);
insert into Weapon_equip1 values('Norico','QBZ95',60,3.7,400,30,5.56);
insert into Weapon_equip1 values('Norico','RGB-7',100,4.5,700,1,93);
insert into Weapon_equip1 values('Norico','Desert Eagle',60,1.2,200,7,0.44);
insert into Weapon_equip1 values('Kalashnikov Concern','AK-47',80,4.8,400,30,7.62);
insert into Weapon_equip1 values('TsNIITochMash','AN94',78,4.9,400,30,7.62);
insert into Weapon_equip1 values('Raytheon','Thompson',60,3.1,300,45,0.45);
insert into Weapon_equip1 values('Raytheon','RPK',80,9.2,800,60,7.62);
insert into Weapon_equip1 values('TsNIITochMash','DP-28',80,11.8,800,47,7.62);
insert into Weapon_equip1 values('Tula Arms Plant','MG42',79,11.6,800,100,7.62);
insert into Weapon_equip1 values('ST Kinetics','Gatling',90,77.2,1000,500,0.3);
insert into Weapon_equip1 values('Empresa Nacional Santa Bárbara','Type 69 RPG',97,4.8,600,1,85);
insert into Weapon_equip1 values('ST Kinetics','PF-89',98,5,400,1,80);
insert into Weapon_equip1 values('Armament Research and Development Establishment','RPG-2',96,4.4,200,1,82);
insert into Weapon_equip1 values('Armament Research and Development Establishment','RPG-16',90,4.6,800,1,58.3);

insert into Weapon_equip2 values(1,1998,8,'Bad');
insert into Weapon_equip2 values(2,1996,14,'Good');
insert into Weapon_equip2 values(3,1984,5,'Good');
insert into Weapon_equip2 values(4,1995,4,'Excellent');
insert into Weapon_equip2 values(5,1961,3,'Good');
insert into Weapon_equip2 values(6,1983,6,'Bad');
insert into Weapon_equip2 values(7,1946,10,'Excellent');
insert into Weapon_equip2 values(8,1980,1,'Good');
insert into Weapon_equip2 values(9,1860,9,'Good');
insert into Weapon_equip2 values(10,1961,7,'Bad');
insert into Weapon_equip2 values(11,1927,11,'Good');
insert into Weapon_equip2 values(12,1942,15,'Good');
insert into Weapon_equip2 values(13,1861,13,'Good');
insert into Weapon_equip2 values(14,1970,2,'Bad');
insert into Weapon_equip2 values(15,1980,12,'Excellent');
insert into Weapon_equip2 values(16,1954,6,'Bad');
insert into Weapon_equip2 values(17,1968,9,'Good');

insert into Weapon_equip3 values(1,'United Technologies','M16A4');
insert into Weapon_equip3 values(2,'BAE System','AWM');
insert into Weapon_equip3 values(3,'BAE System','M249');
insert into Weapon_equip3 values(4,'Norico','QBZ95');
insert into Weapon_equip3 values(5,'Norico','RGB-7');
insert into Weapon_equip3 values(6,'Norico','Desert Eagle');
insert into Weapon_equip3 values(7,'Kalashnikov Concern');
insert into Weapon_equip3 values(8,'TsNIITochMash','AN94');
insert into Weapon_equip3 values(9,'Raytheon','Thompson');
insert into Weapon_equip3 values(10,'Raytheon','RPK');
insert into Weapon_equip3 values(11,'TsNIITochMash','DP-28');
insert into Weapon_equip3 values(12,'Tula Arms Plant','MG42','Type 69 RPG');
insert into Weapon_equip3 values(13,'ST Kinetics','Gatling');
insert into Weapon_equip3 values(14,'Empresa Nacional Santa Bárbara','Type 69 RPG');
insert into Weapon_equip3 values(15,'ST Kinetics','PF-89');
insert into Weapon_equip3 values(16,'Armament Research and Development Establishment','RPG-2');
insert into Weapon_equip3 values(17,'Armament Research and Development Establishment','RPG-16');  




