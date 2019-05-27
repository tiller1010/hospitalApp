window.onload = function(){

	const dropDown = document.querySelectorAll('.dropdown-menu-btn');
	dropDown.forEach((element) => {
		element.addEventListener('click', () => {
			let list = element.children[0];
			list.style.visibility = (list.style.visibility == 'hidden') ? 'visible' : 'hidden';
		})
	})

}