
drop table Area cascade constraints;                        -- DONE
drop table Mission_takePlace_assign1 cascade constraints;   -- DONE
drop table Mission_takePlace_assign2 cascade constraints;   -- DONE
drop table Mission_takePlace_assign3 cascade constraints;   -- DONE
drop table General cascade constraints;                     -- DONE
drop table Combatant cascade constraints;                   -- DONE
drop table Commander cascade constraints;                   -- DONE
drop table Soldier_enrolls cascade constraints;             -- DONE
drop table MissionBudgetReport_record cascade constraints;  -- DONE
drop table MUBudgetReport_record cascade constraints;       -- DONE
drop table MUnit cascade constraints;                       -- DONE
drop table Vehicle_has1 cascade constraints;                -- DONE
drop table Vehicle_has2 cascade constraints;                -- DONE
drop table Vehicle_has3 cascade constraints;                -- DONE 
drop table Weapon_equip1 cascade constraints;               -- DONE
drop table Weapon_equip2 cascade constraints;               -- DONE
drop table Weapon_equip3 cascade constraints;               -- DONE

CREATE TABLE Area (
    AreaName VARCHAR2(50), 
    LID VARCHAR2(50) Primary Key, 
    Terrain VARCHAR2(50), 
    Country VARCHAR2(50)
);


CREATE TABLE Mission_takePlace_assign1(
    MissionID VARCHAR2(50) Primary Key, 
    Title VARCHAR2(50), 
    StartDate DATE,
    Foreign Key(MissionID) References Mission_takePlace_assign3 (EndDate) ON DELETE CASCADE
);


CREATE TABLE Mission_takePlace_assign2(
    EndDate NUMBER Primary Key, 
    Mission_status VARCHAR2(50),
    Foreign Key(EndDate) References Mission_takePlace_assign3 (EndDate) ON DELETE CASCADE
);


CREATE TABLE Mission_takePlace_assign3(
    MissionID VARCHAR2(50), 
    LID NUMBER, 
    GID NUMBER, 
    MUID NUMBER, 
    EndDate DATE,
    Primary Key(MissionID, LID, GID, MUID, EndDate), 
    Foreign Key(LID) References Area (LID) ON DELETE CASCADE,
    Foreign Key(GID) References General (GID) ON DELETE CASCADE,
    Foreign Key(MUID) References MilitaryUnit (MUID) ON DELETE CASCADE
);

CREATE TABLE General(
	GID NUMBER primary key,
	General_name varchar2(50),
	General_rank varchar2(50)
);

CREATE TABLE MilitaryUnit(
	MUID NUMBER Primary Key,
	Size  varchar2(50),
    CID   NUMBER,
    Death NUMBER,

	Foreign Key (CID) References Commander (CID) ON DELETE CASCADE
);

CREATE TABLE MissionBudgetReport_record(
	MUID NUMBER,
    Amount NUMBER,
    FileNumber NUMBER,
    Primary Key(MUID, FileNumber), 
	Foreign Key (MUID) References MilitaryUnit (CID) ON DELETE CASCADE
);
CREATE TABLE MUBudgetReport_record(
	MUID NUMBER,
	Budget_year  NUMBER,
    Amount  NUMBER,
    Primary Key(MUID, Budget_year), 
	Foreign Key (MUID) References MilitaryUnit (CID) ON DELETE CASCADE
);


CREATE TABLE Weapon_equip2(
    WID VARCHAR2(50),
    Weapon_year NUMBER,
    SoID NUMBER,
    Condition VARCHAR2(50),
    
    Primary Key(WID),
	Foreign Key (SoID) References Soldier_enrolls (SoID) ON DELETE CASCADE
);

CREATE TABLE Weapon_equip3 (
    WID varchar2(50), 
    Manufacturer‎ varchar2(50), 
    Weapon_name varchar2(50),

    Primary Key (WID, Manufacturer, Weapon_name)
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
	Commander_rank NUMBER, 
    Foreign Key (CMID) References Combatant (CID) ON DELETE CASCADE
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

CREATE TABLE Weapon_equip1(
    Manufacturer‎ varchar2 primary key,  
    WeaponName varchar2(50) primary key, 
    Damage varchar2(50), 
    Weapon_range varchar2(50), 
    MagazineCapacity NUMBER, 
    AmmoType NUMBER, 
    primary key(Manufacturer, WeaponName)
);

CREATE TABLE Vehicle_has1(
    Make varchar2(50), 
    VehicleType varchar2(50), 
    Size NUMBER,
    FuelUsage NUMBER,

    primary key(Make, VehicleType)
);
CREATE TABLE Vehicle_has2(
    PID varchar2(50),
    MUID NUMBER,

    primary key(PID),
    Foreign Key (MUID) References MilitaryUnit (MUID) ON DELETE CASCADE

);
CREATE TABLE Vehicle_has3(
    PID varchar2(50),
    Make varchar2(50),
    VehicleType varchar2(50),

    primary key(PID, Make, VehicleType)
);
