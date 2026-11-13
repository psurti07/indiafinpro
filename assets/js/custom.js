function goToMenu(sectionId){
	let currentUrl = window.location.href;
    let lastSegment = currentUrl.substring(currentUrl.lastIndexOf('/') + 1);
    if((lastSegment!==null) || (lastSegment!=='')){
        window.location.href = `${base_url}#${sectionId}`;
    } else {
        var section = document.getElementById(sectionId);
        if (section) {
            section.scrollIntoView({behavior: 'smooth'});
        }
    }
}