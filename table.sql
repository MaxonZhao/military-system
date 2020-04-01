
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
drop table MUBudgetReport_record cascade constraints;       
drop table MilitaryUnit cascade constraints;                       
drop table Vehicle_has1 cascade constraints;                
drop table Vehicle_has2 cascade constraints;                
drop table Vehicle_has3 cascade constraints;                 
drop table Weapon_equip1 cascade constraints;               
drop table Weapon_equip2 cascade constraints;               
drop table Weapon_equip3 cascade constraints;               

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

-- CREATE TABLE Combatant(
--     CID NUMBER Primary Key,
--     Combatant_name varchar2(50), 
--     HealthStatus varchar2(50), 
--     Hometown varchar2(50), 
--     Height NUMBER, 
--     Combatant_weight NUMBER, 
--     Age NUMBER, 
--     Service_year NUMBER,
--     MUID NUMBER,
--     Foreign Key (MUID) References MilitaryUnit (MUID) ON DELETE CASCADE
-- );

CREATE TABLE Weapon_equip3 (
    WID varchar2(50), 
    Manufacturer‎ varchar2(50), 
    Weapon_name varchar2(50),
    Primary Key (WID, Manufacturer‎, Weapon_name)
);

CREATE TABLE Weapon_equip1(
    Weapon_manufacturer‎ varchar2(50),
    WeaponName varchar2(50), 
    Damage varchar2(50), 
    Weapon_range varchar2(50), 
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