<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
	<tr>
		<th class="thHead" colspan="{SHOPTABLEROWS}">{L_SHOP_TITLE}</th>
	</tr>
	<tr>
		<td class="row2" colspan="{SHOPTABLEROWS}">
			<tr>
				<td class="row1">
					<span class="gen">
						<img src="./images/house/{SHOP_KEEPER_IMAGE}" align=left hspace=12 v:shapes="_x0000_s1026"> <br />
						<b>{HOUSE_SHOPKEEPER_NAME}</b> <br />
						<i>{L_HOUSE_WELCOME}</i>
					</span>
				</td>
			</tr>
		</td>
	</tr>
	<tr>
		<td class="row2" colspan="{SHOPTABLEROWS}">
			<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
<!-- BEGIN item_header -->
				<tr>
					<td class="row1">
						<span class="gen">{HOUSE_ICON}</span>
					</td>
					<td class="row2">
						<span class="gen">{HOUSE_DESCRIPTION}</span>
					</td>
					<td class="row1">
						<span class="gen">{HOUSE_PERSONAL}</span>
					</td>
					<td class="row1">
						<span class="gen">{HOUSE_SHOP_ACTIONS}</span>
					</td>
				</tr>
<!-- END item_header -->
<!-- BEGIN item_list -->
				<tr>
					<td class="row1"><img src="shop/images/{item_list.HOUSE_ITEM_IMAGE}" title="{item_list.HOUSE_ITEM_NAME}" alt="{item_list.HOUSE_ITEM_NAME}"></td>
                    <td class="row2">
						<span class="gensmall"><b>{item_list.HOUSE_ITEM_NAME}</b> <br /> <i>{item_list.HOUSE_ITEM_DESC}</i>
							<span class="gensmall"><br /><b>{item_list.L_HOUSE_PLACACBLE_ON}:</b> {item_list.HOUSE_ITEM_FURNITURE_TYPE}</span>
							<span class="gensmall"><br /><b>{item_list.L_HOUSE_ITEM_IN_STOCK} {item_list.HOUSE_ITEM_IN_STOCK}{item_list.HOUSE_ITEM_STOCK_QTY}</span>
						</span>
					</td>
                    <td class="row1">
						<span class="gensmall">{item_list.L_HOUSE_COSTS}: <b>{item_list.HOUSE_ITEM_COST}</b>  {item_list.L_HOUSE_ITEM_POINTS_NAME} <br /><br />{item_list.L_HOUSE_YOU_HAVE} <b>{item_list.HOUSE_ITEM_USER_QTY}</b></span>
					</td>
					<td class="row1">
						<span class="gensmall">
							<form action="{item_list.S_FORM_ACTION_BUY}" method="post">
								<b>{item_list.L_HOUSE_AMOUNT}:</b> <input class="post" type="text" maxlength="3" size="3" name="qtybuy" value="{item_list.DUMMY_VALUE}">
								<input type="hidden" value="{item_list.SHOP_KEEPER}" name="shop_keeper"><input type="submit" class="button" value="{item_list.L_HOUSE_BUY_BUTTON}"></b>
							</form>
                        	<form action="{item_list.S_FORM_ACTION_SELL}" method="post">
								<b>{item_list.L_HOUSE_AMOUNT}:</b> <input class="post" type="text" maxlength="3" size="3" name="qtysell" value="{item_list.DUMMY_VALUE}">
								<input type="hidden" value="{item_list.SHOP_KEEPER}" name="shop_keeper"><input type="submit" class="button" value="{item_list.L_HOUSE_SELL_BUTTON}"></b>
							</form>
						</span>
					</td>
				</tr>
<!-- END item_list -->
<!-- BEGIN action -->
				<tr>
					<td colspan="6" class="row1">
						<span class="gen">{action.TRANSACTION_RESULTS} </span>
					</td>
				</tr>
<!-- END action -->
			</table>
		</td>
	</tr>
	<tr>
		<td class="row2" colspan="{SHOPTABLEROWS}">
			<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
<!-- BEGIN return -->
				<td class="row1" align="center" valign="center" colspan="2" width="50%">
					<form action="{return.S_CONFIG_ACTION}" method="post">
						<span class="genmed">{return.L_HOUSE_RETURN_MAIN_HOUSE}<br />
							<input type="submit" value="{return.L_HOUSE_MAIN_BUTTON}" name="mode">
						</span>
					</form>
				</td>
				<td class="row1" align="center" valign="center" colspan="2" width="50%">
					<form action="{return.S_CONFIG_ACTION}" method="post">
						<span class="genmed">{return.L_RETURN_TO_SHOP}<br />
							<input type="submit" value="{return.L_RETURN_TO_SHOP_BUTTON}" name="mode">
						</span>
					</form>
				</td>
<!-- END return -->
<!-- BEGIN return2 -->
				<td class="row1" align="center" valign="center" colspan="3" width="33%">
					<form action="{return2.S_CONFIG_ACTION}" method="post">
						<span class="genmed">{return2.L_HOUSE_RETURN_MAIN_HOUSE}<br />
							<input type="submit" value="{return2.L_HOUSE_MAIN_BUTTON}" name="mode">
						</span>
					</form>
				</td>
				<td class="row1" align="center" valign="center" colspan="3" width="33%">
					<form action="{return2.S_CONFIG_ACTION}" method="post">
						<span class="genmed">{return2.L_HOUSE_RETURN_GARDEN}<br />
							<input type="submit" value="{return2.L_HOUSE_GARDEN_SHOP_BUTTON}" name="mode">
						</span>
					</form>
				</td>
				<td class="row1" align="center" valign="center" colspan="3" width="33%">
					<form action="{return2.S_CONFIG_ACTION}" method="post">
						<span class="genmed">{return2.L_HOUSE_RETURN_FURNITURE}<br />
							<input type="submit" value="{return2.L_HOUSE_FURNITURE_SHOP_BUTTON}" name="mode">
						</span>
					</form>
				</td>
<!-- END return2 -->
			</table>
	</tr>
</table>

<br />
<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
  <tr> 
	<td align="center"><span class="genmed">House Mod written by: Sgt Detrius</span></td>
  </tr>
  <tr>
	<td align="center"><span class="genmed">ADR adaptation by: <a href="http://www.OzziesWorld.com/" target="_blank">Ozzie</a></span></td>
  </tr>
</table>
<br	clear="all" />
