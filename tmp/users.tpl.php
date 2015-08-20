<?php
  $data = new data();
?>
<table width="80%" class="pure-table">
	<thead>
	<tr><th>ID</th><th>E-mail</th><th>Країна</th><th>Вік</th><th>Дата реєстрації</th></tr>
	</thead>
	<tbody>
	<?php echo $data->showUsers(); ?> 
	</tbody>
</table>