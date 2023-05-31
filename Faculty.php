<?php
$insert=false;
$notinsert=false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $Db_Name = "MDMS";
  $server = "localhost";
  $username = "root";
  $password = "";

  $conn = mysqli_connect($server, $username, $password, $Db_Name);
  if (!$conn) 
  {
    die("Connection to the database failed: " . mysqli_connect_error());
  }

  $Name = $_POST['Name'];
  $Reg_Id = $_POST['Reg_Id'];
  $Email_ID = $_POST['Email_ID'];
  $Phone_Num = $_POST['Phone_Num'];
  $Inst_Name = $_POST['Inst_Name'];
  $Department = $_POST['Department'];
  $Session = $_POST['Session'];
  $Platform = $_POST['Platform'];
  $Duration = $_POST['Duration'];
  $Credit = $_POST['Credit'];
  $File = $_POST['File'];

  $sql = "INSERT INTO Faculty (Name, Reg_Id, Email_ID, Phone_Num, Inst_Name, Department, Session, Platform, Duration, Credit, File, Date_Time) VALUES ('$Name', '$Reg_Id', '$Email_ID', '$Phone_Num', '$Inst_Name', '$Department', '$Session', '$Platform', '$Duration', '$Credit', '$File', current_timestamp())";

  if (mysqli_query($conn, $sql)) 
  {
    $insert=true;
  }
  else 
  {
    $notinsert=true;
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}
?>

<html>

<head>
  <title>Faculty Details</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
<style>
    *{
   margin: 0px;
   padding: 0%;
   box-sizing: border-box;
}

.container {
    max-width: 100%;
    padding:10px;
    margin: auto;
    text-align: center;
    color: white;
}

div {
  border-radius: 5px;
  background-color: rgb(115, 189, 220);
  padding: 20px;
}


.btn{
  width: 90px;
  background-color: #3fae42;
  color: white;
  padding: 14px;
  margin: 7px 48%;
  border: none;
  border-radius: 15px;
  cursor: pointer;
  text-align: center;
}

input,select {
  width: 50%;
  padding: 7px 2px;
  margin: 7px auto;
  display: block;
  border:2px solid black;
  border-radius: 8px;
  box-sizing: border-box;
  font-size: 13px;
  color: black;
  outline: none;
}

#MyFile 
{
 background-color: white;
}
label
 {
 color:black;
 font-size:20px;
 font-weight:bold;
 margin:0px 415px;
 }

.btn:hover 
{
  background-color: grey;
}

body
{
background-color:gray;
}

h1{
    color: black;
}

.bg
{
 width: 100%;
 position:absolute;
 z-index: -1;
 opacity: 0.7;
}
    </style>
</head>

<body>
    <?php
    if($insert)
    {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Your response have been succesfully Submitted!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> ';
    }
    if($notinsert)
    {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> '.'You might have entered details incorrectly'.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> ';
    }
    ?>
  <div class="container">
    <h1>Enter your details as Faculty</h1>

  </div>
  <div>
    <form action="Faculty.php" method="POST">
      <label for="Name">Name</label><br>
      <input type="text" id="Name" name="Name" placeholder="Enter your name.." required>
      <br>
      <label for="Reg_Id">Registration Number</label><br>
      <input type="text" id="Reg_Id" name="Reg_Id" placeholder="Enter your Registration Id.." required>
      <br>
      <label for="Email_ID">Email ID</label><br>
      <input type="email" id="Email_ID" name="Email_ID" placeholder="Enter your Email Id.." required>
      <br>
      <label for="Phone_Num">Phone Number</label><br>
      <input type="phone" id="Phone_Num" name="Phone_Num" placeholder="Enter your Phone Number.." required>
      <br>
      <label for="Inst_Name">Institute Name</label><br>
      <select name="Inst_Name" id="Inst_Name">
        <option value="PIET">PIET</option>
        <option value="PCE">PCE</option>
        <option value="PGC">PGC</option>
      </select>
      <br>
      <label for="Department">Department</label><br>
      <select name="Department" id="Department">
        <option value="CSE">CSE</option>
        <option value="AIDs">AIDS</option>
      </select>
      <br>
      <label for="Session">Session</label><br>
      <input type="text" id="Session" name="Session" placeholder="Your Session.." required>
      <br>
      <label for="Platform">Name of the Platform</label><br>
      <select id="Platform" name="Platform">
        <option value="MS">Microsoft</option>
        <option value="SY">Swayam</option>
        <option value="NPTEL">NPTEL</option>
        <option value="Udemy">Udemy</option>
        <option value="Other">Other</option>
      </select>
      <br>
      <label for="Duration">Course Duration in Weeks</label><br>
      <select id="Duration" name="Duration">
        <option value="four">4</option>
        <option value="eight">8</option>
        <option value="twelve">12</option>
      </select>
      <br>
      <label for="Credit">Credits</label><br>
      <select id="Credit" name="Credit">
        <option value="two">2</option>
        <option value="three">3</option>
        <option value="four">4</option>
      </select>
      <br>
      <label for="file">Select a file:</label><br>
      <input type="file" id="MyFile" name="File" required><br>
      <br>
      <button class="btn">Submit</button>

    </form>
  
    
</body>

</html>