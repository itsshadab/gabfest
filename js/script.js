function readURL(input, query) {
	var files = !!input.files ? input.files : [];
	if (!files.length || !window.FileReader) return;
	if (/^image/.test( files[0].type)) {
		var reader = new FileReader();
		reader.readAsDataURL(files[0]);
		reader.onloadend = function(){  
			$(query).css("background-image", "url("+this.result+")");
		}
	}
}
function removeDP() {
	$("#changePhotoModal .user-pic").css("background-image", "url('actions/uploads/temp.png')");
}