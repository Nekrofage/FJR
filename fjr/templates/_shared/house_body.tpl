<br />
<form action="{H_CONFIG_ACTION}" method="post" name="post">
	<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
		<tr>
			<th class="thHead" colspan="10">{L_HOUSE_TITLE}</th>
		</tr>
		<tr>
			<th class="thHead" colspan="10">{L_HOUSE_PAGE_TITLE}</th>
		</tr>
<!-- BEGIN main -->
		<tr>
			<td class="row1" align="center" valign="center" colspan="2">
				<table width="90%" align="center" valign="center">
					<tr>
						<td align="center" valign="center"><span class="genmed">{L_HOUSE_BUY_HOUSE}</span></td>
						<td align="center" valign="center"><span class="genmed">{L_HOUSE_SELL_HOUSE}</span></td>
						<td align="center" valign="center"><span class="genmed">{L_HOUSE_BUY_GARDEN_SUPPLIES}</span></td>
						<td align="center" valign="center"><span class="genmed">{L_HOUSE_BUY_FURNITURE}</span></td>
						<td align="center" valign="center"><span class="genmed">{L_HOUSE_FURNISH_HOUSE}</span></td>
					</tr>
					<tr>
						<td align="center" valign="center"><input type="submit" value="{L_HOUSE_BUY_BUTTON}" name="mode"></td>
						<td align="center" valign="center"><input type="submit" value="{L_HOUSE_SELL_BUTTON}" name="mode"></td>
						<td align="center" valign="center"><input type="submit" value="{L_HOUSE_SHOP_2_BUTTON}" name="mode"></td>
						<td align="center" valign="center"><input type="submit" value="{L_HOUSE_SHOP_1_BUTTON}" name="mode"></td>
						<td align="center" valign="center"><input type="submit" value="{L_HOUSE_FURNISH_HOUSE_BUTTON}" name="mode"></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="row1" align="center" valign="center" width="50%">
				<span class="genmed">{L_HOUSE_VIEW_HOUSE}:<br /><input type="submit" value="{L_HOUSE_VIEW_HOUSE_BUTTON}" name="mode"></span>
			</td>
			<td class="row1" align="center" valign="center" width="50%">
				<span class="genmed">{L_HOUSE_VIEW_OTHER_HOUSES}:<br /><input type="submit" value="{L_HOUSE_VIEW_OTHER_HOUSES_BUTTON}" name="mode"></span>
			</td>
		</tr>
<!-- END main -->
<!-- BEGIN view_house_list -->
		<tr>
			<td align="center" valign="center" width="100%">
				<table width="100%" align="center" valign="center">
					{HOUSES}
				</table>
			</td>
		</tr>
		<tr>
			<td class="row1" align="center" valign="center" colspan="2">
				<span class="genmed" width="25%">{L_HOUSE_RETURN_MAIN_HOUSE_PAGE}<br /><input type="submit" value="{L_HOUSE_MAIN_BUTTON}" name="mode"></span>
			</td>
		</tr>
