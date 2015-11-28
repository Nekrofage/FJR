<table width="95%" cellpadding="2" cellspacing="0" border="0" class="forumline" align="center"><tr ><th COLSPAN="2">Card Game</th></tr><tr>
<td width="20%" valign="top" class="row1">
<table width="100%" height="100%" cellpadding="2" cellspacing="1" border="0" class="forumline" >
<tr>
<td class="row1">
<a href="card_duel.php" class="copyright">{RETURN_CARD_DUEL_MAIN}</a>
</td>
</tr>
<tr>
<td class="bodyline">
<a href="card_duel_decks.php" class="copyright">{YOUR_CARD_DECKS}</a>
</td>
</tr>
<tr>
<td class="row1">
<a href="card_duel_shops.php" class="copyright">{CARD_SHOPS}</a>
</td>
</tr>
<tr>
<td class="row2">
<a href="card_duel_inventory.php" class="copyright">{YOUR_CARD_INV}</a>
</td>
</tr>
<tr>
<td class="row1">
<a href="http://po2mafia.com/viewtopic.php?t=3&start=0" class="copyright">Rules of Play</a>
</td>
</tr>
</table>
</td>
<td class="row2">
<form name="form1" method="post" action="">
<table align="center" width="100%" cellpadding="2" cellspacing="1" border="0" class="forumline">
  <tr>
    <td class="row1"><div align="center" width="40%">{CD_DECK_NAME}</div></td>
    <td class="row2"><div align="center" width="30%"><input name="deck_name" type="text" size="40" maxlength="250"></div></td>
  </tr>
</table>
<br>
<div align="center">
  <input name="create" type="submit" id="create" value="{CD_DECK_CREATE}">
</div>
</form>

<table align="center" width="100%" cellpadding="2" cellspacing="1" border="0" class="forumline">
  <tr>
    <th width="50%">{CD_DECK_NAME}</th>
    <th width="50%">{CD_DECK_DELETE}</th>
  </tr>
 <!-- BEGIN deck -->
   <tr>
    <td align="center" class="row1" width="50%">{deck.CD_DECK_NAMES}</td>
    <td align="center" class="row2" width="50%">{deck.CD_DECK_DELETES}</td>
  </tr>
 <!-- END deck -->
</table></td></tr></table>
