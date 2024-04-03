$('[data-action="delete"]').each(function (element) {
    $(this).on("click", function () {
        const dataName = $(this).data("name");
        const tableId = $(this).data("table-id");
        const url = $(this).data("url");
        const csrf = $(this).data("csrf-token");
        Swal.fire({
            text: 'Are you sure you want to remove "' + dataName + '"?',
            icon: "warning",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-secondary",
            },
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": csrf,
                    },
                });
                $.ajax({
                    url: url,
                    type: "DELETE",
                    success: function (response) {
                        window.LaravelDataTables[`${tableId}`].draw();
                        Swal.fire({
                            text: response.message?.body,
                            title: response.message?.title,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Close",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                    },
                    error: function (response) {
                        Swal.fire({
                            text: "Something went wrong. Please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Close",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                    },
                });
            }
        });
    });
});

$('button[data-action="edit"]').on("click", function (ev) {
    ev.preventDefault();
    const { url, target } = $(this).data();
    showPageOverlay();
    $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        timeout: 2000,
        success: function (data) {
            const form = $(`${target} form`);
            fillForm(form, data);
            form.attr("action", form.attr("action").replace(/\{id\}/, data.id));
            $(target).modal("show");
        },
        error: function (jqXhr) {
            handleAjaxError(jqXhr);
        },
        complete: hidePageOverlay,
    });
});

$('[data-action="search"]').on(
    "input",
    debounce(function () {
        const tableId = $(this).data("table-id");
        window.LaravelDataTables[`${tableId}`].search($(this).val()).draw();
    }, 1000)
);

$('[data-action="restore"]').each(function (element) {
    $(this).on("click", function () {
        const dataName = $(this).data("name");
        const tableId = $(this).data("table-id");
        const url = $(this).data("url");
        const csrf = $(this).data("csrf-token");
        Swal.fire({
            text: 'Apakah Anda yakin ingin memulihkan "' + dataName + '"?',
            icon: "warning",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-secondary",
            },
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": csrf,
                    },
                });
                $.ajax({
                    url: url,
                    type: "PUT",
                    success: function (response) {
                        window.LaravelDataTables[`${tableId}`].draw();
                        if (typeof response.success === "string") {
                            Swal.fire({
                                text: response.success,
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Close",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                            });
                        } else {
                            Swal.fire({
                                text: response.message?.body,
                                icon: "success",
                                title: response.message?.title,
                                buttonsStyling: false,
                                confirmButtonText: 'Yes',
                                cancelButtonText: 'No',
                                customClass: {
                                    confirmButton: 'btn btn-primary',
                                }
                            });
                        }
                    },
                    error: function (response) {
                        Swal.fire({
                            text: "Something went wrong. Please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Close",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                    },
                });
            }
        });
    });
});
