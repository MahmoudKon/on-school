(function ($) {
    $.fn.SearchPlugin = function (option) {
        // BEGIN SETTINGS
        var settings = $.extend({
            columns: {'id': 'ID',},
            records: [5, 15, 25, 50, 100],
            translate: {
                records: 'Records',
                search: 'Search',
            },
        }, option);
        // END SETTINGS

        var buttons;
        if(typeof($(this).data('buttons')) == 'string')
            buttons = $(this).data('buttons').split(',');

        $(this).prepend(SearchPlugin());
        // BEGIN THE FUNCTION OF PLUGIN
        function SearchPlugin() {
            // CALL THE FUNCTION THAT CALL ALL FUNCTIONS
            return elementsHTML();

            // BEGIN CREATE THE ELEMENTS
            function elementsHTML () {
                return `<div class="row justify-content-center">
                            ${recordsHTML()}
                            ${searchHTML()}
                            ${columnsHTML()}
                            ${buttonsHTML()}
                        </div>`;
            } // END OF THE CREATE THE ELEMENTS

            // BEGIN MAKE SELECT PAGINATION
            function recordsHTML () {
                let options = '';
                $.each(settings.records, function(i, v) {
                        options += '<option value="' +  v + '">' + v + ' ' + settings.translate.records + '</option>';
                });
                return `<div class="col-sm-12 col-md-2">
                            <div class="form-group mb-0">
                                <select class="custom-select records"> ${options} </select>
                            </div>
                        </div>`;
            } // END OF SELECT PAGINATION

            // BEGIN MAKE SELECT PAGINATION
            function searchHTML () {
                return `<div class="col-sm-6 col-md-5">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary border-primary white" id="basic-addon7"><i class="la la-search"></i></span>
                                </div>
                                <input type="text" name="search" id="auto" class="form-control search" placeholder="${settings.translate.search}...">
                                <div class="autocomplete"></div>
                            </div>
                        </div>`;
            } // END OF SELECT PAGINATION

            // BEGIN TO  MAKE THE SELECT THE COLUMNS NAME
            function columnsHTML () {
                let options = '';
                $.each(JSON.parse(settings.columns), function(i, v) {
                    if(Number.isInteger(i)) {
                        options += `<option value="${v}">${v}</option>`;
                    } else {
                        options += `<option value="${i}">${v}</option>`;
                    }
                });

                return `<div class="col-sm-6 col-md-2">
                            <div class="form-group mb-0">
                                <select class="custom-select form-control columns">
                                    ${options}
                                </select>
                            </div>
                        </div>`;
            } // END OF SELECT COLUMNS NAME

            // BEGIN TO MAKE THE BUTTONS [ RESET & DELETE ]
            function buttonsHTML () {
                let btn_reset='', btn_delete='', btn_restore='', btn_destroy='',action = 'destroy',btn_excel='',btn_csv='';
                if(jQuery.inArray("restore", buttons) > -1){
                    btn_restore = `<button class='btn btn-info btn-sm btn_action' data-multi=true data-action='restore' data-toggle="tooltip" data-original-title="Multi Restore">
                                <i class='fa fa-trash-restore'></i>
                            </button>`;
                    action = "delete";
                } // end of if statement

                if(jQuery.inArray("reset", buttons) > -1) {
                    btn_reset = `<button class='btn btn-warning btn-sm reset' data-toggle="tooltip" data-original-title="Reset The Settings">
                                    <i class='fa fa-history'></i>
                                </button>`;
                }

                if(jQuery.inArray("delete", buttons) > -1 || jQuery.inArray("destroy", buttons) > -1) {
                    btn_delete = `<button class='btn btn-danger btn-sm btn_action' data-multi=true data-action=${action} data-toggle="tooltip" data-original-title="Multi Delete">
                                    <i class='fa fa-trash'></i>
                                </button>`;
                }

                if(jQuery.inArray("excel", buttons) > -1) {
                    btn_excel = `<a href="${window.location.href}/export/excel" class="btn btn-facebook btn-sm" data-toggle="tooltip" data-original-title="Excel">
                                    <i class="fa fa-file-excel"></i>
                                </a>`;
                }

                if(jQuery.inArray("csv", buttons) > -1) {
                    btn_csv = `<a href="${window.location.href}/export/csv" class="btn btn-github btn-sm" data-toggle="tooltip" data-original-title="CSV">
                                    <i class="fa fa-file-csv"></i>
                                </a>`;
                }

                return `<div class="col-sm-6 col-md-3 align-self-center">
                            <div class="form-group mb-0 d-flex justify-content-between">
                                ${btn_reset}
                                ${btn_delete}
                                ${btn_restore}
                                ${btn_excel}
                                ${btn_csv}
                            </div>
                        </div>`;
            }
            // END THE BUTTONS [ RESET & DELETE ]
        } // END OF PLUGIN
//############################### BEGIN LOAD THE DATA BY AJAX #####################################
        var text   = $('#searching .search').val(),
            column = $('#searching .columns').val(),
            record = $('#searching .records').val(),
            url    = window.location.href;
            sort   = 'id',
            order  = 'desc';

        // BEGIN SETUP AJAX HEADER TO SEND CSRF TOKEN WITH THE POST REQUEST
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); // END SETUP AJAX HEADER

        $(document).ajaxSend(function() { $('.btn , input[type=file]').attr('disabled', 'disabled'); });

        $(document).ajaxComplete(function() { $('.btn , input[type=file]').removeAttr('disabled'); });

        // BEGIN LOAD FUNCTION TO RETURN THE HTML TAGS
        function load() {
            return `<div class="sk-cube-grid" id="loading">
                <div class="sk-cube sk-cube1"></div>
                <div class="sk-cube sk-cube2"></div>
                <div class="sk-cube sk-cube3"></div>
                <div class="sk-cube sk-cube4"></div>
                <div class="sk-cube sk-cube5"></div>
                <div class="sk-cube sk-cube6"></div>
                <div class="sk-cube sk-cube7"></div>
                <div class="sk-cube sk-cube8"></div>
                <div class="sk-cube sk-cube9"></div>
            </div>`;
        } // END OF LOAD HTML

        // BEGIN THE AJAX CODE TO LOAD THE DATA
        function getRows() {
            $('#load_data').prepend(load());
            $.ajax({
                url: url,
                type: "get",
                data: {text : text, column : column, record: record, sort: sort, order: order},
                success: function(data, textStatus, jqXHR) {
                    $('#load_data').empty();
                    $('#load_data').html(data);
                },
            });
        } // END THE AJAX CODE

        // BEGIN CALL THE AJAX FUNCTION
        getRows();
        // END CALL THE AJAX FUNCTION

        // BEGIN FUNCTION TO SEND DATA TO CONTROLLER WHEN CLICK ON BUTTONS
        function actions(url_action, id) {
            $.ajax({
                url: url_action,
                type: "post",
                data: {id : id},
                success: function(data, textStatus, jqXHR) {
                    if(data.status == 200) {
                        swal("Done", data.msg, "success");
                        getRows();
                        $('.count-trash').text(data.trash);
                        $('.count-exist').text(data.exist);
                    } else {
                        swal("warning", data.msg, "error");
                    }
                },
                error: function (error) {
                    swal("warning", error, "error");
                },
            });
        } // END OF FUNCTION ACTIONS

        // BEGIN LOAD THE DATA BY PAGINATION LINKS
        $('body').on('click', '.pagination .page-item .page-link', function (e) {
            e.preventDefault();
            let btn = $(this);
            url = btn.attr('href');
            if ( btn.parent('li').hasClass('active') ) { return false; }
            // url = window.location.href + '?page=' + page;
            getRows();
            url    = window.location.href;
        }); // END PAGINATION LINKS

        // BEGIN TO MAKE PAGINATION BY COLUMN RECORDS
        $('body').on('change', '#searching .records', function() {
            record = $(this).val();
            getRows()
        }); // END OF PAGINATION BY COLUMN RECORDS

        // BEGIN TO MAKE PAGINATION BY COLUMN RECORDS
        $('body').on('keyup', '#searching .search', function(e) {
            if ( (e.keyCode >= 48 && e.keyCode <= 90) || (text != '' && e.keyCode == 8) ) {
                text = $(this).val();
                let div = $(this).next('.autocomplete');
                div.css( {
                    'position': 'absolute',
                    'width': '100%',
                    'padding': '20px',
                    'background': '#000c',
                    'color': '#fff',
                    'margin': 0,
                    'margin-top': '42px',
                    'z-index': '99'
                }).empty().fadeOut();
                getRows();
                $.ajax({
                    url: window.location.href + '/autocomplete',
                    type: "get",
                    data: {text : text},
                    success: function(data, textStatus, jqXHR) {
                        $.each(data, function(index, value) {
                            div.append("<p>" + value.username + "</p>");
                        });
                    },
                    complete: function() {
                        if(text.length > 0) {
                            div.fadeIn();
                        } else {
                            div.empty().fadeOut();
                        }
                    }
                });

            } // end of if statement
        }); // END OF PAGINATION BY COLUMN RECORDS

        // BEGIN TO MAKE RESEARCH BY COLUMN NAME
        $('body').on('change', '#searching .columns', function() {
            column = $(this).val();
            if(text !== '') { getRows(); } // end of if statement
        }); // END OF RESEARCH

        // BEGIN TO MAKE RESET TO THE SELECTION COLUMNS , RECORDS AND INPUT SEARCH
        $('body').on('click', '#searching .reset', function () {
            $('#searching .search').val('');
            text   = $('#searching .search').val();
            $('#searching .columns').prop('selectedIndex',0);
            column = $('#searching .columns').val();
            $('#searching .records').prop('selectedIndex',0);
            record = $('#searching .records').val();
            url          = window.location.href;
            sort   = 'id';
            order  = 'desc';
            getRows();
        }); // END OF RESET

        // BEGIN TO MAKE SOME ACTIONS [ DESTROY, DELETE, RESTORE ]  & [ SINGLE , MULTI ]
        $('body').on('click', '.btn_action', function() {
            var id  = [],
                btn = $(this),
                action = btn.data('action');
            if(btn.data('multi')) {
                $('input[type=checkbox]:checked').each(function(i){ id[i] = $(this).data('id'); });
            } else {
                id[0] = btn.data('id');
            } // end of if statement

            if(id.length > 0) {
                swal({
                    title: "Warning",
                    text: "Are you sure to hard " + action + " this row ?",
                    icon: "warning",
                    buttons: [
                        'No, cancel it!',
                        'Yes, I am sure!'
                    ],
                    dangerMode: true,
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        // actions(url + '/' + action, id);
                    } else {
                        // swal("Cancelled", "Cancelled Process :)", "error");
                        toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!')
                    }
                });
            } // end of if statement
        }); // END OF ACTIONS

        // BEGIN THE OF TR CLICK TO MAKE  BOX CLICKED TRUE OR FALSE
        $("body").on("click", "tbody tr td:first-child", function() {
            var ele = $(this).find('input[type=checkbox]').click(function(e){ e.stopPropagation(); });
            if(ele.prop('checked'))
                ele.prop("checked", false);
            else
                ele.prop("checked", true);
        }); // END OF TR CLICKED

        // BEGIN MAKE EACH T-HEAD > TD IS CLICKABLE
        $('thead tr td').each(function() {
            if($(this).data('sort'))
                $(this).css('cursor', 'pointer');
        }); // END OF CLICKABLE

        // BEGIN TO MAKE SORTING USING BY COLUMN NAME
        $('body').on('click', 'thead tr td', function() {
            let td = $(this),sort_icon;
            if(! td.hasClass('sorting') && td.data('sort')) {
                td.addClass('sorting').siblings('td').removeClass('sorting').removeData('order').find('span').remove();
            } // end of check if not has class

            if(td.hasClass('sorting') && td.data('sort')) {
                sort = td.data('sort');
                if(order == 'desc') {
                    order  = 'asc';
                    sort_icon = '<i class="fas fa-sort-amount-up"></i>';
                } else if(order == 'asc') {
                    order  = 'desc';
                    sort_icon = '<i class="fas fa-sort-amount-down"></i>';
                }
                getRows();
                td.find('span').remove();
                td.prepend("<span>" + sort_icon + "</span>");
            } // end of check if data sort
        }); // END OF SORTING

        // BEGIN THE CREATE MODEL AND APPEND IT INTO PAGE BODY
        $('body').append(`<div class="modal fade" id="model_form" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="max-width: 750px !important">
                                    <div class="modal-content">
                                        <div id="form_body"></div>
                                    </div>
                                </div>
                            </div>`
        ); // END OF APPEND THE MODEL

        // BEGIN THE FORM ACTION
        $('body').on('submit', '#form', function(e) {
            e.preventDefault();
            let form = $(this),
                msg = form.parent().find('#message');

            form.prepend(load());
            msg.fadeOut(500);
            setTimeout(function(){
                msg.empty();
                form.find('span.error').fadeOut();
            }, 500);
            $.ajax({
                url: form.attr('action'),
                type: "POST",
                data: new FormData($(this)[0]),
                dataType:'JSON',
                processData: false,
                contentType: false,
                success: function(data, textStatus, jqXHR) {
                    msg.append(`<div class="alert bg-success alert-icon-left alert-arrow-left mb-0 mt-2" role="alert"> <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span> <strong> ${data} </strong> </div>`);
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    $.each(jqXhr.responseJSON.errors, function (key, val) {
                        form.find(`#${key}_error`).text(val[0]).fadeIn();
                    });
                },
                complete: function() {
                    form.find("#loading").remove();
                    msg.fadeIn(500);
                    setTimeout(function(){
                        form.find('input[type=file]').val('');
                    }, 1000);
                }
            });
        }); // END OF THE FORM ACTION

        // BEGIN THE FORM ACTION
        $('body').on('click', '.load_form', function(e) {
            e.preventDefault();
            let container = $('body').find('#model_form #form_body');
            $(this).attr('data-toggle', 'modal').attr('data-target', '#model_form');
            container.empty();
            container.prepend(load());
            $.ajax({
                url: $(this).attr('href'),
                type: "GET",
                success: function(data, textStatus, jqXHR) {
                    container.empty();
                    container.append(data);
                },
            });
        }); // END OF THE FORM ACTION

        // BEGIN PREVIEW THE IMAGE WHEN SELECTED
        $("body").on('change', '#image input[type=file]', function () {
            let img = $(this).parent('#image').find('img');
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    img.attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        }); // END OF PREVIEW THE SELECTED IMAGE

    } // end of SearchPlugin
} (jQuery));
// end of jquery

