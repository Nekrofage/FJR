<table width="95%" cellpadding="2" cellspacing="0" border="0" class="forumline" align="center"><tr ><th COLSPAN="2">Card Game</th></tr><tr>
<td width="20%" valign="top" class="row1">
<table width="100%" height="100%" cellpadding="2" cellspacing="1" border="0" class="forumline" >
<tr>
<td class="row1">
<a href="card_duel.php" class="copyright">{RETURN_CARD_DUEL_MAIN}</a>
</td>
</tr>
<tr>
<td class="row2">
<a href="card_duel_decks.php" class="copyright">{YOUR_CARD_DECKS}</a>
</td>
</tr>
<tr>
<td class="row1">
<a href="card_duel_shops.php" class="copyright">{CARD_SHOPS}</a>
</td>
</tr>
<tr>
<td class="bodyline">
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
<td class="row2"><table align="center" width="100%"  cellpadding="2" cellspacing="1" border="0" class="forumline">
<!-- BEGIN cards -->
	<tr>
		<th align="center" width="10%">{CARD_IMAGE}</th>
		<th align="center">{CARD_INFO}</th>
		<th align="center">{ACTION}</th>
		<th align="center">{DECK_OPTIONS}</th>
	</tr>
  <tr>
    <td class="row1"><img src="/images/card_duel/cards/{cards.CARD_IMAGE}"></td>
    <td class="row2">{cards.CARD_DESCRIPTION}</td>
    <td class="row1" align="center">{cards.CARD_DELETE} | {cards.CARD_SELL}</td>
    <td class="row1"><div align="center">
	  <form name="form1" method="post" action="">
	    <select name="select" size="1">   
	      {CD_CARD_DECKS}
	      
	    </select>
        <input type="hidden" name="hidden" value="{cards.CARD_ID}">
        <br>
        <input name="add_to_deck" type="submit" id="add_to_deck" value="{CD_ADD_TO_DECK}">
      </form>
	</div></td>
  </tr>
<!-- END cards -->
</table></td></tr></table>
