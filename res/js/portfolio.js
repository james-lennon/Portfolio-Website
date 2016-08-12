
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

	if (visible) {
		projectModal.modal({
	    	blurring:        true,
	    	inverted:        true,
	    	allowedMultiple: true
	  	}).modal('show');

	  	projectModal.addClass('loading');

		$.get(BASE_URL + "view/project/" + projectId, function(data) {
			projectInfo.html(data);
			projectModal.modal('refresh');
	  		// projectModal.removeClass('loading');
		});
	} else {
		projectModal.modal('hide');
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