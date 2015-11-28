<table width="95%" cellpadding="2" cellspacing="0" border="0" class="forumline" align="center"><tr ><th COLSPAN="2">Card Game</th></tr><tr>
<td width="20%" valign="top" class="row1">
<table width="100%" height="100%" cellpadding="2" cellspacing="1" border="0" class="forumline" >
<tr>
<td class="bodyline">
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
  <table height="100%" cellpadding="2" cellspacing="1" border="0" class="forumline">
    <tr>
      <td width="32%" class="row1"><div align="right">{USERNAME}:</div></td>
      <td width="27%" class="row2"><div align="left">
        <select name="select">
          {CD_CHALLENGEE_NAMES}
        </select>
</div></td>
      <td width="41%" class="row1"><div align="right">{DECK}</div></td>
      <td width="41%" class="row2"><select name="select3">
	  {CD_CARD_DECKS}
      </select></td>
      <td width="41%" class="row1"><input name="send_challenge" type="submit" id="send_challenge2" value="{CHALLENGE}"></td>
    </tr>
  </table>
</form>
<br>
<form name="form3" method="post" action="">
        <div align="center">
          <select name="select2">
            
		{CD_CARD_DECKS}
        
          </select>
          <input name="post_challenge" type="submit" id="post _challenge" value="{POST_GLOBAL_CHALLENGE}">		
        </div>
</form>
<p align="center">&nbsp;</p>
<table width="100%" cellpadding="2" cellspacing="1" border="0" class="forumline">
  <tr>
    <th scope="col">{OPPOMENT}</th>
    <th scope="col">{PLAY}</th>
  </tr>
<!-- BEGIN games -->
  <tr>
    <td class="row1"><div align="center">{games.OPPOMENT}</div></td>
    <td class="row2"><div align="center">{games.PLAY}</div></td>
  </tr>
<!-- END games -->
</table>
<br><br>
<table width="100%" cellpadding="2" cellspacing="1" border="0" class="forumline" align="center">
  <tr>
    <th scope="col">{CHALLENGER}</th>
    <th scope="col">{ACTION}</th>
  </tr>
<!-- BEGIN challenges -->
  <tr>
    <td class="row1"><div align="center">{challenges.USER_NAME}</div></td>
    <td class="row2"><div align="center">
      <form name="form2" method="post" action="">
        <select name="select2">
		{CD_CARD_DECKS}
        </select>
        <input type="submit" name="accept" value="{ACCEPT}">
        <input type="submit" name="decline" value="{DECLINE}">
        <input name="hidden" type="hidden" id="hidden" value="{challenges.GAME_ID}">
      </form>
    </div></td>
  </tr>
<!-- END challenges -->
</table></td></tr></table>
<br>

