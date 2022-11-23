var a = document.querySelectorAll('.place2, .place1, .place3, .place4, .tableOfTheGeneralScore')

function toggleHideBeforeConfirm()
{
		for(tag of a)
	{
		tag.classList.toggle('hide')
	}
}
toggleHideBeforeConfirm()