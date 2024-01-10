
<form action="?page=addcompany" method="post">
Company Name: <input type="text" name="companyname"><br>
Company Phone: <input type="text" name="phone"><br>
Company Email: <input type="text" name="email"><br>
Select Address: 
<select name="address_id" id="address_id">
  <loop:selecttwos>
       <option value="[tag:selecttwos[].id /]"> [tag:selecttwos[].street /]</option>
  </loop:selecttwos>
     </select><br>
<br>
Select Client: 
<select name="customer_id" id="customer_id">
  <loop:selectones>
       <option value="[tag:selectones[].firstname /]"> [tag:selectones[].firstname /]</option>
  </loop:selectones>
     </select><br>
<br>
Notes <br>
<textarea type="text" name="notes" placeholder="Add any notes that might help others" ></textarea><br>
<!--End Form-->
<input type="submit">
</form>
<P>Company List</P>
<table border="1">
    <tr>
      <td><b>ID</b></td>
      <td><b>companyname</b></td>
      <td><b>phone</b></td>
      <td><b>Email</b></td>
      <td><b>Associated Clients</b></td>
      <td><b>Created/Modified On</b></td>
      <td><b>Notes</b></td>

    </tr>
    <loop:rows>
      <tr>
        <td> [tag:rows[].id /] </td>
        <td> [tag:rows[].companyname /] </td>
        <td> [tag:rows[].phone /] </td>
        <td> [tag:rows[].email /] </td>
        <td> [tag:rows[].customers /] </td>
        <td> [tag:rows[].creationtime /] </td>
        <td> [tag:rows[].notes /] </td>
      </tr>
    </loop:rows>
  </table> 
