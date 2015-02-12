<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF"-8>
	<title>DATABASE</title>
	<style>
	body
	{
		background-color: black;
		color: #99FF33;
		overflow: hidden;
	}
	#error
	{
		position: fixed; 
		bottom:0%;
		width: 99%;
		height: 150px;
		background-color: #FFFFCC;
		color: #CC0000;
	}
	#er
	{
		margin-left: 10px;
		width: auto;
		height: 94px;
		overflow: auto;
	}
	#body 
	{        
		margin-top: 250px;
		margin-left: auto;
		margin-right: auto;
		width: 330px;
		height: auto;
		background-color: gray;
		overflow: auto;
	}
	#log
	{
		margin-top: 10px;
		margin-bottom: 10px;
		text-align: right;
		margin-left: auto;
		margin-right: auto;
		width: 90%;
		height: auto;
		overflow: hidden;
	}
	input[type=submit] 
	{
		width: 58%;
		background-color: #000A23;
		border-color: #1544A4;
		color: #E0C253;
	}
	input[type=text] 
	{
		background-color: #7F9ADF;
		width: 170px;
		border-color: #1544A4;
		color: #000A23;
	}
	input[type=number] 
	{
		background-color: #7F9ADF;
		width: 70px;
		border-color: #1544A4;
		color: #000A23;
		border: none;
		height: 30px;
		outline: none;
	}
	input[type=password] 
	{
		background-color: #7F9ADF;
		width: 170px;
		border-color: #1544A4;
		color: #000A23;
	}
	table
	{
		width: 100%;
	}
	th
	{
		padding-left: 10px;
		padding-right: 10px;
		height: 50px;
		border: 1px solid #00164C;
		background-color: white;
		color: #E0C253;
	}
	tr
	{
		background-color: #000F35;
	}
	td
	{
		padding-left: 7px;
		padding-right: 7px;
		height: auto;
	}
	#tdin
	{
		border: 3px groove #1544A4;
		padding-left: 7px;
		padding-right: 7px;
		background-color: #7F9ADF;
	}
	#tdinn
	{
		border: 3px groove #1544A4;
		padding-left: 7px;
		background-color: #7F9ADF;
	}
	#tde
	{
		border: 3px groove #E0C253;
		padding-left: 7px;
		padding-right: 7px;
		background-color: #DECB88;
	}
	#tden
	{
		border: 3px groove #E0C253;
		padding-left: 7px;
		background-color: #DECB88;
	}
	#tr
	{
		background-color: #00164C;
	}
	button
	{
		width: 100%;
		border-color: #1544A4;
		color: black;
	}
	#add
	{
		width: 100%;
		border: none;
		height: 30px;
		outline: none;
	}
	#ro
	{
		width: 100%;
		border: none;
		height: 30px;
		outline: none;
		background-color: inherit;
		color: white;
	}
	#table
	{
		margin-left: auto;
		margin-right: auto;
		margin-bottom: 100px;
		height: calc(100vh - 122px);
		width: 100%;
		overflow: auto;
	}
	#a{height:40px;} 
	#lo
	{
		height:50px;
		background-color: #E3BB29;
		border-color: #E0C253;
		color: #1544A4;
		outline: none;
	} 
	#save
	{
		background-color: #E3BB29;
		border-color: #E0C253;
		color: #000A23;
	} 
	#np{padding: 0px;}
	#edtt
	{
		width: 100%;
		border: none;
		height: 30px;
		background-color: #DECB88;
		outline: none;
	}
	#en
	{
		border: none;
		height: 30px;
		background-color: #DECB88;
		outline: none;
	}
	#deac
	{
		border: 1px solid #00164C;
		background-color: #1544A4;
		color: #000A23;
	}
	</style>
