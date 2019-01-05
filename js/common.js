let arr = document.querySelectorAll("aside a")
for (var i = 0; i < arr.length; i++) {
	if (arr[i].href == document.URL) {
		arr[i].firstElementChild.style.backgroundColor = 'white';
	}
}