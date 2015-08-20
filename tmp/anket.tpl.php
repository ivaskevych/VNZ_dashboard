<?php
 $data = new data();
 $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
 $result = $data->showAnket($id);
?>
<form method="post" class="pure-form">
<legend>Інформація про заклад</legend>
<table class="pure-table pure-table-bordered">
  <tr>
    <td colspan="2"><label for="fullName">Назва:</label></th>
    <td colspan="2">&nbsp;</th>
  </tr>
  <tr>
    <td colspan="4"><input class="pure-input-1" id="fullName" name="fullName" type="text" placeholder="" value="<?=$result->fullName;?>"></td>
  </tr>
  <tr>
    <td colspan="2"><label for="shortName">Скорочена назва:</label></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><input class="pure-input-1" id="shortName" name="shortName" type="text" value="<?=$result->shortName;?>"></td>
  </tr>
  <tr>
    <td colspan="2"><label for="pidporName">Підпорядкування:</label></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">
    	<select id="pidporName" name="pidporName" class="pure-input-1">
                    <!-- <? if ($result->pidporName=='1') { echo ' selected'; } ?> -->
                    <option value="Управління освіти і науки Волинської обласної державної адміністрації">Управління освіти і науки Волинської обласної державної адміністрації</option>
                    <option value="Департамент освіти і науки Львівської облдержадміністрації">Департамент освіти і науки Львівської облдержадміністрації</option>
                    <option value="Управління освіти і науки Рівненської облдержадміністрації">Управління освіти і науки Рівненської облдержадміністрації</option>
                    <option value="Відділ освіти Костопільської районної державної адміністрації">Відділ освіти Костопільської районної державної адміністрації</option>
                    <option value="Відділ освіти Галицького району управління освіти департаменту гуманітарної політики Львівської міської ради">Відділ освіти Галицького району управління освіти департаменту гуманітарної політики Львівської міської ради</option>
        </select>
    </td>
  </tr>
  <tr>
    <td colspan="2"><label for="address">Адреса:</label></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><input class="pure-input-1" id="address" name="address" type="text" value="<?=$result->address;?>">
</td>
  </tr>
  <tr>
    <td colspan="2"><label for="zType">Тип закладу:</label></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><input class="pure-input-1" id="zType" name="zType" type="text" value="<?=$result->zType;?>">
</td>
  </tr>
  <tr>
    <td colspan="2"><label for="vlasnist">Форма власності:</label></td>
    <td colspan="2"><label for="fax">Факс:</label>  
</td>
  </tr>
  <tr>
    <td colspan="2"><input size="50%" id="vlasnist" name="vlasnist" type="text" value="<?=$result->vlasnist;?>">
</td>
    <td colspan="2"><input size="50%" id="fax" name="fax" type="text" value="<?=$result->fax;?>"></td>
  </tr>
  <tr>
    <td colspan="2"><label for="email">E-mail:</label> </td>
    <td colspan="2"><label for="webSite">Сайт:</label></td>
  </tr>
  <tr>
    <td colspan="2"><input size="50%" id="email" name="email" type="email" value="<?=$result->email;?>">
</td>
    <td colspan="2"><input size="50%" id="webSite" name="webSite" type="text" value="<?=$result->webSite;?>"></td>
    <input type="hidden" name="id" value="<?php echo $id;?>">
  </tr>
</table>

<legend>Керівник закладу</legend>

<table class="pure-table pure-table-bordered">
  <tr>
    <td colspan="2"><label for="n1name">ПІБ:</label></th>
    <td colspan="2">&nbsp;</th>
  </tr>
  <tr>
    <td colspan="4"><input class="pure-input-1" id="n1name" name="n1name" type="text" placeholder="" value="<?=$result->n1name;?>"></td>
  </tr>
  <tr>
    <td colspan="2"><label for="posada1">Посада:</label></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><input class="pure-input-1" id="posada1" name="posada1" type="text" value="<?=$result->posada1;?>"></td>
  </tr>
  <tr>
    <td colspan="2"><label for="n1phone">Тел:</label></td>
    <td colspan="2"><label for="n1mobile">Моб:</label>  
</td>
  </tr>
  <tr>
    <td colspan="2"><input size="50%" id="n1phone" name="n1phone" type="text" value="<?=$result->n1phone;?>">
</td>
    <td colspan="2"><input size="50%" id="n1mobile" name="n1mobile" type="text" value="<?=$result->n1mobile;?>"></td>
  </tr>
  <tr>
    <td colspan="2"><label for="n1email">E-mail:</label></td>
    <td colspan="2"><label for="n1skype">Skype:</label></td>
  </tr>
  <tr>
    <td colspan="2"><input size="50%" id="n1email" name="n1email" type="email" value="<?=$result->n1email;?>">
