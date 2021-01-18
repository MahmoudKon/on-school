// BEGIN SETUP AJAX HEADER TO SEND CSRF TOKEN WITH THE POST REQUEST
$(function() {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    }); // to send the csrf token with ajax request

    $(document).ajaxSend(function() {
        $('.btn,input,select').attr('disabled', 'disabled');
        $('body').addClass('loading-animation');
    }); // to make load animation before send the ajax

    $(document).ajaxStop(function() {
        $('.btn,input,select').removeAttr('disabled');
        $('body').removeClass('loading-animation');
    }); // to end load animation after send the ajax

    $(document).ajaxError(function(data, textStatus, jqXHR) {
        if (textStatus.responseJSON.message == 'Unauthenticated.') {location.reload(true);}
    }); // when make request and response error

    // VARIABLES
    var text   = $('#search-text').val(),
        column = $('#column-name').val(),
        record = $('#record-number').val(),
        url    = window.location.href;
        sort   = 'id',
        order  = 'desc';

    function rows() {
        $.ajax({
            url: url,
            type: "get",
            data: {text : text, column : column, record: record, sort: sort, order: order},
            success: function(data, textStatus, jqXHR) {
                $('#load_data').empty();
                $('#load_data').html(data);
            },
        });
    } // AJAX CODE TO LOAD THE DATA TABLE

