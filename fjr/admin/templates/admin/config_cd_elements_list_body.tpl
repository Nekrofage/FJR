<table width="100%"  border="1">
  <tr>
    <th scope="col">{CD_IMAGE}</th>
    <th scope="col">{CD_CARD_ELEMENT}</th>
    <th scope="col">{CD_CARD_ACTION}</th>
  </tr>
<!-- BEGIN elements -->
  <tr>
    <td><img src="../images/card_duel/elements/{elements.CD_CARD_IMAGE_NAME}"></td>
    <td>{elements.CD_CARD_ELEMENT_NAME}</td>
    <td><a href="../{elements.CD_CARD_EDIT}">{CD_EDIT}</a> | <a href="{elements.CD_CARD_DELETE}">{CD_DELETE}</a> </td>
  </tr>
<!-- END elements -->
</table>
<div align="center">
  <form name="form1" method="post" action="">
    <input name="add" type="submit" id="add" value="{CD_ADD_ELEMENT}">
  </form>
</div>
