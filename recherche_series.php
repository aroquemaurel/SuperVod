<?php
	include_once('header.php');
	require_once('connect.php');
	
	require_once('db_series.php');	
?>

<form type="get" action="result_recherche_series.php">
	<table class="form">
	<tr>
		<td>
			<label>Type</label>
		</td>
		<td>	<!-- TODO chercher les différents types -->
		<input type="radio" name="type" value="NULL" checked="checked" /> Indiférrent
			<input type="radio" name="type" value="A" /> Animé
			<input type="radio" name="type" value="P" /> Policier
			<input type="radio" name="type" value="F"/> Fiction
		</td>
	</tr>
	<tr>
		<td>Nom</td>
		<td><input type="text" name="titre" /> </td>
	</tr>
	<tr>
		<td>Année</td>
		<td>
		<select name="annee">
		<option>&nbsp;</option>

		<?php
			foreach(getAllAnneesDiffusion() as $annee) {
				echo '<option value="'.$annee->annee.'">'.$annee->annee.'</option>';
			}
		?>
		</select>
	</tr>
	</table>
	<input type="submit" value="Envoyer" />
	<input type="reset" value="Reset" />
</form>