$('body').on('click', '.multi-delete', function () {
    let id = [];
    $('input[type=checkbox].item-checkbox:checked').each(function() { id.push($(this).val()) });
    if(id.length == 0) {
        alert ('select some records to delete them');
    } else {
        alert ('are u sure to delete ' + id.length + ' records ?');
    }
});

// begin check all elements
function checkAll() {
    $('input[type=checkbox].item-checkbox').each(function() {
        if($('input[type=checkbox].check-all').prop('checked') == true) {
            $(this).prop('checked', true);
        } else {
            $(this).prop('checked', false);
        }
    });
} // end of custom function



$('body').on('click', '.multi-delete, .btn_action', function () {
    let id = [];
    if($(this).data('id')) {
        id.push($(this).data('id'));
    } else {
        $('input[type=checkbox].item-checkbox:checked').each(function() { id.push($(this).val()); });
    }
    if(id.length == 0) {
        toastr.warning('select some records to delete them');
        console.log(id);
    } else {
        swal({
            title: "Warning",
            text: "Are you sure to delete " + id + " Records ?",
            icon: "warning",
            buttons: [
                'No, cancel it!',
                'Yes, I am sure!'
            ],
            dangerMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {
                toastr.success('Deleted  Success');
                // actions(url + '/' + action, id);
            } else {
                toastr.error('Cancelled Process :)');
            }
        });
    }
});

// begin check all elements
function checkAll() {
    $('input[type=checkbox].item-checkbox').each(function() {
        if($('input[type=checkbox].check-all').prop('checked') == true) {
            $(this).prop('checked', true);
        } else {
            $(this).prop('checked', false);
        }
    });
} // end of custom function
