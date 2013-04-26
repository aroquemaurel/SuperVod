// quand on change l'état de la checkbox, si elle devient cochée
// On met le input en read/write, sinon on grise 
// Pour la location mais le principe est le même pour les autres
$("#typeLocation").on("change", function() {
	if($('#typeLocation').is(':checked')) {
		$('#prixLocation').removeAttr('readonly')
	} else {
		$('#prixLocation').attr('readonly', 'readonly')
	}
});
