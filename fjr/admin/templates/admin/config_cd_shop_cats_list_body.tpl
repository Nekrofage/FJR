<table width="100%"  border="1">
  <tr>
    <th scope="col">{CD_IMAGE}</th>
    <th scope="col">{CD_SHOP_NAME}</th>
    <th scope="col">{CD_DESCRIPTION}</th>
    <th scope="col">{CD_ACTION}</th>
  </tr>
<!-- BEGIN shop_cats -->
  <tr>
    <td><img src="../images/card_duel/shops/{shop_cats.CD_IMAGES}"></td>
    <td>{shop_cats.CD_SHOP_NAMES}</td>
    <td>{shop_cats.CD_DESCRIPTIONS}</td>
    <td><a href="{shop_cats.CD_SHOP_CAT_EDIT}">{CD_EDIT}</a> | <a href="{shop_cats.CD_SHOP_CAT_DELETE}">{CD_DELETE}</a></td>
  </tr>
<!-- END shop_cats -->
</table>
<div align="center">
  <form name="form1" method="post" action="">
    <input name="add" type="submit" id="add" value="{CD_ADD_SHOP_CAT}">
  </form>
</div>
