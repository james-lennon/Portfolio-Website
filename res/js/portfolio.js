
BASE_URL = "http://localhost:8888/";

LOADING_HTML = 
'<div class=\"ui basic segment\"> \
  <br> \
  <br> \
  <br> \
    <div class=\"ui huge text loader\">Loading</div> \
  <p></p> \
  <p></p> \
  <p></p> \
</div>';

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

    $("#contact-modal-back").click(function() {
    	setContactModalVisible(false);
    });

    $(".contact-open").click(function() {
    	setContactModalVisible(true);
    });

    $("#image-modal-back").click(function() {
    	displayImage(false);
    })

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

	projectInfo.html(LOADING_HTML);

	if (visible) {
		projectModal.modal({
	    	blurring:        true,
	    	inverted:        true,
	    	allowedMultiple: true
	  	}).modal('show');
		projectModal.modal('refresh');

		$.get(BASE_URL + "view/project/" + projectId, function(data) {
			projectInfo.html(data);
			projectModal.modal('refresh');
		});
	} else {
		projectModal.modal('hide');
		projectModal.modal('refresh');
	}

}

function displayImage(visible, url) {

	imageModal = $("#image-modal");

	if (visible) {
		$("#image-modal-img").attr('src', url);
		imageModal.modal({
			allowedMultiple: true
		});
		imageModal.modal('show');
	} else {
		imageModal.modal('hide');
		$("#project-modal").modal("show");
	}
}

function setContactModalVisible(visible) {

	contactModal = $("#contact-modal");

	if (visible) {
		contactModal.modal({
	    	blurring: true,
	    	inverted: true
	  	}).modal('show');
	} else {
		contactModal.modal('hide');
	}


}