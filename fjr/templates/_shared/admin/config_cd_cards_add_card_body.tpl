<form name="form1" method="post" action="">
<table width="100%"  border="1">
  <tr>
    <th width="16%" scope="col">{CD_CARD_NAME}</th>
    <th width="84%" align="left" scope="col"><input name="card_name" type="text" id="card_name" value="{CD_CARD_NAMES}" size="40" maxlength="250"></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_IMAGE}</th>
    <th align="left" scope="col"><input name="card_image_path" type="text" id="card_image_path" value="{CD_CARD_IMAGES}" size="40" maxlength="250"></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_PRICE}</th>
    <th align="left" scope="col"><input name="card_price" type="text" id="card_price" value="{CD_CARD_PRICES}" size="40" maxlength="250"></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_REQ_LEVEL}</th>
    <th align="left" scope="col"><input name="card_req_level" type="text" id="card_req_level" value="{CD_CARD_REQ_LEVELS}" size="40" maxlength="250"></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_MP_COST}</th>
    <th align="left" scope="col"><input name="mp_cost" type="text" id="mp_cost" value="{CD_CARD_MP_COSTS}" size="40" maxlength="250"></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_TYPE}</th>
    <th align="left" valign="top" scope="col"><select name="card_type" id="select2">
	<!-- BEGIN card_types -->
      <option value="{card_types.CD_CARD_TYPES}">{card_types.CD_CARD_TYPES}</option>
	<!-- END card_types -->
    </select></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_TURN_LENGTH}</th>
    <th align="left" scope="col"><input name="card_turn_length" type="text" id="card_effect_length2" value="{CD_CARD_TURN_LENGTHS}" size="40" maxlength="250"></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_ELEMENT}</th>
    <th align="left" scope="col"><select name="card_element" id="select8">
	<!-- BEGIN elements -->
      <option value="{elements.CD_CARD_ELEMENTS}">{elements.CD_CARD_ELEMENTS}</option>
	<!-- END elements -->
        </select></th>
  </tr>
  <tr>
    <th scope="col">{CD_SHOP}</th>
    <th align="left" scope="col"><select name="card_shop" id="card_shop">
	<!-- BEGIN shop_cats -->
      <option value="{shop_cats.CD_SHOPS}">{shop_cats.CD_SHOPS}</option>
	<!-- END shop_cats -->
    </select></th>
  </tr>
</table>
<!-- BEGIN switch_edit_char -->
<table width="100%"  border="1">
  <tr>
    <th width="27%" scope="col">{CD_CARD_HP}</th>
    <th width="73%" align="left" scope="col"><input name="card_hp" type="text" id="card_hp" value="{CD_CARD_HPS}" size="40" maxlength="250"></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_MP}</th>
    <th align="left" scope="col"><input name="card_mp" type="text" id="card_mp" value="{CD_CARD_MPS}" size="40"></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_ATTACK}</th>
    <th align="left" scope="col"><input name="card_attack" type="text" id="card_attack" value="{CD_CARD_ATTACKS}" size="40"></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_DEFENSE}</th>
    <th align="left" scope="col"><input name="card_defense" type="text" id="card_defense" value="{CD_CARD_DEFENSES}" size="40"></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_MAGIC_ATTACK}</th>
    <th align="left" scope="col"><input name="card_magic_attack" type="text" id="card_magic_attack" value="{CD_CARD_MAGIC_ATTACKS}" size="40"></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_MAGIC_DEFENSE}</th>
    <th align="left" scope="col"><input name="card_magic_defense" type="text" id="card_magic_defense" value="{CD_CARD_MAGIC_DEFENSES}" size="40"></th>
  </tr>
</table>
<!-- END switch_edit_char -->

<!-- BEGIN switch_edit_item -->
<table width="100%"  border="1">
  <tr>
    <th width="26%" scope="col">{CD_ITEM_HP}</th>
    <th width="74%" scope="col">
      <div align="left">
        <input name="item_hp" type="text" id="item_hp" value="{CD_ITEM_HPS}" size="40">
      </div></th>
  </tr>
  <tr>
    <th scope="col">{CD_ITEM_MP}</th>
    <th scope="col">
      <div align="left">
        <input name="item_mp" type="text" id="item_mp3" value="{CD_ITEM_MPS}" size="40">  
        </div></th>
  </tr>
  <tr>
    <th scope="col">{CD_ITEM_ATTACK}</th>
    <th scope="col">
      <div align="left">
        <input name="item_attack" type="text" id="item_attack3" value="{CD_ITEM_ATTACKS}" size="40">      
        </div></th>
  </tr>
  <tr>
    <th scope="col">{CD_ITEM_DEFENSE}</th>
    <th scope="col">
      <div align="left">
        <input name="item_defense" type="text" id="item_defense3" value="{CD_ITEM_DEFENSES}" size="40">      
        </div></th>
  </tr>
  <tr>
    <th scope="col">{CD_ITEM_MAGIC_ATTACK}</th>
    <th scope="col">
      <div align="left">
        <input name="item_magic_attack" type="text" id="item_magic_attack3" value="{CD_ITEM_MAGIC_ATTACKS}" size="40">      
        </div></th>
  </tr>
  <tr>
    <th scope="col">{CD_ITEM_MAGIC_DEFENSE}</th>
    <th scope="col">
      <div align="left">
        <input name="item_magic_defense" type="text" id="item_magic_defense3" value="{CD_ITEM_MAGIC_DEFENSES}" size="40">
</div></th>
  </tr>
</table>
<!-- END switch_edit_item -->

<div align="center"></div>
<br>
<center>
<!-- BEGIN switch_add_card -->
    <input name="add2" type="submit" id="card" value="{CD_ADD_CARD}">
<!-- END switch_add_card -->

<!-- BEGIN switch_edit_card -->
    <input name="edit" type="submit" id="card" value="{CD_EDIT_CARD}">
<!-- END switch_edit_card -->

</center>
</form>
