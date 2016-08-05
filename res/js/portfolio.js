
BASE_URL = "http://localhost:8888/"

$(document).ready(function() {

	$("#nav-menu").hide();

	$(window).scroll(function() {
        if($(window).scrollTop() > 220) {
            setHeaderVisible(true);
        } else {
            setHeaderVisible(false);
        }
    });

    $(".project-card").click(function() {
    	projectId = $(this).attr("project-id");
    	setModalVisible(true, projectId);
    });

    $("#modal-back").click(function() {
    	setModalVisible(false);
    });

});

function setHeaderVisible (visible) {
	menu = $("#nav-menu");

	if (visible) {
		menu.fadeIn(250);
	} else {
		menu.fadeOut(250);
	}
}

function setModalVisible(visible, projectId) {

	projectModal = $("#project-modal");
	projectInfo  = $("#project-info");

	if (visible) {
		projectModal.modal({
	    	blurring: true,
	    	inverted: true
	  	}).modal('show');

		$.get(BASE_URL + "view/project/" + projectId, function(data) {
			projectInfo.html(data);
			projectModal.modal('refresh');
		});
	} else {
		projectModal.modal('hide');
	}

}