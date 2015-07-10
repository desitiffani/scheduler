/*delete confirmation*/
function confirm_delete() {
	if(confirm("Apakah anda yakin akan menghapus data ini?") == false) {
		return false;
	}
}

/*approve confirmation*/
function confirm_approve() {
	if(confirm("Apakah anda yakin akan menerima janji ini?") == false) {
		return false;
	}
}