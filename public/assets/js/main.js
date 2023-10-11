(function ($) {
    const customer_birthday = document.querySelector('#customerBirthday');

    if (customer_birthday) {
        customer_birthday.addEventListener('click', function (e) {
            // console.log(e);
        })
    }

    jQuery(document).ready(function ($) {

        var idFormActive = window.location.hash;

        $('.photography-form .nav li a').on('click', function () {
            var tabActive = $(this).attr('aria-controls');

            $('.photography-form .nav li a').removeClass('active').attr('aria-selected', false);
            $(this).addClass('active').attr('aria-selected', true);

            // Toggle tab content
            $('.photography-form .tab-content > .tab-pane').removeClass('show active')
            $('#' + tabActive).addClass('show active')
        })
        if ($(idFormActive).length) {
            // console.log($('.photography-form .nav li a[href="' + idFormActive + '"]'));
            $('.photography-form .nav li a[href="' + idFormActive + '"]').trigger('click')
        }

        function checkFillInput(form) {
            let allInput = $(form).find('.entry-item');
            let inputTicketCheck = $('input[name="validate_input_ticket"]').val();

            if (allInput.length) {
                allInput.each((index, element) => {
                    let valInput = $(element).val();

                    if (!valInput || valInput == "" || !inputTicketCheck.trim()) {
                        $(form).find('button').attr('disabled', true);
                        return false;
                    };

                    if (valInput.trim() != "" && inputTicketCheck != false) {
                        $(form).find('button').attr('disabled', false);
                    }
                })
            }
        }

        $('.btnConfirmDelete').on('click', function () {
            /**
             * Pass url in button confirm delete
             */
            let ticket_url = $(this).data('delete');
            $('.deletedTicketLink').attr('href', ticket_url);
        })

        $('#formEntryUserTicket').on('change', function (e) {
            e.stopPropagation();
            checkFillInput('#formEntryUserTicket');
        })

        const elDrop = $('.drop-ticket');
        // dropdown filter
        $('#inputTicketCode').on('input', function (e) {
            e.stopPropagation();
            let ticketCode = $(this).val();

            if (ticketCode.length > 3) {
                var data = {
                    ticketCode: ticketCode,
                }


                $.ajax({
                    type: 'post',
                    url: 'ticket/validateInput',
                    data: data,
                    beforeSend: function (response) {
                        // action before send request
                    },
                    success: function (response) {

                        if (response) {
                            const allData = JSON.parse(response);
                            let listTicket = '';

                            elDrop.addClass('drop-open');

                            if (typeof allData === 'object') {
                                allData.forEach(element => {
                                    listTicket += '<li data-code="' + element + '">' + element + '</li>';
                                });
                                elDrop.html(listTicket);

                                // remove error
                                if ($('#formEntryUserTicket').find('.entry-ticket-error').length) {
                                    $('#formEntryUserTicket .entry-ticket-error').remove();
                                }

                                // click insert ticket to input
                                $('.drop-ticket li').on('click', function () {
                                    let val_code = $(this).data('code');
                                    $('#inputTicketCode').val(val_code.trim());
                                    elDrop.html('')
                                })
                                $('input[name="validate_input_ticket"]').val(true)
                                checkFillInput('#formEntryUserTicket');
                            } else {
                                elDrop.html('<input type="text" disabled class="entry-ticket-error text-danger w-100 py-2 px-3 mt-3" value="' + allData + '">')
                                $('input[name="validate_input_ticket"]').val('')
                                checkFillInput('#formEntryUserTicket');
                            }

                        }

                    },
                    error: function (response) {
                        console.log(response);
                    }
                })
            } else {
                if ($('#formEntryUserTicket').find('.entry-ticket-error').length) {
                    $('#formEntryUserTicket .entry-ticket-error').remove();
                }
            }
        })
            .on('blur', function () {
                elDrop.find('li').remove();
            })



        // Show menu bar

        $('.navbar-front__hamburger').on('click', function () {
            $('.navbar-front__nav-wrap').addClass('menubarshow')
        })
        $('.navber-front__btn-close').on('click', function () {
            $('.navbar-front__nav-wrap').removeClass('menubarshow')
        })

        // format value
        $('#form-import').on('submit', function (e) {
            // e.preventDefault();
            var creaditTeamContent = $('.creadit-team-content').html();
            var descriptionContent = $('.description-content').html();

            // $(this).find('textarea[name="credit_team"]').val(JSON.stringify(creaditTeamContent));
            // $(this).find('textarea[name="description"]').val(JSON.stringify(descriptionContent));
            var wrapperCreaditTeam= `<div>${creaditTeamContent}</div>`;
            var wrapperdescription= `<div>${descriptionContent}</div>`;

            // wrapperCreaditTeam.innerHTML= creaditTeamContent;
            // wrapperdescription.innerHTML= descriptionContent;
            
            $(this).find('input[name="credit_team"]').val(wrapperCreaditTeam);
            $(this).find('input[name="description"]').val(wrapperdescription);
            console.log($(this).find('input[name="credit_team"]').val(), $(this).find('input[name="description"]').val());
        })

    })
})(jQuery)