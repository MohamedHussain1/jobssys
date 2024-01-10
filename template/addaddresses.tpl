
<form action="?page=addaddress" method="post">
Street Address: <input type="text" name="street"><br>
City: <input type="text" name="city"><br>
State: <input type="text" name="state"><br>
Zip Code: <input type="text" name="zip"><br>
Country: <input type="text" name="country"><br>
Notes <br>
<textarea type="text" name="notes" placeholder="Add any notes that might help others"></textarea><br>

<!--End Form-->
<input type="submit">
</form>

<P>Addresses List</P>
<table class="listing">
    <tr>
      <td><b>ID</b></td>
      <td><b>Street Address</b></td>
      <td><b>City</b></td>
      <td><b>State</b></td>
      <td><b>Zip Code</b></td>
      <td><b>Country</b></td>
      <td><b>Created/Modified On</b></td>
      <td><b>Notes</b></td>
    </tr>
    <loop:rows>
      <tr>
        <td> [tag:rows[].id /] </td>
        <td> [tag:rows[].street /] </td>
        <td> [tag:rows[].city /] </td>
        <td> [tag:rows[].states /] </td>
        <td> [tag:rows[].zip /] </td>
        <td> [tag:rows[].creationtime /] </td>
        <td> [tag:rows[].country /] </td>
        <td> [tag:rows[].notes /] </td>
      </tr>
    </loop:rows>
  </table> 