<!-- END view_house_list -->
<!-- BEGIN furnish_house -->
<!-- BEGIN user_house -->
		<tr>
			<td class="row1" align="center" valign="center">
				<br />
				<table background="{HOUSE_BACKGROUND}" width="{HOUSE_WIDTH}px" height="{HOUSE_HEIGHT}px" cellpadding=0 cellspacing=0 marginwidth=0 marginheight=0 topmargin=0 leftmargin=0 border=1>
					{CELL_INFO}
				</table>
				<br />
			</td>
			<td class="row1" align="center" valign="center"><img src="images/house/{HOUSE_FRONT}" border="0" alt=""></td>
		</tr>
		<tr>
			<td class="row1" align="center" valign="center" colspan="2">
				<table width="95%" align"center" valign="center">
					<tr><input type="hidden" value="{L_HOUSE_FURNISH_HOUSE_BUTTON}" name="mode">
						<td align="center" valign="center"><span class="genmed"><b>{L_HOUSE_REMOVE_ITEM}:</b></span></td>
						<td align="center" valign="center"><span class="genmed">Item:{USER_HOUSE_INVENTORY}</span></td>
						<td align="center" valign="center"><span class="genmed"><input type="submit" value="{L_HOUSE_REMOVE}" name="action"></span></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="row1" align="center" valign="center" colspan="2">
				<table width="95%" align"center" valign="center">
					<tr><input type="hidden" value="{L_HOUSE_FURNISH_HOUSE_BUTTON}" name="mode">
						<td align="center"><span class="genmed"><b>{L_HOUSE_FURNITURE_FLOOR}:</b></span></td>
						<td align="center">
							<span class="genmed">{L_HOUSE_PLACE}: {FLOOR_CELL_LIST}</span>
						</td>
						<td align="center">
							<span class="genmed">{L_HOUSE_ITEM}: {FLOOR_ITEM_LIST}</span>
						</td>
						<td align="center"><input type="submit" value="{L_HOUSE_PLACE_ITEM}" name="action"></td>
					</tr>
					<tr>
						<td align="center"><span class="genmed"><b>{L_HOUSE_FURNITURE_WALL}:</b></span></td>
						<td align="center">
							<span class="genmed">{L_HOUSE_PLACE}: {WALL_CELL_LIST}</span>
						</td>
						<td align="center">
							<span class="genmed">{L_HOUSE_ITEM}: {WALL_ITEM_LIST}</span>
						</td>
						<td align="center"><input type="submit" value="{L_HOUSE_PLACE_ITEM}" name="action"></td>
					</tr>
					<tr>
						<td align="center"><span class="genmed"><b>{L_HOUSE_FURNITURE_GARDEN}:</b></span></td>
						<td align="center">
							<span class="genmed">{L_HOUSE_PLACE}: {GARDEN_CELL_LIST}</span>
						</td>
						<td align="center">
							<span class="genmed">{L_HOUSE_ITEM}: {GARDEN_ITEM_LIST}</span>
						</td>
						<td align="center"><input type="submit" value="{L_HOUSE_PLACE_ITEM}" name="action"></td>
					</tr>
					<tr>
						<td align="center"><span class="genmed"><b>{L_HOUSE_FURNITURE_FLOOR_WALL}:</b></span></td>
						<td align="center">
							<span class="genmed">{L_HOUSE_PLACE}: {FLOOR_WALL_CELL_LIST}</span>
						</td>
						<td align="center">
							<span class="genmed">{L_HOUSE_ITEM}: {FLOOR_WALL_ITEM_LIST}</span>
						</td>
						<td align="center"><input type="submit" value="{L_HOUSE_PLACE_ITEM}" name="action"></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="row1" align="center" valign="center" colspan="2">
				<span class="genmed">{L_HOUSE_RETURN_MAIN_HOUSE}<br /><input type="submit" value="{L_HOUSE_MAIN_BUTTON}" name="mode"></span>
			</td>
		</tr>
<!-- END user_house -->
<!-- END furnish_house -->
<!-- BEGIN update_notification -->
			<tr>
				<td class="row1" align="center" valign="center" colspan="2"><br />
					<span class="genmed">{L_HOUSE_UPDATED}</span>
				</td>
			</tr>
			<tr>
				<td class="row1" align="center" valign="center" width="50%">
					<span class="genmed">{L_HOUSE_RETURN_MAIN_HOUSE}<br /><input type="submit" value="{L_HOUSE_MAIN_BUTTON}" name="mode"></span>
				</td>
				<td class="row1" align="center" valign="center" width="50%">
					<span class="genmed">{L_HOUSE_RETURN_EDIT_HOUSE}<br /><input type="submit" value="{L_HOUSE_EDIT_HOUSE_BUTTON}" name="mode"></span>
				</td>
			</tr>
<!-- END update_notification -->
<!-- BEGIN buy_house -->
			<tr>
				<td class="row1" align="center" valign="center" colspan="2">
					<table width="100%" align="center" valign="center" border=1>
<!-- BEGIN house_list -->
						<tr>
							<td class="row1" align="center" valign="center"><span class="genmed"><b>{buy_house.house_list.HOUSE_NAME}</b><br /><br /><br />
								<img src="./images/house/{buy_house.house_list.HOUSE_FRONT}" border="0" title="{L_HOUSE_FRONT_TITLE}" alt="{L_HOUSE_FRONT_TITLE}"></span>
							</td>
							<td class="row1" align="center" valign="center">
								<img src="./images/house/{buy_house.house_list.HOUSE_BG}" border="0" title="{L_HOUSE_BG_TITLE}" alt="{L_HOUSE_BG_TITLE}">
							</td>
							<td class="row1" align="center" valign="center">
								<span class="genmed">{buy_house.house_list.HOUSE_PRIZE}<br /><br /><br />
									<input type=radio name="houseid" value="{buy_house.house_list.HOUSE_TYPE}">
								</span>
							</td>
						</tr>
