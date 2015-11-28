<h1>{L_HOUSE_ADMIN_TITLE}</h1>
<p>{L_HOUSE_ADMIN_TITLE_EXPLAIN}</p>
<form action="{S_CONFIG_ACTION}" method="post" name="post">
	<table width="99%" cellpadding="4" cellspacing="1" border="0" align="center" class="forumline">
		<tr>
			<th class="thHead" colspan="2">{L_HOUSE_ADMIN_PAGE_TITLE}</th>
		</tr>
<!-- BEGIN main -->
		<tr>
			<tr><td class="row2" colspan="2"><br /></td></tr>
			<tr><input type="hidden" value="{L_HOUSE_ADMIN_MAIN}" name="action">
				<td class="row2"><span class="gen"><b>{L_HOUSE_SETTINGS}</b><br /></span><span class="gensmall">{L_HOUSE_SETTINGS_EXPLAIN}</span></td>
				<td class="row2"><input type="submit" VALUE="{L_HOUSE_SETTINGS}" name="mode"></td>
			</tr>
			<tr>
				<td class="row2"><span class="gen"><b>{L_HOUSE_TYPES}</b><br /></span><span class="gensmall">{L_HOUSE_TYPES_EXPLAIN}</span></td>
				<td class="row2"><input type="submit" VALUE="{L_HOUSE_TYPES}" name="mode"></td>
			</tr>
			<tr>
				<td class="row2"><span class="gen"><b>{L_HOUSE_FURNITURE_CELLS}</b><br /></span><span class="gensmall">{L_HOUSE_FURNITURE_CELLS_EXPLAIN}</span></td>
				<td class="row2"><input type="submit" VALUE="{L_HOUSE_FURNITURE_CELLS}" name="mode"></td>
			</tr>
			<tr>
				<td class="row2"><span class="gen"><b>{L_HOUSE_SHOP_1}</b><br /></span><span class="gensmall">{L_HOUSE_SHOP_EXPLAIN}</span></td>
				<td class="row2"><input type="submit" VALUE="{L_HOUSE_ADMIN_SHOP_1}" name="mode"></td>
			</tr>
			<tr>
				<td class="row2"><span class="gen"><b>{L_HOUSE_SHOP_2}</b><br /></span><span class="gensmall">{L_HOUSE_SHOP_EXPLAIN}</span></td>
				<td class="row2"><input type="submit" VALUE="{L_HOUSE_ADMIN_SHOP_2}" name="mode"></td>
			</tr>
			<tr>
				<td class="row2"><span class="gen"><b>{L_HOUSE_EDIT_HOUSE}</b><br /></span><span class="gensmall">{L_HOUSE_EDIT_HOUSE_EXPLAIN}</span></td>
				<td class="row2">&nbsp;<input type="text" class="post" name="username" maxlength="30" size="30">&nbsp;<input type="submit" value="{L_HOUSE_EDIT_HOUSE}" name="mode"><br />&nbsp;<input type="button" name="usersearch" value="Find Username" class="liteoption" onClick="window.open('./../search.php?mode=searchuser', '_phpbbsearch', 'HEIGHT=250,resizable=yes,WIDTH=400');return false;" /></td>
			</tr>
			<tr>
				<td class="row2"><span class="gen"><b>{L_HOUSE_EDIT_USER_HOUSE}</b><br /></span><span class="gensmall">{L_HOUSE_EDIT_USER_HOUSE_EXPLAIN}</span></td>
				<td class="row2">{USER_HOUSE_LIST} <input type="submit" value="{L_HOUSE_EDIT_HOUSE}" name="mode"></td>
			</tr>
			<tr>
				<td class="row2"><span class="gen"><b>{L_HOUSE_CREATE_RPG_HOUSE}</b><br /></span><span class="gensmall">{L_HOUSE_CREATE_RPG_HOUSE_EXPLAIN}</span></td>
				<td class="row2"><input type="submit" VALUE="{L_HOUSE_CREATE_RPG_HOUSE}" name="mode"></td>
			</tr>
			<tr>
				<td class="row2"><span class="gen"><b>{L_HOUSE_EDIT_RPG_HOUSE}</b><br /></span><span class="gensmall">{L_HOUSE_EDIT_RPG_HOUSE_EXPLAIN}</span></td>
				<td class="row2">{RPG_HOUSE_LIST} <input type="submit" value="{L_HOUSE_EDIT_RPG_HOUSE_BUTTON}" name="mode"></td>
			</tr>
<!-- BEGIN shop_choice -->
			<tr>
				<td class="row2"><span class="gen"><b>{L_HOUSE_SHOP_SELECT}</b><br /></span><span class="gensmall">{L_HOUSE_SHOP_SELECT_EXPLAIN}</span></td>
				<td class="row2">{SHOP_SELECT_LIST} <input type="submit" value="{L_HOUSE_SHOP_SELECT_BUTTON}" name="mode"></td>
			</tr>
