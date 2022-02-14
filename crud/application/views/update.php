<!DOCTYPE html>
<html>
<head>
<title>Update Profile</title>
</head>
 
<body>
<form method="post">
<table width="600"  cellspacing="5" cellpadding="5">
	<tr>
		<td colspan="2"><?php echo @$error; ?></td>
	</tr>	
  <tr>
    <td width="230">Enter Your new first name </td>
    <td width="329"><input type="text" name="first_name"/></td>
  </tr>
  <tr>
    <td width="230">Enter Your new last name </td>
    <td width="329"><input type="text" name="last_name"/></td>
  </tr>
  <tr>
    <td>Enter Your new Email </td>
    <td><input type="text" name="email"/></td>
  </tr>
  <tr>
    <td>Enter Your new username </td>
    <td><input type="text" name="username"/></td>
  </tr>
  <tr>
    <td>Enter Your Password </td>
    <td><input type="password" name="password"/></td>
  </tr>
 <tr>
    <td colspan="2" >
	<input type="submit" value="Update"/></td>
  </tr>
</table>
	</form>
</body>
</html>
