<form name="form1" method="post" action="">
<!-- BEGIN switch_character_cards -->
<table width="100%"  border="1">
  <tr>
    <th width="27%" scope="col">{CD_CARD_HP}</th>
    <th width="73%" align="left" scope="col"><input name="card_hp" type="text" id="card_hp" size="40" maxlength="250"></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_MP}</th>
    <th align="left" scope="col"><input name="card_mp" type="text" id="card_mp" size="40"></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_ATTACK}</th>
    <th align="left" scope="col"><input name="card_attack" type="text" id="card_attack" size="40"></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_DEFENSE}</th>
    <th align="left" scope="col"><input name="card_defense" type="text" id="card_defense" size="40"></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_MAGIC_ATTACK}</th>
    <th align="left" scope="col"><input name="card_magic_attack" type="text" id="card_magic_attack" size="40"></th>
  </tr>
  <tr>
    <th scope="col">{CD_CARD_MAGIC_DEFENSE}</th>
    <th align="left" scope="col"><input name="card_magic_defense" type="text" id="card_magic_defense" size="40"></th>
  </tr>
</table>
<!-- END switch_character_cards -->
<!-- BEGIN switch_item_cards -->
<table width="100%"  border="1">
  <tr>
    <th width="26%" scope="col">{CD_ITEM_HP}</th>
    <th width="74%" scope="col">
      <div align="left">
        <input name="item_hp" type="text" id="item_hp" size="40">
      </div></th>
  </tr>
  <tr>
    <th scope="col">{CD_ITEM_MP}</th>
    <th scope="col">
      <div align="left">
        <input name="item_mp" type="text" id="item_mp3" size="40">  
        </div></th>
  </tr>
  <tr>
    <th scope="col">{CD_ITEM_ATTACK}</th>
    <th scope="col">
      <div align="left">
        <input name="item_attack" type="text" id="item_attack3" size="40">      
        </div></th>
  </tr>
  <tr>
    <th scope="col">{CD_ITEM_DEFENSE}</th>
    <th scope="col">
      <div align="left">
        <input name="item_defense" type="text" id="item_defense3" size="40">      
        </div></th>
  </tr>
  <tr>
    <th scope="col">{CD_ITEM_MAGIC_ATTACK}</th>
    <th scope="col">
      <div align="left">
        <input name="item_magic_attack" type="text" id="item_magic_attack3" size="40">      
        </div></th>
  </tr>
  <tr>
    <th scope="col">{CD_ITEM_MAGIC_DEFENSE}</th>
    <th scope="col">
      <div align="left">
        <input name="item_magic_defense" type="text" id="item_magic_defense3" size="40">
</div></th>
  </tr>
</table>
<!-- END switch_item_cards -->
<input name="card_name" type="hidden" id="card_name" value="{CD_CARD_NAMES}">
<input name="card_image_path" type="hidden" id="card_image_path" value="{CD_CARD_IMAGES}">
<input name="card_price" type="hidden" id="card_price" value="{CD_CARD_PRICES}">
<input name="card_req_level" type="hidden" id="card_req_level" value="{CD_CARD_REQ_LEVELS}">
<input name="card_type" type="hidden" id="card_type" value="{CD_CARD_TYPES}">
<input name="card_turn_length" type="hidden" id="card_turn_length" value="{CD_CARD_TURN_LENGTHS}">
<input name="mp_cost" type="hidden" id="mp_cost" value="{CD_CARD_MP_COSTS}">
<input name="card_element" type="hidden" id="card_element" value="{CD_CARD_ELEMENTS}">
<input name="card_shop" type="hidden" id="card_shop" value="{CD_SHOPS}">
<br>
<center>
<!-- BEGIN switch_add_card -->
  <input name="submit" type="submit" id="add2" value="{CD_ADD_CARD}">
<!-- END switch_add_card -->
</center>
</form>