<!-- END shop_choice -->
<!-- BEGIN adr_only -->
			<tr>
				<td class="row2"><span class="gen"><b>{L_HOUSE_ADR_NOTICE}</b><br /></span><span class="gensmall">{L_HOUSE_ADR_NOTICE_EXPLAIN}</span></td>
				<td class="row2"><span class="gen"><b>{L_HOUSE_ADR_NOTICE_USE}</b></td>
			</tr>
<!-- END adr_only -->
<!-- BEGIN shop_type_error -->
			<tr>
				<td class="row2"><span class="gen"><b><font color="red">{L_HOUSE_SHOP_TYPE_ERROR}</font></b></span></td>
				<td class="row2">{L_HOUSE_SHOP_TYPE_ERROR_MSG}</td>
			</tr>
<!-- END shop_type_error -->
<!-- BEGIN adr -->
			<tr>
				<td class="row2"><span class="gen"><b>{L_HOUSE_FURNITURE_SHOP}</b><br /></span><span class="gensmall">{L_HOUSE_FURNITURE_SHOP_EXPLAIN}</span></td>
				<td class="row2">{FURNITURE_SHOP_LIST} <input type="submit" value="{L_HOUSE_FURNITURE_SHOP_BUTTON}" name="mode"></td>
			</tr>
			<tr>
				<td class="row2"><span class="gen"><b>{L_HOUSE_GARDEN_SHOP}</b><br /></span><span class="gensmall">{L_HOUSE_FURNITURE_SHOP_EXPLAIN}</span></td>
				<td class="row2">{GARDEN_SHOP_LIST} <input type="submit" value="{L_HOUSE_GARDEN_SHOP_BUTTON}" name="mode"></td>
			</tr>
<!-- END adr -->
<!-- END main -->
<!-- BEGIN edit_house -->
<!-- BEGIN rpg_house -->
			<tr>
				<input type="hidden" value="{L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON}" name="mode"><input type="hidden" value="{RPG_HOUSE}" name="rpghouse">
				<td class="row1" align="center" valign="center" colspan="2">
					<span class="genmed"><b>{L_HOUSE_ADMIN_EDITING_RPG_HOUSE} {RPG_HOUSE}</b>
						<br />{L_HOUSE_ADMIN_DESCRIPTION}: <input type="text" name="rpgdes" value="{RPG_HOUSE_DESCRIPTION}" SIZE="35">&nbsp;&nbsp;<input type="submit" value="{L_HOUSE_ADMIN_UPDATE_DESCRIPTION}" name="action"><img src="images/spacer.gif" alt="" width="57" height="1" />
						<br />{L_HOUSE_ADMIN_OWNER}: <input type="text" name="owner" value="{RPG_HOUSE_OWNER}" SIZE="30">&nbsp;&nbsp;<input type="submit" value="{L_HOUSE_ADMIN_UPDATE_OWNER}" name="action">  {L_HOUSE_ADMIN_NO_OWNER_INFO}
						<br />{L_HOUSE_ADMIN_COSTS}: <input type="text" name="prize" value="{RPG_HOUSE_PRICE}" SIZE="16">&nbsp;&nbsp;<input type="submit" value="{L_HOUSE_ADMIN_UPDATE_PRICE}" name="action"><img src="images/spacer.gif" alt="" width="193" height="1" />
					</span>
				</td>
			</tr>
<!-- END rpg_house -->
<!-- BEGIN user_house -->
			<tr>
				<td class="row1" align="center" valign="center" colspan="2"><span class="genmed"><b>{L_HOUSE_ADMIN_EDITING_USER_HOUSE}</b></span>
			</tr>
<!-- END user_house -->
			<tr>
				<td class="row1" align="center" valign="center">
					<br />
					<table background="{HOUSE_BACKGROUND}" width="{HOUSE_WIDTH}px" height="{HOUSE_HEIGHT}px" cellpadding=0 cellspacing=0 marginwidth=0 marginheight=0 topmargin=0 leftmargin=0 border=1>
						{CELL_INFO}
					</table>
					<br />
				</td>
				<td class="row1" align="center" valign="center"><img src="../images/house/{HOUSE_FRONT}" border="0" alt=""></td>
			</tr>
			<tr>
				<td class="row1" align="center" valign="center" colspan="2">
					<table width="95%" align"center" valign="center">
						<tr><input type="hidden" value="{L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON}" name="mode">
<!-- BEGIN rpg_house -->
							<input type="hidden" value="{RPG_HOUSE}" name="rpghouse">
