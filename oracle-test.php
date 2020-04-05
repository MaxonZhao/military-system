<!--Test Oracle file for UBC CPSC304 2018 Winter Term 1
  Created by Jiemin Zhang
  Modified by Simona Radu
  Modified by Jessica Wong (2018-06-22)
  This file shows the very basics of how to execute PHP commands
  on Oracle.  
  Specifically, it will drop a table, create a table, insert values
  update values, and then query for values
 
  IF YOU HAVE A TABLE CALLED "demoTable" IT WILL BE DESTROYED

  The script assumes you already have a server set up
  All OCI commands are commands to the Oracle libraries
  To get the file to work, you must place it somewhere where your
  Apache server can run it, and you must rename it to have a ".php"
  extension.  You must also change the username and password on the 
  OCILogon below to be your ORACLE username and password -->

<html>
    <head>
        <title>CPSC 304 PHP/Oracle Demonstration</title>
    </head>
    <style>
        body {
            background-image:url(data:image/jpeg;base64,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);
            background-size: cover;
        }
    </style>

    <body>
        <h2>Reset</h2>
        <p>If you wish to reset the table press on the reset button. If this is the first time you're running this page, you MUST use reset</p>

        <form method="POST" action="oracle-test.php">
            <!-- if you want another page to load after the button is clicked, you have to specify that page in the action parameter -->
            <input type="hidden" id="resetTablesRequest" name="resetTablesRequest">
            <p><input type="submit" value="Reset" name="reset"></p>
        </form>

        <hr />
        <!--Starts here-->
        <h2>NEW THING: Adding single value to Combatant table</h2>
        <form method="POST" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestInsert" name="requestInsert">
            CID: <input type="text" name="val0"> <br /><br />
            Combatant_name: <input type="text" name="val1"> <br /><br />
            HealthStatus: <input type="text" name="val2"> <br /><br />
            Hometown: <input type="text" name="val3"> <br /><br />
            Height: <input type="text" name="val4"> <br /><br />
            Combatant_weight: <input type="text" name="val5"> <br /><br />
            Age: <input type="text" name="val6"> <br /><br />
            Service_year: <input type="text" name="val7"> <br /><br />
            MUID: <input type="text" name="val8"> <br /><br />

            <input type="submit" value="Insert Button" name="clickInsert"></p>
        </form>

        <hr />

        <h2>NEW THING: Delete a value from Combatant table</h2>
        <form method="POST" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestDelete" name="requestDelete">
            CID: <input type="text" name="deval0"> <br /><br />

            <input type="submit" value="clickDelete" name="clickDelete"></p>
        </form>


        <hr />

        <h2>Update Combatant Name in Combatant</h2>
        <p>The values are case sensitive and if you enter in the wrong case, the update statement will not do anything.</p>

        <form method="POST" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestUpdate" name="requestUpdate">
            Combatant's CID: <input type="text" name="oldName"> <br /><br />
            New Name: <input type="text" name="newName"> <br /><br />

            <input type="submit" value="Update" name="clickUpdate"></p>
        </form>


        <!-- GETTERS: Query -->
        <hr />
        <h2>NEW THING: Selection on Military Unit </h2>
        <form method="GET" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestSelection" name="requestSelection">
            Select military units whose capacity is greater than certain value.<br /><br />
            Capacity > <input type="text" name="sl1"> <br /><br />

            <input type="submit" value="clickSelection" name="clickSelection"></p>
        </form>

        <hr />
        <h2>NEW THING: Projection on Combatant </h2>
        <form method="GET" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestProjection" name="requestProjection">
            CID: <input type="checkbox" name="chval0"> <br /><br />
            Combatant_name: <input type="checkbox" name="chval1"> <br /><br />
            HealthStatus: <input type="checkbox" name="chval2"> <br /><br />
            Hometown: <input type="checkbox" name="chval3"> <br /><br />
            Height: <input type="checkbox" name="chval4"> <br /><br />
            Combatant_weight: <input type="checkbox" name="chval5"> <br /><br />
            Age: <input type="checkbox" name="chval6"> <br /><br />
            Service_year: <input type="checkbox" name="chval7"> <br /><br />
            MUID: <input type="checkbox" name="chval8"> <br /><br />

            <input type="submit" value="clickProjection" name="clickProjection"></p>
        </form>

        <hr />
        <!--Pick one query of this category, which joins at least two tables and 
        performs a meaningful query, and provide an interface for the user to 
        choose this query (e.g. join the Customers and the Transactions table to find 
        the phone numbers of all customers who has purchased a specific item).-->
        <h2>NEW THING: Join Query: </h2>
        <form method="GET" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestJoin" name="requestJoin">
            Find all combatants with their military unit's associated vehicle's make and type<br /><br />

            <input type="submit" value="clickJoin" name="clickJoin"></p>
        </form>

        <hr />
        <h2>NEW THING: Aggregation query </h2>
        <form method="GET" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestAgg" name="requestAgg">
            How many combatants are older than __? <br /><br />
            Number: <input type="text" name="aggNum"> <br /><br />
            <input type="submit" value="clickAgg" name="clickAgg"></p>
        </form>
        <hr />
        <h2>NEW THING: GroupBy </h2>
        <form method="GET" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestGroupBy" name="requestGroupBy">
            Show the military unit with the lowest average age of all military units. <br /><br />

            <input type="submit" value="clickGroupBy" name="clickGroupBy"></p>
        </form>
        <hr />
        <h2>NEW THING: Division </h2>
        <form method="GET" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestDivision" name="requestDivision">
            Show the Military Units that have been to every Area in missions.<br /><br />

            <input type="submit" value="clickDivision" name="clickDivision"></p>
        </form>

        <hr />

        <h2>Result</h2>
        <hr />
        <!-- 
        <h2>Count the Tuples in DemoTable</h2>
        <form method="GET" action="oracle-test.php"> 
            <input type="hidden" id="countTupleRequest" name="countTupleRequest">
            <input type="submit" name="countTuples"></p>
        </form> 
        -->

        <?php
		//this tells the system that it's no longer just parsing html; it's now parsing PHP

        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
            //echo "<br>running ".$cmdstr."<br>";
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr); 
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }

			return $statement;
		}

        function executeBoundSQL($cmdstr, $list) {
            /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
		In this case you don't need to create the statement several times. Bound variables cause a statement to only be
		parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection. 
		See the sample code below for how this function is used */

			global $db_conn, $success;
			$statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn);
                echo htmlentities($e['message']);
                $success = False;
            }

            foreach ($list as $tuple) {
                foreach ($tuple as $bind => $val) {
                    //echo $val;
                    //echo "<br>".$bind."<br>";
                    OCIBindByName($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
				}

                $r = OCIExecute($statement, OCI_DEFAULT);
                if (!$r) {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }

        function printResultCombatant($result) { //prints results from a select statement
            echo "<br>Retrieved data from table Combatant:<br>";
            echo "<table>";
            echo "<tr><th>CID</th><th>Combatant_name</th><th>HealthStatus</th><th>Hometown</th><th>Height</th><th>Combatant_weight</th><th>Age</th><th>Service_year</th><th>MUID</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] 
                . "</td><td>" . $row[5] . "</td><td>" . $row[6] . "</td><td>" . $row[7] . "</td><td>" . $row[8] . "</td><td>"; //or just use "echo $row[0]" 
                // echo $row[0];
            }

            echo "</table>";
        }

        function printResultMilitaryUnit($result) { //prints results from a select statement
            echo "<br>Retrieved data from table MilitaryUnit:<br>";
            echo "<table>";
            echo "<tr><th>MUID</th><th>Capacity</th><th>CID</th><th>Death</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>"; //or just use "echo $row[0]" 
                // echo $row[0];
            }

            echo "</table>";
        }

        function printResultJoin($result) { //prints results from a select statement
            echo "<br>Retrieved data from table MilitaryUnit:<br>";
            echo "<table>";
            echo "<tr><th>Combatant_name</th><th>Make</th><th>VehicleType</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>"; //or just use "echo $row[0]" 
                // echo $row[0];
            }

            echo "</table>";
        }

        function connectToDB() {
            global $db_conn;

            // Your username is ora_(CWL_ID) and the password is a(student number). For example, 
			// ora_platypus is the username and a12345678 is the password.
            // $db_conn = OCILogon("ora_liu650", "a46981452", "dbhost.students.cs.ubc.ca:1522/stu");
            $db_conn = OCILogon("ora_mhlchina", "a28325181", "dbhost.students.cs.ubc.ca:1522/stu");
            if ($db_conn) {
                debugAlertMessage("Database is Connected");
                return true;
            } else {
                debugAlertMessage("Cannot connect to Database");
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            OCILogoff($db_conn);
        }

        function handleResetRequest() {
            global $db_conn;
            // Drop old table
            executePlainSQL("DROP TABLE demoTable");
            // Create new table
            echo "<br> creating new table <br>";
            executePlainSQL("CREATE TABLE demoTable (id int PRIMARY KEY, name char(30))");
            OCICommit($db_conn);
        }

        function handleCountRequest() {
            global $db_conn;

            // $result = executePlainSQL("SELECT Count(*) FROM Combatant");
            $result = executePlainSQL("SELECT Count(*) FROM Combatant");

            if (($row = oci_fetch_row($result)) != false) {
                echo "<br> The number of tuples in Combatant: " . $row[0] . "<br>";
                $result = executePlainSQL("SELECT * FROM Combatant");
		        printResultCombatant($result);
            }
        }

        // tester insert
        function handleJL() {
            global $db_conn;
        
            executePlainSQL("INSERT INTO Combatant values ({$_POST['val0']}, '{$_POST['val1']}', '{$_POST['val2']}', '{$_POST['val3']}', 
                                {$_POST['val4']}, {$_POST['val5']}, {$_POST['val6']}, {$_POST['val7']}, {$_POST['val8']})");
            OCICommit($db_conn);
        }

        function handleDelete() {
            global $db_conn;
            
            executePlainSQL("DELETE FROM Combatant WHERE CID = {$_POST['deval0']}");
            OCICommit($db_conn);
        } 
        function handleUpdate() {
            global $db_conn;

            executePlainSQL("UPDATE Combatant SET Combatant_name = '{$_POST['newName']}' WHERE CID = {$_POST['oldName']}");
            OCICommit($db_conn);
        }

        // query handlers
        function handleProjection() {
            $projectionList = array();
            $query = "SELECT ";
            if(isset($_GET['chval0'])){
                array_push($projectionList, 'CID, ');
            }
            if(isset($_GET['chval1'])){
                array_push($projectionList, 'Combatant_name, ');
            }
            if(isset($_GET['chval2'])){
                array_push($projectionList, 'HealthStatus, ');
            }
            if(isset($_GET['chval3'])){
                array_push($projectionList, 'Hometown, ');
            }
            if(isset($_GET['chval4'])){
                array_push($projectionList, 'Height, ');
            }
            if(isset($_GET['chval5'])){
                array_push($projectionList, 'Combatant_weight, ');
            }
            if(isset($_GET['chval6'])){
                array_push($projectionList, 'Age, ');
            }
            if(isset($_GET['chval7'])){
                array_push($projectionList, 'Service_year, ');
            }
            if(isset($_GET['chval8'])){
                array_push($projectionList, 'MUID, ');
            }
            
            foreach($projectionList as $e){
                $query = $query . $e;
            }
            $query = substr($query, 0, -2);
            $query = $query . " FROM Combatant";
            if(count($projectionList) == 0){
                $query = "SELECT * FROM Combatant";
            }
            // echo $query;
            printResultCombatant(executePlainSQL($query));
        } 

        function handleSelection() {
            $result = executePlainSQL("SELECT * FROM MilitaryUnit WHERE Capacity > {$_GET['sl1']}");
            printResultMilitaryUnit($result);
        } 

        function handleJoin() {
            $result = executePlainSQL("SELECT Combatant_name,Make,VehicleType FROM Combatant, Vehicle_has2, Vehicle_has3 WHERE Combatant.MUID = Vehicle_has2.MUID and Vehicle_has2.PID = Vehicle_has3.PID");
            printResultJoin($result);
        } 
        function handleAgg() {
            $result = executePlainSQL("SELECT Count(*) FROM Combatant WHERE Age > {$_GET['aggNum']}");

            if (($row = oci_fetch_row($result)) != false) {
                echo "<br> There are ". $row[0] ." people/person older than {$_GET['aggNum']} in Combatant. <br>";
            }
        } 
        function handleGroupBy() {
            $result = executePlainSQL("SELECT MIN(AvgAge) AS LowestAvgAge FROM (SELECT MUID, AVG(Age) AS AvgAge FROM Combatant GROUP BY MUID)");

            if (($row = oci_fetch_row($result)) != false) {
                echo "<br> Lowest average age of military unit is ". $row[0] .". <br>";
            }
        } 
        function handleDivision() {
            $result = executePlainSQL("SELECT * FROM MilitaryUnit m WHERE NOT EXISTS ((SELECT a.AreaID from Area a) MINUS (select t.AreaID from Mission_takePlace_assign3 t where t.MUID = m.MUID))");
            printResultMilitaryUnit($result);
        } 

        // HANDLE ALL POST ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('resetTablesRequest', $_POST)) {
                    handleResetRequest();
                } else if (array_key_exists('clickUpdate', $_POST)) {
                    handleUpdate();
                } else if (array_key_exists('clickInsert', $_POST)) {
                    handleJL();
                } else if (array_key_exists('clickDelete', $_POST)) {
                    handleDelete();
                }

                disconnectFromDB();
            }
        }

        // HANDLE ALL GET ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('countTuples', $_GET)) {
                    handleCountRequest();
                } else if (array_key_exists('clickSelection', $_GET)) {
                    handleSelection();
                } else if (array_key_exists('clickProjection', $_GET)) {
                    handleProjection();
                } else if (array_key_exists('clickJoin', $_GET)) {
                    handleJoin();
                } else if (array_key_exists('clickAgg', $_GET)) {
                    handleAgg();
                } else if (array_key_exists('clickGroupBy', $_GET)) {
                    handleGroupBy();
                } else if (array_key_exists('clickDivision', $_GET)) {
                    handleDivision();
                }

                disconnectFromDB();
            }
        }

        if (isset($_POST['reset']) ||
            isset($_POST['requestUpdate']) || isset($_POST['requestInsert']) || isset($_POST['requestDelete'])) {
            handlePOSTRequest();
        } else if (isset($_GET['countTupleRequest']) || isset($_GET['requestSelection']) 
            || isset($_GET['requestProjection']) || isset($_GET['requestJoin']) || isset($_GET['requestAgg'])|| isset($_GET['requestGroupBy'])|| isset($_GET['requestDivision']) ) {
            handleGETRequest();
        }
		?>
	</body>
</html>
