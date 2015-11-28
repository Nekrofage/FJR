<form name="form1" method="post" action="">
<table width="100%"  border="1">
  <tr>
    <th width="27%" scope="col">{CD_CARD_ELEMENT_NAME}</th>
    <th width="73%" scope="col"><div align="left">
      <input name="element_name" type="text" id="element_name" size="40" value="{CD_CARD_ELEMENT_NAMES}">
    </div></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_ELEMENT_IMAGE}</th>
    <th scope="col"><div align="left">
      <input name="element_image_path" type="text" id="element_image_path" size="40" value="{CD_CARD_IMAGE_LOC}">
    </div></th>
  </tr>
</table>
<center>
<!-- BEGIN switch_add_element -->
<input name="submit" type="submit" id="button" value="{CD_ADD_ELEMENT}">
<!-- END switch_add_element -->

<!-- BEGIN switch_edit_element -->
<input name="edit" type="submit" id="button" value="{CD_EDIT_ELEMENT}">
<!-- END switch_edit_element -->

</center>

</form>