<!-- END rpg_house -->
							<td align="center" valign="center"><span class="genmed"><b>{L_HOUSE_ADMIN_REMOVE_ITEM}:</b></span></td>
							<td align="center" valign="center"><span class="genmed">{L_HOUSE_ADMIN_ITEM}: {USER_HOUSE_INVENTORY}</span></td>
							<td align="center" valign="center"><span class="genmed"><input type="submit" value="{L_HOUSE_ADMIN_REMOVE}" name="action"></span></td>
						<tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="row1" align="center" valign="center" colspan="2">
					<table width="95%" align"center" valign="center">
						<tr><input type="hidden" value="{L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON}" name="mode">
<!-- BEGIN user_house -->
							<input type="hidden" value="{USER_ID}" name="id"><input type="hidden" value="{USER_NAME}" name="username">
<!-- END user_house -->
							<td align="center"><span class="genmed"><b>{L_HOUSE_ADMIN_FURNITURE_FLOOR}:</b></span></td>
							<td align="center"><span class="genmed">{L_HOUSE_ADMIN_PLACE}: {FLOOR_CELL_LIST}</span></td>
	    	                   <td align="center"><span class="genmed">{L_HOUSE_ADMIN_ITEM}: {FLOOR_ITEM_LIST}</span></td>
							<td align="center"><input type="submit" value="{L_HOUSE_ADMIN_PLACE_ITEM}" name="action"></td>
						</tr>
						<tr>
							<td align="center"><span class="genmed"><b>{L_HOUSE_ADMIN_FURNITURE_WALL}:</b></span></td>
							<td align="center"><span class="genmed">{L_HOUSE_ADMIN_PLACE}: {WALL_CELL_LIST}</span></td>
							<td align="center"><span class="genmed">{L_HOUSE_ADMIN_ITEM}: {WALL_ITEM_LIST}</span></td>
							<td align="center"><input type="submit" value="{L_HOUSE_ADMIN_PLACE_ITEM}" name="action"></td>
						</tr>
						<tr>
							<td align="center"><span class="genmed"><b>{L_HOUSE_ADMIN_FURNITURE_GARDEN}:</b></span></td>
							<td align="center"><span class="genmed">{L_HOUSE_ADMIN_PLACE}: {GARDEN_CELL_LIST}</span></td>
							<td align="center"><span class="genmed">{L_HOUSE_ADMIN_ITEM}: {GARDEN_ITEM_LIST}</span></td>
							<td align="center"><input type="submit" value="{L_HOUSE_ADMIN_PLACE_ITEM}" name="action"></td>
						</tr>
						<tr>
							<td align="center"><span class="genmed"><b>{L_HOUSE_ADMIN_FURNITURE_FLOOR_WALL}:</b></span></td>
							<td align="center"><span class="genmed">{L_HOUSE_ADMIN_PLACE}: {FLOOR_WALL_CELL_LIST}</span></td>
							<td align="center"><span class="genmed">{L_HOUSE_ADMIN_ITEM}: {FLOOR_WALL_ITEM_LIST}</span></td>
							<td align="center"><input type="submit" value="{L_HOUSE_ADMIN_PLACE_ITEM}" name="action"></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" class="row1"><span class="genmed">{L_HOUSE_ADMIN_DELETION_WARNING}<p>
					<input type="submit" value="{L_HOUSE_ADMIN_DELETE_HOUSE}" name="action" style="color:white;background-color:red;"></span>
				</td>
			</tr>
			<tr>
				<td class="row1" align="center" valign="center" colspan="2">
					<span class="genmed">{L_HOUSE_ADMIN_RETURN_MAIN_HOUSE}<br /><input type="submit" value="{L_HOUSE_ADMIN_MAIN}" name="mode"></span>
				</td>
			</tr>
<!-- END edit_house -->
<!-- BEGIN update_notification -->
			<tr>
				<td class="row1" align="center" valign="center" colspan="2"><br />
					<span class="genmed">{L_HOUSE_ADMIN_UPDATED}</span>
				</td>
			</tr>
			<tr>
				<td class="row1" align="center" valign="center">
					<span class="genmed">{L_HOUSE_ADMIN_RETURN_MAIN_HOUSE}<br /><input type="submit" value="{L_HOUSE_ADMIN_MAIN}" name="mode"></span>
				</td>
				<td class="row1" align="center" valign="center"><input type="hidden" value="{NAME}" name="{NAME_VAR}"><input type="hidden" value="{L_HOUSE_ADMIN_MAIN}" name="action">
					<span class="genmed">{L_HOUSE_ADMIN_RETURN_EDIT_HOUSE}<br /><input type="submit" value="{L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON}" name="mode"></span>
				</td>
			</tr>
