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

    <body>
        <h2>Reset</h2>
        <p>If you wish to reset the table press on the reset button. If this is the first time you're running this page, you MUST use reset</p>

        <form method="POST" action="oracle-test.php">
            <!-- if you want another page to load after the button is clicked, you have to specify that page in the action parameter -->
            <input type="hidden" id="resetTablesRequest" name="resetTablesRequest">
            <p><input type="submit" value="Reset" name="reset"></p>
        </form>
        
        <!-- </hr> is a line -->
        <hr />

        <h2>Insert Multiple Values into DemoTable </h2>
        <form method="POST" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Number: <input type="text" name="insNo0"> <br /><br />
            Name: <input type="text" name="insName0"> <br /><br /><br />
            Number: <input type="text" name="insNo1"> <br /><br />
            Name: <input type="text" name="insName1"> <br /><br /><br />
            Number: <input type="text" name="insNo2"> <br /><br />
            Name: <input type="text" name="insName2"> <br /><br /><br />
            Number: <input type="text" name="insNo3"> <br /><br />
            Name: <input type="text" name="insName3"> <br /><br /><br />
           

            <input type="submit" value="Insert" name="insertSubmit"></p>
        </form>


        <hr />
        <!--Starts here-->
        <h2>NEW THING: Adding single value</h2>
        <form method="POST" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestInsert" name="requestInsert">
            Number: <input type="text" name="val1"> <br /><br />
            Name: <input type="text" name="val2"> <br /><br />

            <input type="submit" value="Insert Button" name="clickInsert"></p>
        </form>

        <hr />

        <h2>NEW THING: Delete a value</h2>
        <form method="POST" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestDelete" name="requestDelete">
            Number: <input type="text" name="delField1"> <br /><br />
            Name: <input type="text" name="delField2"> <br /><br />

            <input type="submit" value="clickDelete" name="clickDelete"></p>
        </form>


        <hr />

        <h2>Update Name in DemoTable</h2>
        <p>The values are case sensitive and if you enter in the wrong case, the update statement will not do anything.</p>

        <form method="POST" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestUpdate" name="requestUpdate">
            Old Name: <input type="text" name="oldName"> <br /><br />
            New Name: <input type="text" name="newName"> <br /><br />

            <input type="submit" value="Update" name="clickUpdate"></p>
        </form>


        <!-- GETTERS: Query -->
        <hr />
        <h2>NEW THING: Selection</h2>
        <form method="GET" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestSelection" name="requestSelection">
            Number: <input type="text" name="ss1"> <br /><br />
            Name: <input type="text" name="ss2"> <br /><br />

            <input type="submit" value="clickSelection" name="clickSelection"></p>
        </form>

        <hr />
        <h2>NEW THING: Projection </h2>
        <form method="GET" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestProjection" name="requestProjection">
            arg1: <input type="text" name="pp1"> <br /><br />
            arg2: <input type="text" name="pp2"> <br /><br />

            <input type="submit" value="clickProjection" name="clickProjection"></p>
        </form>

        <hr />
        <!--Pick one query of this category, which joins at least two tables and 
        performs a meaningful query, and provide an interface for the user to 
        choose this query (e.g. join the Customers and the Transactions table to find 
        the phone numbers of all customers who has purchased a specific item).-->
        <h2>NEW THING: Join Query</h2>
        <form method="GET" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestJoin" name="requestJoin">
            Number: <input type="text" name="ss1"> <br /><br />
            Name: <input type="text" name="ss2"> <br /><br />

            <input type="submit" value="clickJoin" name="clickJoin"></p>
        </form>

        <hr />
        <h2>NEW THING: Aggregation query </h2>
        <form method="GET" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestAgg" name="requestAgg">
            Number: <input type="text" name="ss1"> <br /><br />
            Name: <input type="text" name="ss2"> <br /><br />

            <input type="submit" value="clickAgg" name="clickAgg"></p>
        </form>
        <hr />
        <h2>NEW THING: GroupBy </h2>
        <form method="GET" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestGroupBy" name="requestGroupBy">
            Number: <input type="text" name="ss1"> <br /><br />
            Name: <input type="text" name="ss2"> <br /><br />

            <input type="submit" value="clickGroupBy" name="clickGroupBy"></p>
        </form>
        <hr />
        <h2>NEW THING: Division </h2>
        <form method="GET" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="requestDivision" name="requestDivision">
            Number: <input type="text" name="ss1"> <br /><br />
            Name: <input type="text" name="ss2"> <br /><br />

            <input type="submit" value="clickDivision" name="clickDivision"></p>
        </form>

        <hr />

        <h2>Count the Tuples in DemoTable</h2>
        <form method="GET" action="oracle-test.php"> <!--refresh page when submitted-->
            <input type="hidden" id="countTupleRequest" name="countTupleRequest">
            <input type="submit" name="countTuples"></p>
        </form>

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

        function printResult($result) { //prints results from a select statement
            echo "<br>Retrieved data from table demoTable:<br>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["NAME"] . "</td></tr>"; //or just use "echo $row[0]" 
                // echo $row[0];
            }

            echo "</table>";
        }

        function connectToDB() {
            global $db_conn;

            // Your username is ora_(CWL_ID) and the password is a(student number). For example, 
			// ora_platypus is the username and a12345678 is the password.
            $db_conn = OCILogon("ora_liu650", "a46981452", "dbhost.students.cs.ubc.ca:1522/stu");

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

        function handleUpdateRequest() {
            global $db_conn;

            $old_name = $_POST['oldName'];
            $new_name = $_POST['newName'];

            // you need the wrap the old name and new name values with single quotations
            executePlainSQL("UPDATE demoTable SET name='" . $new_name . "' WHERE name='" . $old_name . "'");
            OCICommit($db_conn);
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

        function handleInsertRequest() {
            global $db_conn;

            //Getting the values from user and insert data into the table
           

            // array(":bind1" => $_POST['insNo{$i}'], ":bind2" => $_POST['insName{$i}']);
            $alltuples =[];
            echo $_POST["insNo3"] == null;
            
            for ($i = 0; $i < 4; $i++){
                if (($_POST["insNo{$i}"] != null) && ($_POST["insName{$i}"] != null)){
                    array_push($alltuples,[":bind1" => $_POST["insNo{$i}"], ":bind2" => $_POST["insName{$i}"]]);
                }
            }
            echo '<pre>';
            print_r($alltuples);
            echo '</pre>';
            executeBoundSQL("insert into demoTable values (:bind1, :bind2)", $alltuples);
            OCICommit($db_conn);
        }

        function handleCountRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT Count(*) FROM demoTable");

            if (($row = oci_fetch_row($result)) != false) {
                // echo "<br> The number of tuples in demoTable: " . $row[0] . "<br>";
                $result = executePlainSQL("select * from demoTable");
		        printResult($result);
            }
        }

        // tester insert
        function handleJL() {
            global $db_conn;
        
            executePlainSQL("INSERT INTO demoTable values ({$_POST['val1']}, '{$_POST['val2']}')");
            OCICommit($db_conn);
        }

        function handleDelete() {
            global $db_conn;
            
            
            executePlainSQL("DELETE FROM demoTable values ({$_POST['val1']}, '{$_POST['val2']}')");
            OCICommit($db_conn);
        } 
        function handleUpdate() {
            global $db_conn;

            // $old_name = $_POST['oldName'];
            // $new_name = $_POST['newName'];

            // // you need the wrap the old name and new name values with single quotations
            // executePlainSQL("UPDATE demoTable SET name='" . $new_name . "' WHERE name='" . $old_name . "'");
            OCICommit($db_conn);
        }

        // query handlers
        function handleProjection() {
            global $db_conn;
            
            // executePlainSQL("delete from demoTable values ({$_POST['val1']}, '{$_POST['val2']}')");
            
            // echo 'PROJECTION';
            $result = executePlainSQL("SELECT {$_GET['pp1']} FROM demoTable");
            printResult($result);
            OCICommit($db_conn);
        } 

        function handleSelection() {
            global $db_conn;
            
            
            executePlainSQL("delete from demoTable values ({$_POST['val1']}, '{$_POST['val2']}')");
            OCICommit($db_conn);
        } 
        function handleJoin() {
            global $db_conn;
            
            
            executePlainSQL("delete from demoTable values ({$_POST['val1']}, '{$_POST['val2']}')");
            OCICommit($db_conn);
        } 
        function handleAgg() {
            global $db_conn;
            
            
            executePlainSQL("delete from demoTable values ({$_POST['val1']}, '{$_POST['val2']}')");
            OCICommit($db_conn);
        } 
        function handleGroupBy() {
            global $db_conn;
            
            
            executePlainSQL("delete from demoTable values ({$_POST['val1']}, '{$_POST['val2']}')");
            OCICommit($db_conn);
        } 
        function handleDivision() {
            global $db_conn;
            
            
            executePlainSQL("delete from demoTable values ({$_POST['val1']}, '{$_POST['val2']}')");
            OCICommit($db_conn);
        } 

        // HANDLE ALL POST ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('resetTablesRequest', $_POST)) {
                    handleResetRequest();
                } else if (array_key_exists('insertQueryRequest', $_POST)) {
                    handleUpdateRequest();
                } else if (array_key_exists('clickUpdate', $_POST)) {
                    handleInsertRequest();
                } else if (array_key_exists('clickInsert', $_POST)) {
                    handleJL();
                } else if (array_key_exists('clickDelete', $_POST)) {
                    handleDeleteRequest();
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

        if (isset($_POST['reset']) || isset($_POST['insertSubmit'])|| 
            isset($_POST['requestUpdate']) || isset($_POST['requestInsert']) || isset($_POST['requestDelete'])) {
            handlePOSTRequest();
        } else if (isset($_GET['countTupleRequest']) || isset($_GET['requestSelection']) 
            || isset($_GET['requestProjection']) || isset($_GET['requestJoin']) || isset($_GET['requestAgg'])|| isset($_GET['requestGroupBy'])|| isset($_GET['requestDivision']) ) {
            handleGETRequest();
        }
		?>
	</body>
</html>
