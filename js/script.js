$('#btn-sort').click(function () {
    $('#sortBox').slideToggle();
});

if ($('#btn-p1').length)
    $('#btn-p1').on('click', function () {
        if ($("#btn-p1[name='tag']").length) {
            $(".box[name='id']").each(function () {
                $(this).show();
                $('#btn-p1').removeAttr('name');
                $('#btn-sort').removeAttr('name');
            });
        } else {
            $('[name="id"]').each(function () {
                if ($(this).hasClass('box-p1')) $(this).show();
                else $(this).hide();
            });
            $('#btn-p1').attr('name', 'tag');
            $('#btn-sort').attr('name', 'btn-p1');
        }
    });
if ($('#btn-p2').length)
    $('#btn-p2').on('click', function () {
        if ($("#btn-p2[name='tag']").length) {
            $(".box[name='id']").each(function () {
                $(this).show();
                $('#btn-p2').removeAttr('name');
                $('#btn-sort').removeAttr('name');
            });
        } else {
            $('[name="id"]').each(function () {
                if ($(this).hasClass('box-p2')) $(this).show();
                else $(this).hide();
            });
            $('#btn-p2').attr('name', 'tag');
            $('#btn-sort').attr('name', 'btn-p2');
        }
    });
if ($('#btn-p3').length)
    $('#btn-p3').on('click', function () {
        if ($("#btn-p3[name='tag']").length) {
            $(".box[name='id']").each(function () {
                $(this).show();
                $('#btn-p3').removeAttr('name');
                $('#btn-sort').removeAttr('name');
            });
        } else {
            $('[name="id"]').each(function () {
                if ($(this).hasClass('box-p3')) $(this).show();
                else $(this).hide();
            });
            $('#btn-p3').attr('name', 'tag');
            $('#btn-sort').attr('name', 'btn-p3');
        }
    });

if ($('.sortBtn').length)
    $('.sortBtn').click(function () {
        $('#sortInput').val($(this).text());
        $('#sortBtnSubmit').click();
    });

if ($('#aboutUs').length)
    $('#aboutUs').click(function () {
        $('#aboutUsDiv').slideDown(1000);
        $('#aboutPersonDiv').slideUp(1000);
        $('#docsDiv').slideUp(1000);
        $('#normDocsDiv').slideUp(1000);
    });
if ($('#contacts').length)
    $('#contacts').click(function () {
        $('#aboutUsDiv').slideUp(1000);
        $('#aboutPersonDiv').slideDown(1000);
        $('#docsDiv').slideUp(1000);
        $('#normDocsDiv').slideUp(1000);
    });
if ($('#docs').length)
    $('#docs').click(function () {
        $('#aboutUsDiv').slideUp(1000);
        $('#aboutPersonDiv').slideUp(1000);
        $('#docsDiv').slideDown(1000);
        $('#normDocsDiv').slideUp(1000);
    });
if ($('#normDocs').length)
    $('#normDocs').click(function () {
        $('#aboutUsDiv').slideUp(1000);
        $('#aboutPersonDiv').slideUp(1000);
        $('#docsDiv').slideUp(1000);
        $('#normDocsDiv').slideDown(1000);
    });

if ($('#loadMore').length)
    $('#loadMore').click(function () {
        $('.box').removeAttr('hidden');
        $('#loadMore').remove();
    });