<!-- END update_notification -->
<!-- BEGIN create_rpg_house -->
			<input type="hidden" value="{L_HOUSE_ADMIN_CREATE_RPG_HOUSE}" name="mode">
			<tr>
				<td class="row2"><span class="genmed"><b>{L_HOUSE_ADMIN_RPG_ID}:</b><br></span><span class="gensmall">{L_HOUSE_ADMIN_RPG_ID_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="rpgid" value="{NEW_RPG_ID}" SIZE="3"></td>
			</tr>
			<tr>
				<td class="row2"><span class="genmed"><b>{L_HOUSE_ADMIN_HOUSE_DESCRIPTION}:</b><br></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_DESCRIPTION_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="rpgdes" value="" SIZE="35"></td>
			</tr>
			<tr>
				<td class="row2"><span class="genmed"><b>{L_HOUSE_ADMIN_HOUSE_PRICE}:</b><br></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_PRICE_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="prize" value="" SIZE="16"></td>
			</tr>
			<tr>
				<td class="row2"><span class="genmed"><b>{L_HOUSE_ADMIN_HOUSE_TYPE}:</b></span></td>
				<td class="row2">{HOUSE_TYPE_LIST}</td>
			</tr>
			<tr>
				<td colspan="2" align="center" class="row2"><span class="gen"><input type="submit" value="{L_HOUSE_ADMIN_CREATE}" name="action"></span></td>
			</tr>
			<tr>
				<td colspan="2"  class="row2" align="center" valign="center">
					<span class="genmed">{L_HOUSE_ADMIN_MAIN_RETURN}<br /><input type="submit" value="{L_HOUSE_ADMIN_MAIN}" name="mode"></span>
				</td>
			</tr>
<!-- END create_rpg_house -->
<!-- BEGIN no_house -->
			<tr>
				<td colspan="2" align="center" class="row2"><span class="gen"><b>{USER_NAME} {L_HOUSE_ADMIN_USER_NO_HOUSE}</b></span><input type="hidden" value="{L_HOUSE_ADMIN_EDIT_HOUSE}" name="mode"><input type="hidden" value="{USER_ID}" name="id"><input type="hidden" value="{USER_NAME}" name="username"></td>
			</tr>
			<tr>
				<td class="row2" align="center" width="50%"><span class="genmed"><b>{L_HOUSE_ADMIN_HOUSE_TYPE}:</b></span></td>
				<td class="row2"><span class="genmed">{HOUSE_TYPE_LIST} <input type="submit" value="{L_HOUSE_ADMIN_GIVE}" name="action"></span></td>
			</tr>
			<tr>
				<td colspan="2" class="row2" align="center" valign="center">
					<span class="genmed">{L_HOUSE_ADMIN_MAIN_RETURN}<br /><input type="submit" value="{L_HOUSE_ADMIN_MAIN}" name="mode"></span>
				</td>
			</tr>
<!-- END no_house -->
<!-- BEGIN shop_list -->
			<tr><td class="row2" colspan="2" align="center"><br /><input type="hidden" name="mode" value="{L_HOUSE_ADMIN_SHOP}"><span class="genmed"><b>{L_HOUSE_ADMIN_SHOP_LIST_WARNING}</b></span><br /></td></tr>
			<tr>
				<td class="row2"><span class="gen"><b>{L_HOUSE_ADMIN_EDIT_ITEM}:</b></span></td>
				<td class="row2">{SHOP_ITEMS}</td>
			</tr>
			<tr>
				<td class="row2" colspan="2">
					<table width="90%" border="0">
						<tr>
							<td align="center" valign="top"><span class="genmed">{L_HOUSE_ADMIN_NONE_ITEMS}</span></td>
							<td align="center" valign="top"><span class="genmed">{L_HOUSE_ADMIN_FLOOR_ITEMS}</span></td>
							<td align="center" valign="top"><span class="genmed">{L_HOUSE_ADMIN_WALL_ITEMS}</span></td>
						</tr>
						<tr>
							<td align="center" valign="top"><span class="genmed">{L_HOUSE_ADMIN_WF_ITEMS}</span></td>
							<td align="center" valign="top"><span class="genmed">{L_HOUSE_ADMIN_GARDEN_ITEMS}</span></td>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2" class="row2" align="center" valign="center">
					<span class="genmed">{L_HOUSE_ADMIN_RETURN_MAIN_HOUSE}<br /><input type="submit" value="{L_HOUSE_ADMIN_MAIN}" name="mode"></span>
				</td>
			</tr>
<!-- END shop_list -->
<!-- BEGIN item_edit -->
			<tr><td class="row2" colspan="2" align="center"><br><input type="hidden" name="mode" value="{L_HOUSE_ADMIN_SHOP}"><input type="hidden" name="upitem" value="{ITEM_KEY}"><span class="genmed"><b>{L_HOUSE_ADMIN_SHOP_LIST_WARNING}</b></span><br></td></tr>
			<tr>
				<td class="row2" align="center" valign="center"><span class="gen"><b>{ITEM_NAME} is :<br><img src="../adr/images/items/{ITEM_ICON}" border="0" title="{ITEM_NAME}" alt="{ITEM_NAME}"></b></span></td>
				<td class="row2"><span class="gen"><b>
					<input type=radio name="ftype" value="{F_TYPE_0}"{TYPE_NONE}> {L_HOUSE_ADMIN_NONE_ITEM} <br>
					<input type=radio name="ftype" value="{F_TYPE_1}"{TYPE_FLOOR}> {L_HOUSE_ADMIN_FLOOR_ITEM} <br>
					<input type=radio name="ftype" value="{F_TYPE_2}"{TYPE_WALL}> {L_HOUSE_ADMIN_WALL_ITEM} <br>
					<input type=radio name="ftype" value="{F_TYPE_3}"{TYPE_FW}> {L_HOUSE_ADMIN_WF_ITEM} <br>
					<input type=radio name="ftype" value="{F_TYPE_4}"{TYPE_GARDEN}> {L_HOUSE_ADMIN_GARDEN_ITEM} <br>
				</span></td>
			</tr>
			<tr>
				<td class="row2" align="center" colspan="2"><input type="submit" value="{L_HOUSE_ADMIN_UPDATE_ITEM}" name="action"></td>
			</tr>
			<tr>
				<td colspan="2" class="row2" align="center" valign="center">
					<span class="genmed">{L_HOUSE_ADMIN_RETURN_MAIN_HOUSE}<br /><input type="submit" value="{L_HOUSE_ADMIN_MAIN}" name="mode"></span>
				</td>
			</tr>
<!-- END item_edit -->
<!-- BEGIN furniture_house_select -->
			<tr>
				<td class="row2" colspan="2"><br></td>
			</tr>
			<tr>
				<td colspan="2" align="center" class="row2"><span class="gen"><b>{L_HOUSE_ADMIN_EDIT_FURNITURE_CELLS_HOUSE}</b></span></td>
			</tr>
			<input type="hidden" name="mode" value="{L_HOUSE_ADMIN_FURNITURE_CELLS}">
			<tr>
				<td class="row2"><b>{L_HOUSE_ADMIN_FURNITURE_CELLS_2}:</b></td>
				<td class="row2">{HOUSES}  <input type="submit" value="{L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON}" name="action"></td>
			</tr>
			<tr>
				<td colspan="2" class="row2" align="center" valign="center">
					<span class="genmed">{L_HOUSE_ADMIN_RETURN_MAIN_HOUSE}<br /><input type="submit" value="{L_HOUSE_ADMIN_MAIN}" name="mode"></span>
				</td>
			</tr>
<!-- END furniture_house_select -->
<!-- BEGIN furniture_cells -->
			<tr>
				<td class="row2" colspan="2"><br></td>
			</tr>
			<tr>
				<td colspan="2" align="center" class="row2"><span class="gen"><b>{L_HOUSE_ADMIN_EDIT_FURNITURE_CELLS}</b></span></td>
			</tr>
			<input type="hidden" name="mode" value="Furniture Cells"><input type="hidden" name="thathouse" value="{EDIT_HOUSE}">
			<tr>
				<td class="row2" align="center">
					<br />
					<span class="genmed">{L_HOUSE_ADMIN_INTERIOR_IMAGE}</span>
					<br />
					<table background="../images/house/{HOUSE}" width="{HOUSE_WIDTH}px" height="{HOUSE_HEIGHT}px" cellpadding=0 cellspacing=0 marginwidth=0 marginheight=0 topmargin=0 leftmargin=0 border=1>
						{CELL_IMAGES}
					</table>
					<br />
				</td>
				<td class="row2" align="center">
					<br />
					<span class="genmed">{L_HOUSE_ADMIN_EXTERIOR_IMAGE}</span>
					<br />
					<img src="../images/house/{HOUSE_FRONT}" border="0" title="{HOUSE_NAME}" alt="{HOUSE_NAME}">
				</td>
			</tr>
			<tr>
				<td class="row2" colspan="2" align="center">
					<br />
					<table width="95%" cellpadding=0 cellspacing=0 marginwidth=0 marginheight=0 topmargin=0 leftmargin=0 border=0>
						<tr>
							<td align="center"><span class="gen"><b>{L_HOUSE_ADMIN_DEFINE_FLOOR_CELLS}</b></span></td>
							<td align="center"><span class="gen"><b>{L_HOUSE_ADMIN_DEFINE_WALL_CELLS}</b></span></td>
							<td align="center"><span class="gen"><b>{L_HOUSE_ADMIN_DEFINE_FW_CELLS}</b></span></td>
							<td align="center"><span class="gen"><b>{L_HOUSE_ADMIN_DEFINE_GARDEN_CELLS}</b></span></td>
						</tr>
						<tr>
							<td align="center">
								<span class="genmed">{FLOOR_CELL_LIST}</span>
							</td>
							<td align="center">
								<span class="genmed">{WALL_CELL_LIST}</span>
							</td>
							<td align="center">
								<span class="genmed">{FW_CELL_LIST}</span>
							</td>
							<td align="center">
								<span class="genmed">{GARDEN_CELL_LIST}</span>
							</td>
						</tr>
					</table>
					<tr>
						<td class="row2" colspan="2" align="center"><span class="genmed">{L_HOUSE_ADMIN_MULTIPLE_SELECTIONS}</span></td>
					</tr>
					<tr>
						<td class="row2" colspan="2" align="center"><span class="genmed"><input type="submit" value="{L_HOUSE_ADMIN_UPDATE_CELLS}" name="action"></span></td>
					</tr>
				</td>
			</tr>
			<tr>
				<td colspan="2" class="row2" align="center" valign="center">
					<span class="genmed">{L_HOUSE_ADMIN_RETURN_MAIN_HOUSE}<br /><input type="submit" value="{L_HOUSE_ADMIN_MAIN}" name="mode"></span>
				</td>
			</tr>
<!-- END furniture_cells -->
<!-- BEGIN house_settings -->
			<tr>
				<td class="row2" colspan="2"><br></td>
			</tr>
			<tr>
				<td colspan="2" align="center" class="row2"><span class="gen"><b>{L_HOUSE_ADMIN_EDIT_HOUSE_CONFIG}</b></span></td>
			</tr>
			<input type="hidden" name="mode" value="{L_HOUSE_ADMIN_HOUSE_SETTINGS}"><input type="hidden" name="action" value="{L_HOUSE_ADMIN_UPDATE}">
			<tr>
				<td class="row2"><span class="gen"><b>{L_HOUSE_ADMIN_ENABLED}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_ENABLED_EXPLAIN}</span></td>
				<td class="row2"><input type=radio name="houseenable" value="1"{ENABLED_ON}> {L_HOUSE_ADMIN_ENABLED} &nbsp <input type=radio name="houseenable" value="0"{ENABLED_OFF}> {L_HOUSE_ADMIN_DISABLED} </td>
			</tr>
			<tr>
				<td class="row2"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_IN_ADR}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_IN_ADR_EXPLAIN}</span></td>
				<td class="row2"><input type=radio name="adr_house_enable" value="1"{ADR_ENABLED_ON}> {L_HOUSE_ADMIN_ENABLED} &nbsp <input type=radio name="adr_house_enable" value="0"{ADR_ENABLED_OFF}> {L_HOUSE_ADMIN_DISABLED} </td>
			</tr>
			<tr>
				<td class="row2" width="55%"><b>{L_HOUSE_ADMIN_HOME_TITLE}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOME_TITLE_EXPLAIN}</td>
				<td class="row2"><input type="text" name="home_title" value="{HOME_TITLE_NAME}" SIZE="45"></td>
			</tr>
			<tr>
				<td class="row2" width="55%"><b>{L_HOUSE_ADMIN_FIRST_SHOP}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_FIRST_SHOP_EXPLAIN}</td>
				<td class="row2"><input type="text" name="shop1" value="{FIRST_SHOP_NAME}" SIZE="20"> {L_HOUSE_ADMIN_SHOPNAME}</td>
			</tr>
			<tr>
				<td class="row2" width="55%"><b>{L_HOUSE_ADMIN_SECOND_SHOP}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_SECOND_SHOP_EXPLAIN}</td>
				<td class="row2"><input type="text" name="shop2" value="{SECOND_SHOP_NAME}" SIZE="20"> {L_HOUSE_ADMIN_SHOPNAME}</td>
			</tr>
			<tr>
				<td class="row2" width="55%"><b>{L_HOUSE_ADMIN_SELL_VALUE}:</b><br />{L_HOUSE_ADMIN_SELL_VALUE_EXPLAIN}</td>
				<td class="row2"><input type="text" name="sellvalue" value="{SELL_VALUE}" SIZE="3">%</td>
			</tr>
			<tr>
				<td class="row2" width="55%"><b>{L_HOUSE_ADMIN_DISPLAY_COLUMN}:</b><br />{L_HOUSE_ADMIN_DISPLAY_COLUMN_EXPLAIN}</td>
				<td class="row2"><input type="text" name="column_display" value="{COLUMN_DISPLAY}" SIZE="3"> {L_HOUSE_ADMIN_COLUMNS}</td>
			</tr>
			<tr>
				<td class="row2" width="55%"><b>{L_HOUSE_ADMIN_DISPLAY_ROW}:</b><br />{L_HOUSE_ADMIN_DISPLAY_ROW_EXPLAIN}</td>
				<td class="row2"><input type="text" name="row_display" value="{ROW_DISPLAY}" SIZE="3"> {L_HOUSE_ADMIN_ROWS}</td>
			</tr>
			<tr>
				<td colspan="2" align="center" class="row2"><input type="submit" value="{L_HOUSE_ADMIN_UPDATE_SETTINGS}"></td>
			</tr>
			<tr>
				<td colspan="2" class="row2" align="center" valign="center">
					<span class="genmed">{L_HOUSE_ADMIN_RETURN_MAIN_HOUSE}<br /><input type="submit" value="{L_HOUSE_ADMIN_MAIN}" name="mode"></span>
				</td>
			</tr>
