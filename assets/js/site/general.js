/*delete confirmation*/
function confirm_delete() {
	if(confirm("Apakah anda yakin akan menghapus data ini?") == false) {
		return false;
	}
}