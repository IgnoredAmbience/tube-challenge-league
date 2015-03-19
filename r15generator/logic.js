function change()
{
	if(document.picker.nr.checked == true && (document.picker.min.value <= 8 && document.picker.max.value >= 8)) {document.picker.wj.disabled = false;} else {document.picker.wj.disabled = true;}
	if(document.picker.nr.checked == true && (document.picker.min.value <= 6 && document.picker.max.value >= 6)) {document.picker.eg.disabled = false;} else {document.picker.eg.disabled = true;}
	if(document.picker.sth.checked == true && (document.picker.min.value <= 6 && document.picker.max.value >= 3)) {document.picker.tl.disabled = false;} else {document.picker.tl.disabled = true;}
}