<!-- END house_settings -->
<!-- BEGIN house_types -->
			<tr>
				<td class="row2" colspan="2"><br></td>
			</tr>
			<tr>
				<td colspan="2" align="center" class="row2"><span class="gen"><b>{L_HOUSE_ADMIN_PAGE_TITLE}</b></span></td>
			</tr>
			<input type="hidden" name="mode" value="{L_HOUSE_ADMIN_TYPES}">
			<tr>
				<td class="row2"><b>{L_HOUSE_ADMIN_EDIT_EXISTING_HOUSE}:</b></td>
				<td class="row2">{HOUSE_TYPE_LIST}<input type="submit" value="{L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON}" name="action"></td>
			</tr>
			<tr>
				<td colspan="2" align="center" class="row2"><span class="gen"><b>{L_HOUSE_ADMIN_ADD_NEW_HOUSE}</b></span></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_ID}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_ID_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housetype" value="{NEW_HOUSE_TYPE_ID}" size="2" MAXLENGTH="2"></td>
			</tr>
			<tr>
				<td class="row2"><span class="gen"><b>{L_HOUSE_ADMIN_SPECIAL_HOUSE}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_SPECIAL_HOUSE_EXPLAIN}</span></td>
				<td class="row2"><input type=radio name="housespecial" value="1"> {L_HOUSE_ADMIN_YES} &nbsp <input type=radio name="housespecial" value="0" CHECKED> {L_HOUSE_ADMIN_NO} </td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_NAME}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_NAME_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housename" value=""></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_FRONT_IMAGE}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_FRONT_IMAGE_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housefront" value=""></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_BACKGROUND_IMAGE}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_BACKGROUND_IMAGE_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housebg" value=""></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_PRIZE}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_PRIZE_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="houseprize" value="" size="16" MAXLENGTH="16"></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_WIDTH}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_WIDTH_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housewidth" value="" size="8" MAXLENGTH="8"></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_CELL_WIDTH}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_CELL_WIDTH_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housecellwidth" value="20" size="8" MAXLENGTH="8"></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_CELL_WIDTH_AMOUNT}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_CELL_WIDTH_AMOUNT_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housecellwidthnumber" value="" size="8" MAXLENGTH="8"></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_HEIGHT}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_HEIGHT_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="househeight" value="" size="8" MAXLENGTH="8"></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_CELL_HEIGHT}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_CELL_HEIGHT_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housecellheight" value="20" size="8" MAXLENGTH="8"></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_CELL_HEIGHT_AMOUNT}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_CELL_HEIGHT_AMOUNT_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housecellheightnumber" value="" size="8" MAXLENGTH="8"></td>
			</tr>
			<tr>
				<td colspan="2" align="center" class="row2"><input type="submit" value="{L_HOUSE_ADMIN_ADD_HOUSE}" name="action"></td>
			</tr>
			<tr>
				<td colspan="2" class="row2" align="center" valign="center">
					<span class="genmed">{L_HOUSE_ADMIN_RETURN_MAIN_HOUSE}<br /><input type="submit" value="{L_HOUSE_ADMIN_MAIN}" name="mode"></span>
				</td>
			</tr>