<!-- END house_list -->
					</table>
				</td>
			</tr>
			<tr>
				<td class="row1" align="center" valign="center">
					<input type="hidden" value="{L_HOUSE_BUY_BUTTON}" name="mode"><span class="genmed">{L_HOUSE_OFFER_BUY}<br /><input type="submit" value="{L_HOUSE_PURCHASE}" name="action"></span>
				</td>
				<td class="row1" align="center" valign="center">
					<input type="hidden" value="{L_HOUSE_BUY_BUTTON}" name="mode"><span class="genmed">{L_HOUSE_RETURN_MAIN_HOUSE}<br /><input type="submit" value="{L_HOUSE_MAIN_BUTTON}" name="mode"></span>
				</td>
			</tr>
<!-- END buy_house -->
<!-- BEGIN sell_house -->
			<tr>
				<td class="row1" align="center" valign="center">
					<span class="genmed">{L_HOUSE_SELL_CONFIRMATION}<br /><br /><br />
						<img src="./images/house/{HOUSE_FRONT}" border="0" valign="center" alt=""><br /><br /><br />
						<input type="hidden" value="{L_HOUSE_SELL_HOUSE_BUTTON}" name="mode"><input type="submit" value="{L_HOUSE_PURCHASE_BUTTON}" name="action"><br /><br />
						<input type="submit" value="{L_HOUSE_MAIN_BUTTON}" name="mode">
					</span>
				</td>
			</tr>
<!-- END sell_house -->
<!-- BEGIN view_house -->
<!-- BEGIN rpg_house -->
			<tr>
				<td class="row1" align="center" valign="center" colspan="2">
					<span class="genmed"><b>{RPG_DESCRIPTION}</b></span>
				</td>
			</tr>
<!-- END rpg_house -->
			<tr>
				<td class="row1" align="center" valign="center">
					<br />
					<table background="{HOUSE_BACKGROUND}" width="{HOUSE_WIDTH}px" height="{HOUSE_HEIGHT}px" cellpadding=0 cellspacing=0 marginwidth=0 marginheight=0 topmargin=0 leftmargin=0 border=0>
						{CELL_INFO}
					</table>
					<br />
				</td>
				<td class="row1" align="center" valign="center"><img src="images/house/{HOUSE_FRONT}" border="0" alt=""></td>
			</tr>
<!-- BEGIN rpg_buy -->
			<tr>
				<td class="row1" align="center" valign="center" colspan="2"><input type="hidden" value="{L_HOUSE_RPG}" name="mode"><input type="hidden" value="{RPG_ID}" name="id">
					<span class="genmed">{RPG_PRICE}<br /><input type="submit" value="{L_HOUSE_BUY}" name="action"></span>
				</td>
			</tr>
<!-- END rpg_buy -->
			<tr>
				<td class="row1" align="center" valign="center" colspan="2">
					<span class="genmed">{L_HOUSE_RETURN_MAIN_HOUSE}<br /><input type="submit" value="{L_HOUSE_MAIN_BUTTON}" name="mode"></span>
				</td>
			</tr>
<!-- END view_house -->
<!-- BEGIN view_house_not -->
			<tr>
				<td class="row1" align="center" valign="center">
					<span class="genmed">{L_HOUSE_UPDATED}</span>
				</td>
			</tr>
			<tr>
				<td class="row1" align="center" valign="center" colspan="2">
					<span class="genmed">{L_HOUSE_RETURN_MAIN_HOUSE}<br /><input type="submit" value="{L_HOUSE_MAIN_BUTTON}" name="mode"></span>
				</td>
			</tr>
<!-- END view_house_not -->
<!-- BEGIN rpg_no_exist -->
			<tr>
				<td class="row1" align="center" valign="center" colspan="2">
					<span class="genmed"><br />{L_HOUSE_RPG_NO_EXIST}<br /></span>
				</td>
			</tr>
			<tr>
				<td class="row1" align="center" valign="center" colspan="2">
					<span class="genmed">{L_HOUSE_RETURN_MAIN_HOUSE}<br /><input type="submit" value="{L_HOUSE_MAIN_BUTTON}" name="mode"></span>
				</td>
			</tr>
<!-- END rpg_no_exist -->
	</table>
</form>
<!-- BEGIN view_house_list -->
<br	clear="all" />
<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td><span class="nav">{PAGE_NUMBER}</span></td>
		<td align="right"><span class="gensmall"><span class="nav">{PAGINATION}</span></td>
	</tr>
</table>
<br	clear="all" />
<!-- END view_house_list -->
<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr>
		<td align="center"><span class="genmed">House Mod written by: Sgt Detrius</span></td>
	</tr>
	<tr>
		<td align="center"><span class="genmed">ADR adaptation by: <a href="http://www.OzziesWorld.com/" target="_blank">Ozzie</a></span></td>
	</tr>
</table>
<br   clear="all" /> 
