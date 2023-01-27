function copyText(textToCopy) {
	var myTemporaryInputElement = document.createElement("input");
	myTemporaryInputElement.type = "text";
	myTemporaryInputElement.value = textToCopy;
	document.body.appendChild(myTemporaryInputElement);	 
	myTemporaryInputElement.select();
	document.execCommand("Copy");
	document.body.removeChild(myTemporaryInputElement);

}

const blocks = document.querySelectorAll('.blockCopy');

blocks.forEach(block => {
block.addEventListener('click', () => {
	textToCopy = block.getAttribute('data');
    if (block.classList.contains('pass')) {
        textToCopy = atob(block.getAttribute('data'));
    }
 
    try {
		copyText(textToCopy);
		block.classList.add('copied');
    
      setTimeout(() => {
        block.classList.remove('copied');
      }, 500);
    } catch(e) {
    }
  });
});