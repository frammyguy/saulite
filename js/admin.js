$('#adminAddBtn').click(function() {
    $('#adminForm').slideDown();
    $('#adminRemoveForm').slideUp();
    $('#adminChangeForm').slideUp();
    $('#HistoryForm').slideUp();
});
$('#adminRemoveBtn').click(function() {
    $('#adminForm').slideUp();
    $('#adminRemoveForm').slideDown();
    $('#adminChangeForm').slideUp();
    $('#HistoryForm').slideUp();
});
$('#adminChangeBtn').click(function() {
    $('#adminForm').slideUp();
    $('#adminRemoveForm').slideUp();
    $('#adminChangeForm').slideDown();
    $('#HistoryForm').slideUp();
});
$('#HistoryBtn').click(function() {
    $('#adminForm').slideUp();
    $('#adminRemoveForm').slideUp();
    $('#adminChangeForm').slideUp();
    $('#HistoryForm').slideDown();
});
if ($('#openjscript').val() == '+') {
    $('#adminForm').slideUp();
    $('#adminRemoveForm').slideUp();
    $('#adminChangeForm').slideDown();
    $('#HistoryForm').slideUp();
}