$.when(
        $('body').on('click', '.pagination .page-item .page-link', function (e) {
            e.preventDefault();
            let btn = $(this);
            url = btn.attr('href');
            if ( btn.parent('li').hasClass('active') ) { return false; }
            rows();
        }), // LOAD THE DATA BY PAGINATION LINKS

        $('body').on('change', '#record-number', function() {
            record = $(this).val();
            rows();
        }), // MAKE PAGINATION BY COLUMN RECORDS

        $('body').on('keyup', '#search-text', function(e) {
            if ( (e.keyCode >= 48 && e.keyCode <= 90) || (text != '' && e.keyCode == 8) ) {
                text = $(this).val();
                rows();
            } // end of if statement
        }), // MAKE PAGINATION BY COLUMN RECORDS

        $('body').on('change', '#column-name', function() {
            column = $(this).val();
            if( text !== '' ) { rows(); } // end of if statement
        }), // MAKE RESEARCH BY COLUMN NAME

        $('body').on('click', '#reset-btn', function () {
            $('#search-text').val('');
            text   = $('#search-text').val();
            $('#record-number').prop('selectedIndex',0);
            column = $('#column-name').val();
            $('#column-name').prop('selectedIndex',0);
            record = $('#record-number').val();
            url    = window.location.href;
            sort   = 'id';
            order  = 'desc';
            rows();
        }), // MAKE RESET TO THE SELECTION COLUMNS , RECORDS AND INPUT SEARCH

        $("body").on("click", "tbody tr td.check-item", function() {
            var ele = $(this).find('input[type=checkbox].check-box-id').click(function(e){ e.stopPropagation(); });
            if(ele.prop('checked'))
                ele.prop("checked", false);
            else
                ele.prop("checked", true);
        }), // WHEN CLICK ON TR MAKE THE CHILD CHECK-BOX IS TRUE OR FALSE

        $('thead tr td').each(function() {
            if($(this).data('sort'))
                $(this).css('cursor', 'pointer');
        }), //  MAKE EACH T-HEAD > TD IS CLICKABLE

        $('body').on('click', 'thead tr td', function() {
            let td = $(this),sort_icon;
            if(! td.hasClass('sorting') && td.data('sort'))
                td.addClass('sorting').siblings('td').removeClass('sorting').removeData('order').find('span').remove();
            // end of check if not has class

            if(td.hasClass('sorting') && td.data('sort')) {
                sort = td.data('sort');
                if(order == 'desc') {
                    order  = 'asc';
                    sort_icon = '<i class="fas fa-sort-amount-up"></i>';
                } else if(order == 'asc') {
                    order  = 'desc';
                    sort_icon = '<i class="fas fa-sort-amount-down"></i>';
                }
                rows();
                td.find('span').remove();
                td.prepend("<span>" + sort_icon + "</span>");
            } // end of check if data sort
        }), // MAKE SORTING USING BY COLUMN NAME
    ).then(function () {
        rows();
    });

    // BEGIN FUNCTION TO SEND DATA TO CONTROLLER WHEN CLICK ON BUTTONS
    function actions(action, id) {
        $.ajax({
            url: window.location.href + '/' + action,
            type: "post",
            data: {id : id},
            success: function(data, textStatus, jqXHR) {
                $('#check-all').prop('checked', false);
                // swal('done', 'successfully', "success");
                toastr.success(data.msg, data.title);
                $.each(id, function( index, value ) {
                    $('tbody tr[data-id=' + value + ']').fadeOut().remove();
                });
                $('#count-trash').text(data.trash);
                $('#count-exist').text(data.exist);
                if($('tbody tr').length == 1) {
                    url = window.location.href;
                    rows();
                }
            },
            error: function (error) {
                // swal(data.title, data.msg, "error");
                toastr.error(error.responseJSON);
            },
        });
    } // END OF FUNCTION ACTIONS

    $('body').on('click', '.btn_action', function () {
        let id      = [];
        let message = '';
        let action  = $(this).data('action');

        if($(this).data('id')) {
            id.push($(this).data('id'));
            message = 'are u sure to ' + action + ' this record ?';
        } else {
            $('input[type=checkbox].check-box-id:checked').each(function() { id.push($(this).val()); });
            message = 'are u sure to ' + action + ' these  ' + id.length + ' records ?';
        }
        if(id.length == 0) {
            trans('select_some_records_first');
        } else {
            swal({
                text: message,
                icon: "warning",
                buttons: [
                    'no, cancel',
                    'yes, do'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    actions(action, id);
                } else {
                    // swal('warning', 'canceled the process', "error");
                    trans('cancelled_message');
                }
            });
        }
    });

    $("body").on('change', '#image input[type=file]', function () {
        let img = $(this).parent('#image').find('img');
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                img.attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    }); // PREVIEW THE IMAGE WHEN SELECTED

    $('body').on('click', '.load-form', function(e) {
        e.preventDefault();
        let container = $('body').find('#formModal #form_body');
        $(this).attr('data-toggle', 'modal').attr('data-target', '#formModal');
        container.empty();
        $.ajax({
            url: $(this).attr('href'),
            type: "GET",
            success: function(data, textStatus, jqXHR) {
                container.append(data);
            },
            error: function(jqXhr) {
                container.append('<div class="alert alert-danger">' + jqXhr.responseJSON.message + '</div>');
            },
            complete: function() {
                $(this).removeAttr('data-toggle').removeAttr('data-target');
            }
        });
    }); // LOAD THE FORM ON MODAL

    $('body').on('submit', '.form', function(e) {
        e.preventDefault();
        let form = $(this),
            msg = form.prev('#message');
        msg.fadeOut(500);
        setTimeout(function(){ msg.empty(); form.find('span.error').fadeOut(); }, 500);
        $.ajax({
            url: form.attr('action'),
            type: "POST",
            data: new FormData($(this)[0]),
            dataType:'JSON',
            processData: false,
            contentType: false,
            success: function(data, textStatus, jqXHR) {
                $('.modal').modal("hide");
                if ($('tbody tr').length == 1 || $('tbody tr').length >= (record + 1)) {
                    url = window.location.href;
                    rows();
                } else if (data.type == 'update') {
                    $('#load_data > tr[data-id=' + data.id + ']').fadeOut().empty().append(data.view).fadeIn();
                } else {
                    let count = $('#load_data').children('tr').length - 1;
                    if(record == count) {
                        $('#load_data > tr:nth-child(' + count + ')').fadeOut(500).delay(500).remove();
                    }
                    $('#count-exist').text( parseInt( $('#count-exist').text() ) + 1 );
                    setTimeout(function(){
                        $('#load_data').prepend('<tr data-id=' + data.id + '>' + data.view + '</tr>');
                    }, 1000);
                }
                toastr.success(data.message, data.title);
            },
            error: function (jqXhr, textStatus, errorMessage) {
                if (jqXhr.status == 422) {
                    $.each(jqXhr.responseJSON.errors, function (key, val) {
                        form.find(`#${key}_error`).text(val[0]).fadeIn();
                    });
                } else {
                    msg.append(`<div class="alert bg-danger alert-icon-left alert-arrow-left mb-0 mt-2" role="alert"> <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span> <strong> ${jqXhr.responseJSON} </strong> </div>`);
                }
            },
            complete: function() { msg.fadeIn(500); }
        });
    }); // SUBMIT THE FORM

    $("body").on("click", "input[type=checkbox]#check-all", function() {
        let bool = $(this);
        $('input[type=checkbox].check-box-id').each(function () {
            if(bool.prop('checked')) {
                $(this).prop('checked', true);
            } else {
                $(this).prop('checked', false);
            }
        });
    }); // WHEN CLICK ON TR MAKE THE CHILD CHECK-BOX IS TRUE OR FALSE

    function trans (text) {
        $.ajax({
            url: 'translate',
            type: "POST",
            data: {text: text},
            success: function(data) {
                toastr.error(data);
            },
        });
    }


}); // end if function jquery

