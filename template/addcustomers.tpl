
<form action="?page=addcustomers" method="post">
<label for="exampleFormControlInput1" class="form-label">First Name:</label>
<input type="text" name="firstname" class="form-control"><br>

<label for="exampleFormControlInput1" class="form-label">Last Name:</label>
<input type="text" name="lastname" class="form-control"><br>

<label for="exampleFormControlInput1" class="form-label">Electronic Email:</label>
<input type="text" name="email" class="form-control"><br>

<label for="exampleFormControlInput1" class="form-label">Phone Number:</label>
<input type="text" name="phone" class="form-control"><br>
<label for="exampleFormControlInput1" class="form-label">Select Company:</label>
<select name="Company" id="company" class="form-select">
<loop:selectones>
     <option value="[tag:selectones[].id /]"> [tag:selectones[].companyname /]</option>
</loop:selectones>
   </select><br>
 
<label for="exampleFormControlInput1" class="form-label">Select Address:</label>
<select name="Company" id="company" class="form-select">
  <loop:selecttwos>
       <option value="[tag:selecttwos[].id /]"> [tag:selecttwos[].street /]</option>
  </loop:selecttwos>
     </select><br>
<br>
Notes <br>
<textarea type="text" name="notes" class="form-control" rows="3">Add any notes that might help others</textarea><br>

<!--End Form-->
<input type="submit" class="btn btn-warning">
</form>
<P>Customer List</P>
<table border="1">
    <tr>
      <td><b>ID</b></td>
      <td><b>First Name</b></td>
      <td><b>Last Name</b></td>
      <td><b>Email</b></td>
      <td><b>Phone Number</b></td>
      <td><b>Created/Modifeid On</b></td>
      <td><b>Assosicated Companies</b></td>
      <td><b>Assosicated Addresses</b></td>
      <td><b>Notes</b></td>
    </tr>
    <loop:rows>
      <tr>
        <td> [tag:rows[].id /] </td>
        <td> [tag:rows[].firstname /] </td>
        <td> [tag:rows[].lastname /] </td>
        <td> [tag:rows[].email /] </td>
        <td> [tag:rows[].phone /] </td>
        <td> [tag:rows[].creationtime /] </td>
        <td> [tag:rows[].company /] </td>
        <td> [tag:rows[].address /] </td>
        <td> [tag:rows[].notes /] </td>
      </tr>
    </loop:rows>
  </table> 