</td>
    <td colspan="2"><input size="50%" id="n1skype" name="n1skype" type="text" value="<?=$result->n1skype;?>"></td>
  </tr>
</table>

<legend>Заступник керівника закладу</legend>

<table class="pure-table pure-table-bordered">
  <tr>
    <td colspan="2"><label for="n2name">ПІБ:</label></th>
    <td colspan="2">&nbsp;</th>
  </tr>
  <tr>
    <td colspan="4"><input class="pure-input-1" id="n2name" name="n2name" type="text" placeholder="" value="<?=$result->n2name;?>"></td>
  </tr>
  <tr>
    <td colspan="2"><label for="posada2">Посада:</label></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><input class="pure-input-1" id="posada2" name="posada2" type="text" value="<?=$result->posada2;?>"></td>
  </tr>
  <tr>
    <td colspan="2"><label for="n2phone">Тел:</label></td>
    <td colspan="2"><label for="n2mobile">Моб:</label>  
</td>
  </tr>
  <tr>
    <td colspan="2"><input size="50%" id="n2phone" name="n2phone" type="text" value="<?=$result->n2phone;?>">
</td>
    <td colspan="2"><input size="50%" id="n2mobile" name="n2mobile" type="text" value="<?=$result->n2mobile;?>"></td>
  </tr>
  <tr>
    <td colspan="2"><label for="n2email">E-mail:</label></td>
    <td colspan="2"><label for="n2skype">Skype:</label></td>
  </tr>
  <tr>
    <td colspan="2"><input size="50%" id="n2email" name="n2email" type="email" value="<?=$result->n2email;?>">
</td>
    <td colspan="2"><input size="50%" id="n2skype" name="n2skype" type="text" value="<?=$result->n2skype;?>"></td>
  </tr>
</table>

<legend>Заступник керівника закладу</legend>

<table class="pure-table pure-table-bordered">
  <tr>
    <td colspan="2"><label for="n3name">ПІБ:</label></th>
    <td colspan="2">&nbsp;</th>
  </tr>
  <tr>
    <td colspan="4"><input class="pure-input-1" id="n3name" name="n3name" type="text" placeholder="" value="<?=$result->n3name;?>"></td>
  </tr>
  <tr>
    <td colspan="2"><label for="posada3">Посада:</label></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><input class="pure-input-1" id="posada3" name="posada3" type="text" value="<?=$result->posada3;?>"></td>
  </tr>
  <tr>
    <td colspan="2"><label for="n3phone">Тел:</label></td>
    <td colspan="2"><label for="n3mobile">Моб:</label>  
</td>
  </tr>
  <tr>
    <td colspan="2"><input size="50%" id="n3phone" name="n3phone" type="text" value="<?=$result->n3phone;?>">
</td>
    <td colspan="2"><input size="50%" id="n3mobile" name="n3mobile" type="text" value="<?=$result->n3mobile;?>"></td>
  </tr>
  <tr>
    <td colspan="2"><label for="n3email">E-mail:</label></td>
    <td colspan="2"><label for="n3skype">Skype:</label></td>
  </tr>
  <tr>
    <td colspan="2"><input size="50%" id="n3email" name="n3email" type="email" value="<?=$result->n3email;?>">
</td>
    <td colspan="2"><input size="50%" id="n3skype" name="n3skype" type="text" value="<?=$result->n3skype;?>"></td>
  </tr>
</table>
<br>
<table class="pure-table pure-table-bordered">
  <tbody>
  <tr><th><label for="pcRoomsZ">К-сть комп'ютерних класів (аудиторій)</label></th>
      <td><input size="5%" id="pcRoomsZ" name="pcRoomsZ" type="text" value="<?=$result->pcRoomsZ;?>"></td>
      <th><label for="pcCountZ">В них комп'ютерів</label></th>
      <td><input size="10%" id="pcCountZ" name="pcCountZ" type="text" value="<?=$result->pcCountZ;?>"></td>
      <th><label for="pcWithInetZ">З них підключено до інтернету</label></th>
      <td><input size="10%" id="pcWithInetZ" name="pcWithInetZ" type="text" value="<?=$result->pcWithInetZ;?>"></td>
  </tr>
  <tr><td colspan="6"><b>*</b> <sub>Кількість комп'ютерів у різних класах(аудиторіях) розділити комою.</sub><br>
  <sub><b>Наприклад:</b> К-сть комп'ютерних класів (аудиторій) - 2; В них комп'ютерів - 8<b>,</b> 12; З них підключено до інтернету - 0<b>,</b> 12.</sub>
  </td></tr>
  </tbody>
</table>