<!-- END house_types -->
<!-- BEGIN house_edit -->
			<tr>
				<td class="row2" colspan="2"><br /></td>
			</tr>
			<tr>
				<td colspan="2" align="center" class="row2"><span class="gen"><b>{L_HOUSE_ADMIN_EDITING_HOUSE}</b><br /><b>{L_HOUSE_ADMIN_EDITING_HOUSE_EXPLAIN}</td>
			</tr>
			<input type="hidden" name="mode" value="{L_HOUSE_ADMIN_EDIT_HOUSE_BUTTON}"><input type="hidden" name="origname" value="{HOUSE_NAME}"><input type="hidden" name="origtype" value="{HOUSE_TYPE}">
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_ID}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_ID_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housetype" value="{HOUSE_TYPE}" size="2" MAXLENGTH="2"></td>
			</tr>
			<tr>
				<td class="row2"><span class="gen"><b>{L_HOUSE_ADMIN_SPECIAL_HOUSE}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_SPECIAL_HOUSE_EXPLAIN}</span></td>
				<td class="row2"><input type=radio name="housespecial" value="1"{IS_SPECIAL}> {L_HOUSE_ADMIN_YES} &nbsp <input type=radio name="housespecial" value="0"{NOT_SPECIAL}> {L_HOUSE_ADMIN_NO} </td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_NAME}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_NAME_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housename" value="{HOUSE_NAME}"></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_FRONT_IMAGE}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_FRONT_IMAGE_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housefront" value="{HOUSE_FRONT}"></td>
			</tr>
			<tr>
				<td colspan="2" align="center" class="row2"><span class="gen"><img src="../images/house/{HOUSE_FRONT}" border="0" title="{L_HOUSE_ADMIN_CURRENT_HOUSE_FRONT}" alt="{L_HOUSE_ADMIN_CURRENT_HOUSE_FRONT}"></span></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_BACKGROUND_IMAGE}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_FRONT_IMAGE_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housebg" value="{HOUSE_BG}"></td>
			</tr>
			<tr>
				<td colspan="2" align="center" class="row2"><span class="gen"><img src="../images/house/{HOUSE_BG}" border="0" title="{L_HOUSE_ADMIN_CURRENT_HOUSE_BG}" alt="{L_HOUSE_ADMIN_CURRENT_HOUSE_BG}"></span></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_PRIZE}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_PRIZE_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="houseprize" value="{HOUSE_PRIZE}" size="16" MAXLENGTH="16"></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_WIDTH}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_WIDTH_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housewidth" value="{HOUSE_WIDTH}" size="8" MAXLENGTH="8"></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_CELL_WIDTH}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_CELL_WIDTH_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housecellwidth" value="{HOUSE_CELL_WIDTH}" size="8" MAXLENGTH="8"></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_CELL_WIDTH_AMOUNT}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_CELL_WIDTH_AMOUNT_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housecellwidthnumber" value="{HOUSE_CELL_WIDTH_AMOUNT}" size="8" MAXLENGTH="8"></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_HEIGHT}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_HEIGHT_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="househeight" value="{HOUSE_HEIGHT}" size="8" MAXLENGTH="8"></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_CELL_HEIGHT}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_CELL_HEIGHT_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housecellheight" value="{HOUSE_CELL_HEIGHT}" size="8" MAXLENGTH="8"></td>
			</tr>
			<tr>
				<td class="row2" width="45%"><span class="gen"><b>{L_HOUSE_ADMIN_HOUSE_CELL_HEIGHT_AMOUNT}:</b><br /></span><span class="gensmall">{L_HOUSE_ADMIN_HOUSE_CELL_HEIGHT_AMOUNT_EXPLAIN}</span></td>
				<td class="row2"><input type="text" name="housecellheightnumber" value="{HOUSE_CELL_HEIGHT_AMOUNT}" size="8" MAXLENGTH="8"></td>
			</tr>
				<td colspan="2" align="center" class="row2"><input type="submit" value="{L_HOUSE_ADMIN_UPDATE_HOUSE}" name="action"></td>
			</tr>
			<tr>
				<td colspan="2" align="center" class="row2">{L_HOUSE_ADMIN_UPDATE_HOUSE_EXPLAIN}<p><input type="submit" value="{L_HOUSE_ADMIN_DELETE_HOUSE}" name="action" style="color:white;background-color:red;"></td>
			</tr>
			<tr>
				<td colspan="2" class="row2" align="center" valign="center">
					<span class="genmed">{L_HOUSE_ADMIN_RETURN_MAIN_HOUSE}<br /><input type="submit" value="{L_HOUSE_ADMIN_MAIN}" name="mode"></span>
				</td>
			</tr>
<!-- END house_edit -->
	{STATCONFIGINFO}
		</tr>
	</table>
</form>
<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr>
		<td align="center"><span class="genmed">House Mod written by: Sgt Detrius</span></td>
	</tr>
	<tr>
		<td align="center"><span class="genmed">ADR adaptation by: <a href="http://www.OzziesWorld.com/" target="_blank">Ozzie</a></span></td>
	</tr>
</table>
<br	clear="all" />