</head>
	<body>	
		<?php
		$GLOBALS['u'] = NULL;
		$GLOBALS['p'] = NULL;
		$GLOBALS['i'] = 0;
		$GLOBALS['j'] = 0;
		$GLOBALS['nu'] = NULL;
		$GLOBALS['np'] = NULL;
		$GLOBALS['nfn'] = NULL;
		$GLOBALS['nln'] = NULL;
		$GLOBALS['na'] = 0;
		$GLOBALS['nad'] = NULL;
		$GLOBALS['nc'] = NULL;
		$GLOBALS['edu'] = NULL;
		$GLOBALS['edp']  = NULL;	
		$GLOBALS['eu'] = NULL;
		$GLOBALS['ep']  = NULL;	
		$GLOBALS['efn']	= NULL;	
		$GLOBALS['eln']	= NULL;
		$GLOBALS['ea']	= 0;
		$GLOBALS['ead']	= NULL;
		$GLOBALS['ec']	= NULL;
		$GLOBALS['edit']	= 0;
		$log=0;
		class TableRows extends RecursiveIteratorIterator
		{ 
			
			function __construct($it) 
			{ 
				parent::__construct($it, self::LEAVES_ONLY); 
			}
			function current() 
			{
				$GLOBALS['i']++;
				if($GLOBALS['i']==8) $GLOBALS['i']=1;
				$cur = (string) parent::current();
				if($GLOBALS['i']==1)  $GLOBALS['edu']=$cur;
				else if($GLOBALS['i']==2)  $GLOBALS['edp']=$cur;
				else if($GLOBALS['i']==3)  $GLOBALS['eln']=$cur;
				else if($GLOBALS['i']==4)  $GLOBALS['eln']=$cur;
				else if($GLOBALS['i']==5)  $GLOBALS['ea']=$cur;
				else if($GLOBALS['i']==6)  $GLOBALS['ead']=$cur;
				else if($GLOBALS['i']==6) $GLOBALS['ec']=$cur;
				if($GLOBALS['i']==1) $GLOBALS['u'] = $cur;
				else if($GLOBALS['i']==2) 
				{
					$GLOBALS['p'] = $cur;
				}
				if($GLOBALS['u']==$GLOBALS['eu']&&$GLOBALS['edit']==1)
				{	
					if($GLOBALS['user']==$GLOBALS['u'])
					{
						if($GLOBALS['i']==1) 
							return "<form action='#id' method='post' enctype='multipart/form-data'><td id='tde'><input type='text' name='edu' id='edtt' value='$cur' required></td>";
						if($GLOBALS['i']==2) 
							return "<td id='tde'><input type='hidden' name='edp' value='$cur'><input type='password' name='edp' id='edtt' value='$cur' required></td>";
					}
					else
					{
						if($GLOBALS['i']==1) 
							return "<form action='#id' method='post' enctype='multipart/form-data'><td><input type='hidden' name='edu' value='$cur'><input type='hidden' name='edit' value= 1>" . $cur. "</td>";
						else if($GLOBALS['i']==2) 
						{
							if($GLOBALS['user']==$GLOBALS['u']) return "<td><input type='hidden' name='edp' value='$cur'><input type='hidden' name='ep' value='$cur'>" . $cur. "</td>";
							else return "<td align='center'>*private*<input type='hidden' name='edp' value='$cur'></td>";
						}
					}
					if($GLOBALS['i']==3) return "<td id='tde'><input type='text' name='efn' id='edtt' value='$cur' required></td>";
					else if($GLOBALS['i']==4) return "<td id='tde'><input type='text' name='eln' id='edtt' value='$cur' required></td>";
					else if($GLOBALS['i']==5) return "<td id='tden'><input type='number' min='0' name='ea' id='en' min='0' value='$cur' required></td>";
					else if($GLOBALS['i']==6)  return "<td id='tde'><input type='text' name='ead' id='edtt' value='$cur' required></td>";
					else return "<td id='tde'><input type='text' name='ec' id='edtt' value='$cur' required></td>";
				}
				else
				{
					if($GLOBALS['i']==1) return "<form action='#id' method='post' enctype='multipart/form-data'><input type='hidden' name='edu' value='$cur'><input type='hidden' name='edit' value= 1><td>" . $cur. "</td>";
					else if($GLOBALS['i']==2) 
					{
						if($GLOBALS['user']==$GLOBALS['u']) 
							return "<td><input type='hidden' name='edp' value='$cur'><input type='hidden' name='ep' value='$cur'><input type='password' name='edp' id='ro' value='$cur' readonly></td>";
						else return "<td align='center'><input type='hidden' name='edp' value='$cur'>*private*</td>";
					}
					else if($GLOBALS['i']==3) return "<td><input type='hidden' name='efn' value='$cur'>" . $cur. "</td>";
					else if($GLOBALS['i']==4) return "<td><input type='hidden' name='eln' value='$cur'>" . $cur. "</td>";
					else if($GLOBALS['i']==5) return "<td><input type='hidden' name='ea' min='0' value='$cur'>" . $cur. "</td>";
					else if($GLOBALS['i']==6)  return "<td><input type='hidden' name='ead' value='$cur'>" . $cur. "</td>";
					else return "<td><input type='hidden' name='ec' value='$cur'>" . $cur. "</td>";
				}
			}
			function beginChildren() 
			{ 
				if($GLOBALS['j']%2==1) echo "<tr id='tr'>"; 
				else echo "<tr>";
				$GLOBALS['j']++;
			} 
			public function endChildren() 
			{ 
				$GLOBALS['user'] = $_POST['user'];
				$GLOBALS['pass']  = $_POST['pass'];	
				?>
				<td id="np">
				<input type="hidden" name="eu" value= "<?php echo $GLOBALS['u'];?>">
				<input type="hidden" name="ep" value= "<?php echo $GLOBALS['p'];?>">
				<input type="hidden" name="user" value= "<?php echo $GLOBALS['user'] ;?>">
				<input type="hidden" name="pass" value= "<?php echo $GLOBALS['pass'] ;?>">
				<?php if(isset($_POST['edit']))
				{
					$GLOBALS['edit']  = $_POST['edit'];
				}
				if($GLOBALS['edit']==1&&$GLOBALS['u']==$GLOBALS['eu'])
				{?>
					<input type="hidden" name="edit" value=0>
					<button id="save">add</button><?php 
				}
				else
				{?>
					<input type="hidden" name="edit" value=1><?php 
					if(($GLOBALS['u']==$GLOBALS['user']||$GLOBALS['user']=='test')&&$GLOBALS['u']!='test')
					{?>
						<button>Edit</button><?php
					} 
					else
					{?>
						<button id="deac" disabled>Edit</button><?php
					}
				}?></form><?php
				if(($GLOBALS['u']==$GLOBALS['user']||$GLOBALS['user']=='test')&&$GLOBALS['u']!='test')
				{?>
					<form action="#id" method="post" enctype="multipart/form-data">
					<input type="hidden" name="du" value= "<?php echo $GLOBALS['u'];?>">
					<input type="hidden" name="dp" value= "<?php echo $GLOBALS['p'];?>">
					<input type="hidden" name="user" value= "<?php echo $GLOBALS['user'];?>">
					<input type="hidden" name="pass" value= "<?php echo $GLOBALS['pass'];?>">
					<button>Del</button></form><?php
				}
				else
				{
					?><button id="deac" disabled>Del</button><?php
				}
				?></td><?php
			} 
		} 
		$servername = "localhost";
		$username = "root";
		$db = "login" ?>
		<div id="error"><hr noshade color="#E0C253" size="3px"><div id="er"><?php		
		try 
		{
			$conn = new PDO("mysql:host=$servername;", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			?><font color="#009900"><?php echo "Connected to MySQL...";?></font><?php
		}
		catch(PDOException $e)
		{
			echo "<br> Connection to MySQL failed: " . $e->getMessage();
		}	
		try
		{
			$sql = "CREATE DATABASE IF NOT EXISTS login";
			$conn->exec($sql);
			$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			?><font color="#009900"><?php echo "<br>Database accessed..."; ?></font><?php
		}
		catch(PDOException $e)
		{
			echo "<br>".$e->getMessage();
		}
		try
		{
			$sql = "CREATE TABLE IF NOT EXISTS Accounts (
			user VARCHAR(15) PRIMARY KEY,
			pass VARCHAR(15),
			firstname VARCHAR(30),
			lastname VARCHAR(30),
			age INT(3), 
			address VARCHAR(100),
			contact VARCHAR(15) )";
			$conn->exec($sql);
			?><font color="#009900"><?php echo "<br>Accounts table accessed...";?></font><?php
		}
		catch(PDOException $e)
		{?><div id="err"><?php 
			echo "<br>".$e->getMessage();?></div><?php
		}	
		mysql_connect($servername, $username, $password);
		mysql_select_db($db);
		?><a id="id"><?php
		if(isset($_POST['user']))
		{
			$GLOBALS['user'] = $_POST['user'];
			$GLOBALS['pass']  = $_POST['pass'];
			$sql = "SELECT * FROM Accounts WHERE user='".$GLOBALS['user'] ."'And pass='".$GLOBALS['pass'] ."'LIMIT 1";
			$res = mysql_query($sql);
			if(mysql_num_rows($res)==1)
			{
				?><font color="#009900"><?php echo "<br>" . $GLOBALS['user']  . " - Logged In...";?></font><?php
				$log=1;
			}
			else
			{
				echo "<br>Invalid username or password";
			}
		}?></a><?php
		try 
		{
			 $sql = "INSERT INTO Accounts (user, pass, firstname, lastname, age, address, contact) VALUES ('admin', 'admin', 'admin', 'admin', 0, 'admin', 'admin');";
			 $conn->exec($sql);
		}
		catch(PDOException $e)
		{}
		if(isset($_POST['nu']))
		{
			$GLOBALS['nu'] = $_POST['nu'];
			$GLOBALS['np'] = $_POST['np'];
			$GLOBALS['nfn'] = $_POST['nfn'];
			$GLOBALS['nln'] = $_POST['nln'];
			$GLOBALS['na'] = $_POST['na'];
			$GLOBALS['nad'] = $_POST['nad'];
			$GLOBALS['nc'] = $_POST['nc'];
			try 
			{
				$q = "INSERT INTO Accounts (user, pass, firstname, lastname, age, address, contact) 
				VALUES (:nu, :np, :nfn, :nln, :na, :nad, :nc);";
				$sql = $conn->prepare($q);
				$results = $sql->execute(array(
					":nu" => $GLOBALS['nu'],
					":np" => $GLOBALS['np'],
					":nfn" => $GLOBALS['nfn'],
					":nln" => $GLOBALS['nln'],
					":na" => $GLOBALS['na'],
					":nad" => $GLOBALS['nad'],
					":nc" => $GLOBALS['nc']));
				?><font color="#009900"><?php echo "<br>New account ".$GLOBALS['nu']." created... ";?></font><?php
			}
			catch(PDOException $e)
			{
				echo "<br>" . $e->getMessage();
			}
		}
		if(isset($_POST['du']))
		{
			$GLOBALS['u'] = $_POST['du'];
			$GLOBALS['p']  = $_POST['dp'];	
			try 
			{
				$q = "DELETE FROM Accounts where user = :duser AND pass = :dpass";
				$sql = $conn->prepare($q);
				$results = $sql->execute(array(
					":duser" => $GLOBALS['u'],
					":dpass" => $GLOBALS['p']));
				?><font color="#6CDB79"><?php echo "<br>".$GLOBALS['u']. " deleted...";?></font><?php
			}
			catch(PDOException $e)
			{
				echo "<br>" . $e->getMessage();
			}
		}
		if(isset($_POST['eu']))
		{
			$GLOBALS['eu'] = $_POST['eu'];
			$GLOBALS['ep']  = $_POST['ep'];
			$GLOBALS['edu'] = $_POST['edu'];
			$GLOBALS['edp']  = $_POST['edp'];
			$GLOBALS['efn']  = $_POST['efn'];
			$GLOBALS['eln']  = $_POST['eln'];
			$GLOBALS['ea']  = $_POST['ea'];
			$GLOBALS['ead']  = $_POST['ead'];
			$GLOBALS['ec']  = $_POST['ec'];
			$GLOBALS['edit']  = $_POST['edit'];
			try 
			{
				$q = "UPDATE Accounts SET user=:edu, pass=:edp, firstname=:efn, lastname=:eln, age=:ea, address=:ead, contact=:ec WHERE user = :eu;";
				$sql = $conn->prepare($q);
				$results = $sql->execute(array(
					":edu" => $GLOBALS['edu'],
					":edp" => $GLOBALS['edp'],
					":efn" => $GLOBALS['efn'],
					":eln" => $GLOBALS['eln'],
					":ea" => $GLOBALS['ea'],
					":ead" => $GLOBALS['ead'],
					":ec" => $GLOBALS['ec'],
					":eu" => $GLOBALS['eu']));
				if($GLOBALS['edit']==0)
				{
					
					?><font color="#6CDB79"><?php echo "<br>".$eu." edited... ";?></font><?php
				}
			}
			catch(PDOException $e)
			{
				echo "<br>" . $e->getMessage();
			}
		}?></div></div><?php
		if($log)
		{
			$user=$GLOBALS['user'];
			$pass=$GLOBALS['pass'];
			echo "<div id='table'><table align='center'>";
			echo "<tr>
			<th>Username</th>
			<th>Password</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Age</th>
			<th>Address</th>
			<th>Contact</th>
			<th id='np'>
			<form action='index.php' method='post' enctype='multipart/form-data'>
			<button id='lo'>Log Out</button>
			</form>
			</th></tr>
			<tr>
			<form action='#id' method='post' enctype='multipart/form-data'>
			<input type='hidden' name='user' value='$user'>
			<input type='hidden' name='pass' value='$pass'>
			<td id='tdin'><input type='text' id='add' name='nu' required></td>
			<td id='tdin'><input type='password' id='add' name='np' required></td>
			<td id='tdin'><input type='text' id='add' name='nfn' required></td>
			<td id='tdin'><input type='text' id='add' name='nln' required></td>
			<td id='tdinn'><input type='number' min='0' name='na' required></td>
			<td id='tdin'><input type='text' id='add' name='nad' required></td>
			<td id='tdin'><input type='text' id='add' name='nc' required></td>
			<td id='np'><button id='a'>&nbsp;&nbsp;&nbsp;&nbsp;</button></form></td></tr>";
			try 
			{
				$stmt = $conn->prepare("SELECT * FROM Accounts"); 
				$stmt->execute();
				$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
				foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) 
				{ 
					echo $v;
				}
			}
			catch(PDOException $e) 
			{
				echo "<br>Error: " . $e->getMessage();
			}
			echo "</table></div>";
			exit();
		}	
		?>
		<div id="body">
			<div id="log">
				<form action="#id" method="post" enctype="multipart/form-data"><hr noshade color="#E0C253">
					<b>Username:</b>&emsp;<input type="text" name="user" required><br>
					<b>Password :</b>&emsp;<input type="password" name="pass" required><hr noshade color="#E0C253">
					<input width="100" height="48" align ="right" type="submit" value="Log In" name="log" >
				</form>
			</div>
		</div>
	</body>
</html>