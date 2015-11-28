<table width="100%"  border="1">
  <tr>
    <th scope="col">{CD_IMAGE}</th>
    <th scope="col">{CD_CARD_NAME}</th>
    <th scope="col">{CD_CARD_PRICE}</th>
    <th scope="col">{CD_CARD_TYPE}</th>
    <th scope="col">{CD_ELEMENT}</th>
    <th scope="col">{CD_ACTION}</th>
  </tr>
  <!-- BEGIN cards -->
   <tr>
    <td><img src="/images/card_duel/cards/{cards.CD_CARD_IMAGES}"></td>
    <td>{cards.CD_CARD_NAMES}</td>
    <td>{cards.CD_CARD_PRICES}</td>
    <td>{cards.CD_CARD_TYPES}</td>
    <td>{cards.CD_CARD_ELEMENTS}</td>
    <td><a href="{cards.CD_CARD_EDIT}">{CD_EDIT}</a> | <a href="{cards.CD_CARD_DELETE}">{CD_DELETE}</a></td>
  </tr>
  <!-- END cards -->
</table>
<form name="form1" method="post" action="">
  <div align="center"><input name="add" type="submit" id="add" value="{CD_ADD_CARD}">
  </div>
</form>