<legend><label for="profSubjects">Предмети, які у закладі вивчають поглиблено:</label></legend>
<input class="pure-input-1-2" id="profSubjects" name="profSubjects" type="text" value="<?=$result->profSubjects;?>">

<legend>Кількість учнів та іноземні мови, які вони вивчають; кількість учнів які потребують сурдоперекладача</legend>
<table class="pure-table pure-table-bordered cources">
  <tr>
    <th rowspan="2" style="text-align: center;">ВНЗ</th>
    <th rowspan="2" style="text-align: center;">К-сть випускників<br> котрі мають атестат</th>
    <th rowspan="2" style="text-align: center;">Здаватимуть ДПА<br> у 2016 році</th>
    <th rowspan="2" style="text-align: center;">К-сть учнів<br> у паралелі</th>
    <th colspan="4" style="text-align: center;">Вивчають іноземну</th>
    <th rowspan="2" style="text-align: center;">Учнів із<br> вадами слуху</th>
  </tr>
  <tr>
    <td>англійську</td>
    <td>німецьку</td>
    <td>французьку</td>
    <td>іспанську</td>
  </tr>
  <tr>
    <td>IV курс</td>
    <td><input id="atestat4" name="atestat4" type="text" value="<?=$result->atestat4;?>"></td>
    <td><input id="dpa4" name="dpa4" type="text" value="<?=$result->dpa4;?>"></td>
    <td><input id="all4" name="all4" type="text" value="<?=$result->all4;?>"></td>
    <td><input id="eng4" name="eng4" type="text" value="<?=$result->eng4;?>"></td>
    <td><input id="ger4" name="ger4" type="text" value="<?=$result->ger4;?>"></td>
    <td><input id="frn4" name="frn4" type="text" value="<?=$result->frn4;?>"></td>
    <td><input id="isp4" name="isp4" type="text" value="<?=$result->isp4;?>"></td>
    <td><input id="syrdo4" name="syrdo4" type="text" value="<?=$result->syrdo4;?>"></td>
  </tr>
  <tr>
    <td>III курс</td>
    <td><input id="atestat3" name="atestat3" type="text" value="<?=$result->atestat3;?>"></td>
    <td><input id="dpa3" name="dpa3" type="text" value="<?=$result->dpa3;?>"></td>
    <td><input id="all3" name="all3" type="text" value="<?=$result->all3;?>"></td>
    <td><input id="eng3" name="eng3" type="text" value="<?=$result->eng3;?>"></td>
    <td><input id="ger3" name="ger3" type="text" value="<?=$result->ger3;?>"></td>
    <td><input id="frn3" name="frn3" type="text" value="<?=$result->frn3;?>"></td>
    <td><input id="isp3" name="isp3" type="text" value="<?=$result->isp3;?>"></td>
    <td><input id="syrdo3" name="syrdo3" type="text" value="<?=$result->syrdo3;?>"></td>
  </tr>
  <tr>
    <td>II курс</td>
    <td><input id="atestat2" name="atestat2" type="text" value="<?=$result->atestat2;?>"></td>
    <td><input id="dpa2" name="dpa2" type="text" value="<?=$result->dpa2;?>"></td>
    <td><input id="all2" name="all2" type="text" value="<?=$result->all2;?>"></td>
    <td><input id="eng2" name="eng2" type="text" value="<?=$result->eng2;?>"></td>
    <td><input id="ger2" name="ger2" type="text" value="<?=$result->ger2;?>"></td>
    <td><input id="frn2" name="frn2" type="text" value="<?=$result->frn2;?>"></td>
    <td><input id="isp2" name="isp2" type="text" value="<?=$result->isp2;?>"></td>
    <td><input id="syrdo2" name="syrdo2" type="text" value="<?=$result->syrdo2;?>"></td>
  </tr>
  <tr>
    <td>I курс</td>
    <td><input id="atestat1" name="atestat1" type="text" value="<?=$result->atestat1;?>"></td>
    <td><input id="dpa1" name="dpa1" type="text" value="<?=$result->dpa1;?>"></td>
    <td><input id="all1" name="all1" type="text" value="<?=$result->all1;?>"></td>
    <td><input id="eng1" name="eng1" type="text" value="<?=$result->eng1;?>"></td>
    <td><input id="ger1" name="ger1" type="text" value="<?=$result->ger1;?>"></td>
    <td><input id="frn1" name="frn1" type="text" value="<?=$result->frn1;?>"></td>
    <td><input id="isp1" name="isp1" type="text" value="<?=$result->isp1;?>"></td>
    <td><input id="syrdo1" name="syrdo1" type="text" value="<?=$result->syrdo1;?>"></td>
  </tr>
</table>
<br>
 <button type="submit" class="pure-button pure-button-primary" name="anket">Зберегти зміни</button>
</form>

