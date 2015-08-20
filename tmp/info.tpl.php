<?php
  $data = new data();
  $id = ($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user_id'];
  $result = $data->showInfoVnz($id);
?>
<table width="80%" class="pure-table">
<!-- 	<thead>
	<tr><th>ID</th><th>ZID</th><th>Назва</th><th>Скорочена назва</th><th>Підпорядкування</th>
	<th>Адреса</th><th>Тип закладу</th><th>Форма власності</th><th>Факс</th>
	<th>E-mail</th><th>Сайт</th></tr>
	</thead> -->
	<tbody>
	<!-- <?php echo $data->showInfo($id); ?>  -->
	<tr><th colspan="2">Назва</th><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="4">&nbsp;<?=$result->fullName;?></td></tr>
	<tr><th colspan="2">Скорочена назва</th><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="4">&nbsp;<?=$result->shortName;?></td></tr>
	<tr><th colspan="2">Підпорядкування</th><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="4">&nbsp;<?=$result->pidporName;?></td></tr>
	<tr><th colspan="2">Адреса</th><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="4">&nbsp;<?=$result->address;?></td></tr>
	<tr><th colspan="2">Тип закладу</th><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="4">&nbsp;<?=$result->zType;?></td></tr>
	<tr><th>Форма власності</th><td></td><th>Факс</th><td></td></tr>
	<tr><td colspan="2">&nbsp;<?=$result->vlasnist;?></td><td colspan="2">&nbsp;<?=$result->fax;?></td></tr>
	<tr><th>E-mail</th><td></td><th>Сайт</th><td></td></tr>
	<tr><td colspan="2">&nbsp;<?=$result->email;?></td><td colspan="2">&nbsp;<?=$result->webSite;?></td></tr>
	</tbody>
</table>

<h3>Керівник закладу</h3>
<table width="80%" class="pure-table">
	<tbody>
	<tr><th colspan="4">ПІБ</th></tr>
	<tr><td colspan="4">&nbsp;<?=$result->n1name;?></td></tr>
	<tr><th colspan="4">Посада</th></tr>
	<tr><td colspan="4">&nbsp;<?=$result->posada1;?></td></tr>
	<tr><th colspan="2">Тел.</th><th colspan="2">Моб.</th></tr>
	<tr><td colspan="2">&nbsp;<?=$result->n1phone;?></td><td colspan="2">&nbsp;<?=$result->n1mobile;?></td></tr>
	<tr><th colspan="2">E-mail</th><th colspan="2">Skype</th></tr>
	<tr><td colspan="2">&nbsp;<?=$result->n1email;?></td><td colspan="2">&nbsp;<?=$result->n1skype;?></td></tr>
	</tbody>
</table>

<h3>Заступник керівника закладу</h3>
<table width="80%" class="pure-table">
	<tbody>
	<tr><th colspan="4">ПІБ</th></tr>
	<tr><td colspan="4">&nbsp;<?=$result->n2name;?></td></tr>
	<tr><th colspan="4">Посада</th></tr>
	<tr><td colspan="4">&nbsp;<?=$result->posada2;?></td></tr>
	<tr><th colspan="2">Тел.</th><th colspan="2">Моб.</th></tr>
	<tr><td colspan="2">&nbsp;<?=$result->n2phone;?></td><td colspan="2">&nbsp;<?=$result->n2mobile;?></td></tr>
	<tr><th colspan="2">E-mail</th><th colspan="2">Skype</th></tr>
	<tr><td colspan="2">&nbsp;<?=$result->n2email;?></td><td colspan="2">&nbsp;<?=$result->n2skype;?></td></tr>
	</tbody>
</table>

<h3>Заступник керівника закладу</h3>
<table width="80%" class="pure-table">
	<tbody>
	<tr><th colspan="4">ПІБ</th></tr>
	<tr><td colspan="4">&nbsp;<?=$result->n3name;?></td></tr>
	<tr><th colspan="4">Посада</th></tr>
	<tr><td colspan="4">&nbsp;<?=$result->posada3;?></td></tr>
	<tr><th colspan="2">Тел.</th><th colspan="2">Моб.</th></tr>
	<tr><td colspan="2">&nbsp;<?=$result->n3phone;?></td><td colspan="2">&nbsp;<?=$result->n3mobile;?></td></tr>
	<tr><th colspan="2">E-mail</th><th colspan="2">Skype</th></tr>
	<tr><td colspan="2">&nbsp;<?=$result->n3email;?></td><td colspan="2">&nbsp;<?=$result->n3skype;?></td></tr>
	</tbody>
</table>
<br>
<table width="80%" class="pure-table">
	<tbody>
	<tr><th>К-сть комп'ютерних класів (аудиторій)</th><td>&nbsp;<?=$result->pcRoomsZ;?></td><th>В них комп'ютерів</th>
		<td>&nbsp;<?=$result->pcCountZ;?></td><th>З них підключено до інтернету</th><td>&nbsp;<?=$result->pcWithInetZ;?></td>
	</tr>
	<tr><td colspan="6"><b>*</b> <sub>Кількість комп'ютерів у різних класах(аудиторіях) розділити комою.</sub><br>
	<sub>Наприклад: К-сть комп'ютерних класів (аудиторій) - 2; В них комп'ютерів - 8<b>,</b> 12; З них підключено до інтернету - 0<b>,</b> 12.</sub>
	</td></tr>
	</tbody>
</table>
<br>
<table width="80%" class="pure-table">
	<tbody>
	<tr><th>Предмети, які у закладі вивчають поглиблено:</th></tr>
	<tr><td>&nbsp;<?=$result->profSubjects;?></td></tr>
	</tbody>
</table>
<h3>Кількість учнів та іноземні мови, які вони вивчають; кількість учнів які потребують сурдоперекладача</h3>
<table class="pure-table">
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
    <td>&nbsp;<?=$result->atestat4;?></td>
    <td>&nbsp;<?=$result->dpa4;?></td>
    <td>&nbsp;<?=$result->all4;?></td>
    <td>&nbsp;<?=$result->eng4;?></td>
    <td>&nbsp;<?=$result->ger4;?></td>
    <td>&nbsp;<?=$result->frn4;?></td>
    <td>&nbsp;<?=$result->isp4;?></td>
    <td>&nbsp;<?=$result->syrdo4;?></td>
  </tr>
  <tr>
    <td>III курс</td>
    <td>&nbsp;<?=$result->atestat3;?></td>
    <td>&nbsp;<?=$result->dpa3;?></td>
    <td>&nbsp;<?=$result->all3;?></td>
    <td>&nbsp;<?=$result->eng3;?></td>
    <td>&nbsp;<?=$result->ger3;?></td>
    <td>&nbsp;<?=$result->frn3;?></td>
    <td>&nbsp;<?=$result->isp3;?></td>
    <td>&nbsp;<?=$result->syrdo3;?></td>
  </tr>
  <tr>
    <td>II курс</td>
    <td>&nbsp;<?=$result->atestat2;?></td>
    <td>&nbsp;<?=$result->dpa2;?></td>
    <td>&nbsp;<?=$result->all2;?></td>
    <td>&nbsp;<?=$result->eng2;?></td>
    <td>&nbsp;<?=$result->ger2;?></td>
    <td>&nbsp;<?=$result->frn2;?></td>
    <td>&nbsp;<?=$result->isp2;?></td>
    <td>&nbsp;<?=$result->syrdo2;?></td>
  </tr>
  <tr>
    <td>I курс</td>
    <td>&nbsp;<?=$result->atestat1;?></td>
    <td>&nbsp;<?=$result->dpa1;?></td>
    <td>&nbsp;<?=$result->all1;?></td>
    <td>&nbsp;<?=$result->eng1;?></td>
    <td>&nbsp;<?=$result->ger1;?></td>
    <td>&nbsp;<?=$result->frn1;?></td>
    <td>&nbsp;<?=$result->isp1;?></td>
    <td>&nbsp;<?=$result->syrdo1;?></td>
  </tr>
</table>
<br>