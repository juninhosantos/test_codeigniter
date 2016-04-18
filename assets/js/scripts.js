$(document).on('change', '.btn-file :file', function() {
	var input = $(this),
	numFiles = input.get(0).files ? input.get(0).files.length : 1,
	label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	input.trigger('fileselect', [numFiles, label]);
});

jQuery(document).ready(function($) {
	
	$(".delete").on("click",function(){
		var con = confirm("Deseja realmente deletar este registro?");

		if(con) {
			return true;
		}

		return false;
	});

	$('.btn-file :file').on('fileselect', function(event, numFiles, label) {

		var input = $(this).parents('.input-group').find(':text'),
		log = numFiles > 1 ? numFiles + ' files selected' : label;

		input.val(log);

	});

	$('input[name=data]').mask('99/99/9999 99:99');

});

