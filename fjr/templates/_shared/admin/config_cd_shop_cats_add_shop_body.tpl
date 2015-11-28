<form name="form1" method="post" action="">
<table width="100%"  border="1">
  <tr>
    <td>{CD_SHOP_NAME}</td>
    <td align="left"><input name="shop_name" type="text" id="shop_name" value="{CD_SHOP_NAMES}" size="40"></td>
  </tr>
  <tr>
    <td>{CD_SHOP_IMAGE}</td>
    <td align="left"><input name="shop_image_path" type="text" id="shop_image_path" value="{CD_SHOP_IMAGES}"size="40"></td>
  </tr>
  <tr>
    <td>{CD_DESCRIPTION}</td>
    <td align="left"><input name="shop_description" type="text" id="shop_description" value="{CD_DESCRIPTIONS}"size="40"></td>
  </tr>
</table>
<center>
<!-- BEGIN switch_add_shop -->
<input name="submit" type="submit" id="button" value="{CD_ADD_SHOP_CAT}">
<!-- END switch_add_shop -->

<!-- BEGIN switch_edit_shop -->
<input name="edit" type="submit" id="button" value="{CD_EDIT_SHOP_CAT}">
<!-- END switch_edit_shop -->

</center>
</form>
