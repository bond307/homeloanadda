


//custome js
var loader = document.getElementById('loader');
function lodingFunc(){
    loader.style.display = 'none';
}

//password show and hide 

        $(".reveal").on('click',function() {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});
        
        


(function () {
	"use strict";

	var treeviewMenu = $('.app-menu');

	// Toggle Sidebar
	$('[data-toggle="sidebar"]').click(function(event) {
		event.preventDefault();
		$('.app').toggleClass('sidenav-toggled');
	});

	// Activate sidebar treeview toggle
	$("[data-toggle='treeview']").click(function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
	});

	// Set initial active toggle
	$("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');

	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();

})();





    //Disply Image Preview

function triggerClick(){
    document.querySelector('#profile').click();
}

function DisplayImg(e){
    if(e.files[0]){
        var reader = new FileReader();
        
        reader.onload = function(e){
            document.querySelector('#ImgDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    
    }
}
