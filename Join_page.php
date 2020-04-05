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

<html>

<body>

    <h1 assign="center" style="color:blue;font-size:40px"> CPSC 304 PHP/Oracle Demonstration</h1>

</body>

</html>

<body>

    <img src="war_image.jpg" alt="war image" width="500" height="600">

</body>

<head>
    <title>CPSC 304 PHP/Oracle Demonstration</title>
</head>

<style>
    body {
        background-image: url(data:image/jpeg;base64,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);
        background-size: cover;
    }
</style>

<body>
    <h2>Join Query: </h2>

    <form method="POST" action="Join_page.php">
        <select name="jtable">
            <option value="Combatant">Combatant</option>
            <option value="Commander">Commander</option>
            <option value="Soldier_enrolls">Soldier_enrolls</option>
            <option value="MilitaryUnit">MilitaryUnit</option>
        </select>
        Joins <select name="stable">
            <option value="MilitaryUnit">MilitaryUnit</option>
            <option value="Combatant">Combatant</option>
            <option value="Commander">Commander</option>
            <option value="Soldier_enrolls">Soldier_enrolls</option>
        </select> <br /><br />
        <input type="submit" value="Join" name="sub">
    </form>

    <h2>Result</h2>

    <form method="POST" action="Join_page.php">
        <!--refresh page when submitted-->
        <input type="submit" value="Display contents of Combatant" name="display_result"></p>
    </form>

    <form method="POST" action="demo_page.php">
        <!--refresh page when submitted-->
        <input type="submit" value="BACK TO DEMO PAGE" name="DEMO_redirect"></p>
    </form>

    <hr />

    <?php
    //this tells the system that it's no longer just parsing html; it's now parsing PHP

    $success = True; //keep track of errors so it redirects the page only if there are no errors
    $db_conn = NULL; // edit the login credentials in connectToDB()
    $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

    function debugAlertMessage($message)
    {
        global $show_debug_alert_messages;

        if ($show_debug_alert_messages) {
            echo "<script type='text/javascript'>alert('" . $message . "');</script>";
        }
    }

    function executePlainSQL($cmdstr)
    { //takes a plain (no bound variables) SQL command and executes it
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

    function executeBoundSQL($cmdstr, $list)
    {
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
                unset($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
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

    function printResultCombatant($result)
    { //prints results from a select statement
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

    function printResultMilitaryUnit($result)
    { //prints results from a select statement
        echo "<br>Retrieved data from table MilitaryUnit:<br>";
        echo "<table>";
        echo "<tr><th>MUID</th><th>Capacity</th><th>CID</th><th>Death</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>"; //or just use "echo $row[0]" 
            // echo $row[0];
        }

        echo "</table>";
    }

    function printResultJoin($result)
    { //prints results from a select statement
        echo "<br>Retrieved data from joined table MilitaryUnit and Combatant:<br>";
        echo "<table>";
        echo "<tr><th>Combatant_name</th><th>Make</th><th>VehicleType</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>"; //or just use "echo $row[0]" 
            // echo $row[0];
        }

        echo "</table>";
    }

    function printDynamicTable($result)
    { //prints results from a select statement
        echo "<br>Retrieved data from table Combatant:<br>";
        echo "<table>";
        $flag = FALSE;

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr>";
            if (!$flag) {
                foreach (array_keys($row) as $column) {
                    if (!is_numeric($column)) {
                        echo "<th>$column</th>";
                    }
                }
                $flag = TRUE;
            }
            echo "</tr>";
            echo "<tr>";
            for ($i = 0; $i <= count($row); $i++) {
                echo "<td>" . $row[$i] . "</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    }

    function connectToDB()
    {
        global $db_conn;

        // Your username is ora_(CWL_ID) and the password is a(student number). For example, 
        // ora_platypus is the username and a12345678 is the password.
        // $db_conn = OCILogon("ora_liu650", "a46981452", "dbhost.students.cs.ubc.ca:1522/stu");
        // $db_conn = OCILogon("ora_maxonzz", "a57800732", "dbhost.students.cs.ubc.ca:1522/stu");
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

    function disconnectFromDB()
    {
        global $db_conn;

        debugAlertMessage("Disconnect from Database");
        OCILogoff($db_conn);
    }

    // militaryunit combatant commander soldierenrolls

    // function handleJoin()
    // {
    //     $result = executePlainSQL("SELECT Combatant_name,Make,VehicleType FROM Combatant, Vehicle_has2, Vehicle_has3 WHERE Combatant.MUID = Vehicle_has2.MUID and Vehicle_has2.PID = Vehicle_has3.PID");
    //     printResultJoin($result);
    // }

    // if (isset($_POST['sub'])) {
    //     if (connectToDB()) {
    //         echo "display";
    //         $a = $_POST['jtable'];
    //         $b = $_POST['stable'];
    //         echo "<br>" . $a . $b . "<br>";
    //         $query = "SELECT * FROM {$_POST['jtable']} natural join {$_POST['stable']}";
    //         // $query = "SELECT * FROM MilitaryUnit";
    //         echo "<br>" . $query . "<br>";
    //         $result = executePlainSQL($query);
    //         printDynamicTable($result);
    //         disconnectFromDB();
    //     }
    // }
    //     <form method="POST" action="Join_page.php">
    //     <select name="jtable">
    //         <option value="Combatant">Combatant</option>
    //         <option value="Commander">Commander</option>
    //         <option value="Soldier_enrolls">Soldier_enrolls</option>
    //         <option value="MilitaryUnit">MilitaryUnit</option>
    //     </select>
    //     Joins <select name="stable">
    //         <option value="sMilitaryUnit">MilitaryUnit</option>
    //         <option value="sCombatant">Combatant</option>
    //         <option value="sCommander">Commander</option>
    //         <option value="sSoldier_enrolls">Soldier_enrolls</option>
    //     </select> <br /><br />
    //     <input type="submit" value="Join" name="sub">
    // </form>

    // if (isset($_GET['clickJoin'])) {
    //     if (connectToDB()) {
    //         handleJoin();
    //         disconnectFromDB();
    //     }
    if (isset($_POST['sub'])) {
        if (connectToDB()) {
            $query = "SELECT * FROM {$_POST['jtable']} natural join {$_POST['stable']}";
            $result = executePlainSQL($query);
            printDynamicTable($result);
            disconnectFromDB();
        }
    } else if (isset($_POST['display_result'])) {
        if (connectToDB()) {
            $result = executePlainSQL("SELECT * FROM Combatant");
            // printResultCombatant($result);
            printDynamicTable($result);
            disconnectFromDB();
        }
    } else if (isset($_POST['DEMO_redirect'])) {
        header('Location: https://www.students.cs.ubc.ca/~mhlchina/demo_page.php');
        exit;
    }
    ?>
</body>

</html>