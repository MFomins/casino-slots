document.addEventListener('DOMContentLoaded', function () {
	overlay = document.querySelectorAll('.single-game_overlay--info');
	noOverlay = document.querySelectorAll('.single-game_overlay');
	singleGame = document.querySelectorAll('.single-casino-game-css');
	playForFunBtn = document.querySelector('.play-for-play span');
	playForOverlay = document.querySelector('.game-right-overlay');
	if(overlay){
		for(let i = 0; i < overlay.length; i++) {
			overlay[i].addEventListener('mouseover', function(){
				noOverlay[i].style.backgroundColor = 'transparent';
				singleGame[i].style.transform = 'scale(1.01)';
			})
		}
	}
	if(overlay){
		for(let i = 0; i < overlay.length; i++) {
			overlay[i].addEventListener('mouseout', function(){
				noOverlay[i].style.backgroundColor = 'rgba(0, 0, 0, 0.35)';
				singleGame[i].style.transform = 'none';
			})
		}
	}
	if(playForFunBtn){
		playForFunBtn.addEventListener('click', function () {
			playForOverlay.style.display = 'none';
		})
	}
});