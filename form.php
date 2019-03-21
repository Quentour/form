<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div>
      <label  for="name">Nom :</label>
      <input  type="text"  id="name"  name="name" required>
    </div>
    <div>
      <label  for="courriel">Courriel :</label>
        <input type="email" id="email"  name="email" required pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$">

    </div>
<input type="tel" id="phone" name="phone" placeholder="0123456789" 
pattern="[0-9]{10}" required>
    <select>
  <option value="volvo">choix1</option>
  <option value="saab">choix2</option>
  <option value="mercedes">choix3</option>
  <option value="audi">choix4</option>
</select>
    <div>
      <label  for="message">Message :</label>
      <textarea  id="message"  name="message" required></textarea>
    </div>
    <div  class="button">
      <button  type="submit">Envoyer votre message</button>
    </div>
  </form>

  <?php
$nameErr = $firstnameErr = $mailErr = $phoneErr = $messageErr = "";
$name = $firstname= $mail = $phone = $message = "";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  header("Location: ./succes.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$nameErr = 'Name is mandatory';
	}else{
  	$name = test_input($_POST["name"]);
  	}

	if (empty($_POST["email"])) {
		$mailErr ="Email is mandatory";
	}else{
	$mail = test_input($_POST["email"]);
	}
	   // check if e-mail address is well-formed  
	if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
	$mailErr = "Invalid email format";
	}
	if (empty($_POST["phone"])) {
  		$phoneErr ="phone number is mandatory";
  	}else{
  	$phone = test_input($_POST["phone"]);
	}  
	if (empty($_POST["message"])) {
  		$messageErr ="Message is mandatory";
  	}else{
  	$message = test_input($_POST["message"]);
	} 
}
if ($nameErr == "" and $mailErr =="" and $phoneErr == "" and $messageErr == "" and !empty($_POST)) {
	header("Location: ./succes.php");
}




?>

