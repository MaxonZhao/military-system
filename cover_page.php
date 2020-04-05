<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body, html {
    height: 100%;
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    }

    * {
    box-sizing: border-box;
    }

    .bg-image {
    /* The image used */
    background-image: url("special_force2.jpg");
    
    /* Add the blur effect */
    filter: blur(2.5px);
    -webkit-filter: blur(2.5px);
    
    /* Full height */
    height: 100%; 
    
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover; 
    }

    /* Position text in the middle of the page/image */
    .bg-text {
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
    color: white;
    font-weight: bold;
    border: 3px solid #f1f1f1;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    width: 80%;
    padding: 20px;
    text-align: center;
    }
    </style>
    </head>
    <body>

        <div class="bg-image"></div>

        <div class="bg-text">
        <!-- <P><font face="serif" color="white"><P>
        <h2>Militry System</h2> -->
        <!-- <h1 style="font-size:50px">CPSC 304 PHP/Oracle Demonstration</h1> -->
        <p><font size="5" face="serif" color="white">Military System<p>
        <p><font size="6" face="serif" color="white">CPSC 304 PHP/Oracle Demonstration</p>
        <p><font size="5" face="serif" color="white">We are UBC students Maxon/Mike/Jialin</p>
        <p><font size="5" face="serif" color="green">Click to start Demo</p>
        <form method="POST" action="cover_page.php"> <!--refresh page when submitted-->
            <input type="submit" value="START" name="START_redirect"></p>
        </form>
        </div>
        
        <?php
		
		if (isset($_POST['START_redirect'])) {
            header('Location: https://www.students.cs.ubc.ca/~maxonzz/military-system/demo_page.php');
            exit;
        }  
		?>
    </body>
</html>