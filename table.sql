/*
mission


*/
drop table Mission_takePlace_assign1 cascade constraints;
drop table Mission_takePlace_assign2 cascade constraints;
drop table Mission_takePlace_assign3 cascade constraints;

CREATE TABLE Mission_takePlace_assign1(
    MissionID: STRING Primary Key, 
    Title: STRING, 
    StartDate: INT,
    Foreign Key(MissionID) References Mission_takePlace_assign3 ON DELETE CASCADE, ON UPDATE CASCADE
);


CREATE TABLE Mission_takePlace_assign2(
    EndDate: INT Primary Key, 
    Status: STRING
    Foreign Key(EndDate) References Mission_takePlace_assign3 ON DELETE CASCADE, ON UPDATE CASCADE
);


CREATE TABLE Mission_takePlace_assign3(
    MissionID: STRING, 
    LID:INTEGER, 
    GID:INTEGER, 
    MUID:INTEGER, 
    EndDate: DATE
    Primary Key(MissionID: STRING, LID:INTEGER, GID:INTEGER, MUID:INTEGER, EndDate: INT), 
    Foreign Key(LID) References Location ON DELETE CASCADE, ON UPDATE CASCADE,
    Foreign Key(GID) References General ON DELETE CASCADE, ON UPDATE CASCADE,
    Foreign Key(MUID) References MilitaryUnit ON DELETE CASCADE, ON UPDATE CASCADE
);
